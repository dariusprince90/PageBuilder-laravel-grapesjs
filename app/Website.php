<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $casts = ['html' => 'array'];
    protected $fillable = ['html', 'name', 'user_id', 'url', 'is_published'];
}
