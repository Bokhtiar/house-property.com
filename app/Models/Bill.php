<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $primaryKey = 'bill_id';

    protected $fillable = [
        'property_id',
        'unit_id',
        'bill_pay_date',
        'create_at',
        'notes',
    ];

    /* property releation */
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'property_id');
    }

    /* unit releation */
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'unit_id');
    }
}
