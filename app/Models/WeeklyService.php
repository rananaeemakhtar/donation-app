<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyService extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        // 'day',
        // 'start_time',
        // 'end_time',
        'image',
        'description'
    ];
}
