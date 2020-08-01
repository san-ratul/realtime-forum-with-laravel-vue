<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['body','user_id','question_id'];

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
