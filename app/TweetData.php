<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TweetData extends Model
{
    protected $table = 'tweet_data';
    protected $fillable = ['tweet_url_id', 'data'];
}
