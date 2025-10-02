<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'title', 'description', 'address', 'phone', 'email',  'newsletter_email',
        'open_hours', 'facebook', 'instagram', 'twitter', 'linkedin'
    ];
}
