<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoUrl extends Model
{
    protected $table = 'video_urls';
    protected $fillable = ['url'];
}
