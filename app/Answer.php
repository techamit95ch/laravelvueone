<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent:: boot();
        static:: created(function ($answer) {
            //echo "\n Answer created";
            $answer->question->increment('answers_count');
            $answer->question->save();
        });
        /*
        static :: saved(function ($ans){
            echo "\nanswer saved\n";
        });
        */
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
