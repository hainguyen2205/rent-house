<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_Post extends Model
{
    use HasFactory;
    protected $table = "service__posts";

    protected $fillable = [
        'id_service',
        'id_post'
    ];
}
