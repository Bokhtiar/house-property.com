<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $primaryKey = 'property_id';

    protected $fillable = [
        'name',
        'total_unit',
        'description',
        'image',
        'country',
        'state',
        'city',
        'zip_code',
        'address',
        'map_link',
  
    ];
}
