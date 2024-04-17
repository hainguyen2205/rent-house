<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'title',
        'description',
        'id_district',
        'id_ward',
        'acreage',
        'rent',
        '',
        'water_price',
        'views',
        'interests',
        'id_status'
    ];
    public function district()
    {
        return $this->hasOne(District::class, 'id', 'id_district');
    }
    public function ward()
    {
        return $this->hasOne(Ward::class, 'id', 'id_ward');
    }
    public function author()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
    public function services()
    {
        return $this->belongsToMany(Service::class,'service__posts', 'id_post', 'id_service');
    }
    public function images() {
        return $this->hasMany(Image_Post::class, 'id_post', 'id');
    }
}
