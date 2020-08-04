<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPathAttribute()
    {
        return "category/$this->slug";
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
