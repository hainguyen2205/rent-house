<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'id_user',
        'description',
    ];
    public function getUser()
    {
       return $this->hasOne(User::class, 'id', 'id_user');
    }
    public function getReply()
    {
       return $this->hasMany(Reply_Feedback::class, 'id_feedback', 'id');
    }
}
