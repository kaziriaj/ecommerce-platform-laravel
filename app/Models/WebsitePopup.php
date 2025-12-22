<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsitePopup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'short_description', 'image', 'status'
    ];
}
