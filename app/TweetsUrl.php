<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TweetsUrl extends Model
{
    protected $table = 'tweets_urls';
    protected $fillable = ['url'];
}
