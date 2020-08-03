<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','slug','body','user_id','category_id'];

    protected static function boot(){
        parent::boot();
        static::creating(function($question){
            $question->slug = str_slug($question->title);
        });
    }

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
        return "/question/$this->slug";
    }
}
