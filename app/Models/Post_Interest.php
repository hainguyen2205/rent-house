<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_Interest extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_post',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}