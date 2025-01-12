<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function getImageAttribute($value)
    {
        return Storage::disk(env('FILESYSTEM_DISK'))->path($value);
    }
}
