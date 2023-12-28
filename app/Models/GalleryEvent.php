<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryEvent extends Model
{
    use HasFactory;

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'event_id');
    }
}
