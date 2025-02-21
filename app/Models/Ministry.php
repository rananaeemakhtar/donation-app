<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ministry_testimonial()
    {
        return $this->hasMany(Testimonial::class, 'ministry_id');
    }
}
