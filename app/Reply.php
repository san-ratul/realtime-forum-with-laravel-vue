<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reply extends Model
{
    protected $fillable = ['body','user_id','question_id'];

    protected static function boot(){
        parent::boot();
        static::creating(function($reply){
            $reply->user_id = Auth::user()->id;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'reply_id');
    }

    public function getLikeAttribute()
    {
        return asset("api/like/$this->id");
    }

}
