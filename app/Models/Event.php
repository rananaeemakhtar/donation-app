<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'start_time',
        'end_time',
        'zoom_id',
        'zoom_link',
        'phone_number',
        'website',
        'organizer_name',
        'audio',
        'description'
    ];

    public function getAudioAttribute($value)
    {
        return Storage::disk(env('FILESYSTEM_DISK'))->url($value);
    }
}
