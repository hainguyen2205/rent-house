<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block_User extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'reason',
    ];
}
