<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tenant extends Model
{
    use HasFactory;
    protected $table = 'tenants';
    protected $primaryKey = 'tenant_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'contact_number',
        'job',
        'age',
        'familly_member',
        'email',
        'password',

        'p_address',
        'p_country',
        'p_state',
        'p_city',
        'p_zip_code',

        'present_address',
        'present_country',
        'present_state',
        'present_city',
        'present_zip_code',

        'property_id',
        'unit_id',
        'lease_start_date',
        'lease_end_date',
        'general_rent',
        'security_deposit',
        'late_fee',
        'incident_recipt',
        'payment_due_on_date',
        'document'


    ];

    /* property */
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'property_id');
    }

    /* unit */
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'unit_id');
    }
}
