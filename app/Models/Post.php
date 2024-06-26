<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'electric_price',
        'water_price',
        'views',
        'type_house',
        'id_status'
    ];

    public function district()
    {
        return $this->hasOne(District::class, 'id', 'id_district');
    }
    public function getStatus()
    {
        return $this->hasOne(Status_Post::class, 'id', 'id_status');
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
        return $this->belongsToMany(Service::class, 'service__posts', 'id_post', 'id_service');
    }
    public function images()
    {
        return $this->hasMany(Image_Post::class, 'id_post', 'id');
    }
    public function user_interested_list()
    {
        return $this->hasMany(Post_Interest::class, 'id_post', 'id');
    }
    public function reject_reason()
    {
        if ($this->id_status == 0) {
            return $this->hasOne(Reject_Post::class, 'id_post', 'id');
        }
        return null;
    }
    public function countPostsByDistrict()
    {
        $postCounts = Post::with('district')
            ->select('id_district', DB::raw('COUNT(*) as post_count'))
            ->groupBy('id_district')
            ->get();
        return $postCounts;
    }
}
