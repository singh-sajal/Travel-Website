<?php

namespace App\Models;

use App\Models\Destination;
use App\Models\PackageImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id', 'id');
    }
}
