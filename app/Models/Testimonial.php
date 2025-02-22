<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function testimonial_ministry()
    {
        return $this->belongsTo(Ministry::class,'ministry_id');
    }
}
