<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];


    public function getRouteKeyName()
    {
        return 'slug';
    }



    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::of($value)->slug('-');
    }

    public function post_images()
    {
        return $this->hasMany(PostImage::class);
    }
}
