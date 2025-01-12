<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AudioLibrary extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date_of_recording',
        'audio',
    ];


    public function getAudioAttribute($value)
    {
        return Storage::disk(env('FILESYSTEM_DISK'))->url($value);
    }
}
