<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideShow extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',	'title_1',
        'title_2',	'sub',	'price',	'photo',
        'link', 'status'

    ];
}
