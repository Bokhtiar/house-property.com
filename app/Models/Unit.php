<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'units';
    protected $primaryKey = 'unit_id';

    protected $fillable = [
        'unit_name',
        'bedroom',
        'baths',
        'kitchen',
        'property_id',
    ];
}
