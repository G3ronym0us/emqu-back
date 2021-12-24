<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'age',
        'gender',
        'social_network',
        'facebook_time',
        'whatsapp_time',
        'twitter_time',
        'instagram_time',
        'tiktok_time'
    ];
}
