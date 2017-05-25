<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $uploads='http://projects.laravelappl/images/';
    protected $fillable=['path'];

    public function getPathAttribute($photo){

        return $this->uploads.$photo;
    }
}
