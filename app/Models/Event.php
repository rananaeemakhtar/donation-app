<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'tittle',
        'date',
        'start_time',
        'end_time',
        'zoom_ID',
        'phone_number',
        'website',
        'organizer_name',
    ];
}
