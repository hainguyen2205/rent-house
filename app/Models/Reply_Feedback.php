<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply_Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_feedback',
        'description',
    ];
}
