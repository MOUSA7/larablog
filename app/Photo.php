<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['file','title'];
    //

    public function blog(){
        return $this->belongsTo(Blog::class);
    }

}
