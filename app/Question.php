<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','slug','body','user_id','category_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class, 'question_id');
    }

    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }
}
