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

        'general_rent',
        'security_deposit',
        'late_fee',
        'incident_receipt',
        'rent_type',
        'tenant_id',
    ];

    /* total room */
    public static function total_room($property_id){
        $units = self::where('property_id', $property_id)->get();
        $rooms = 0;
        foreach ($units as $unit) {
            $rooms += $unit->bedroom; 
        }
        return $rooms;
    }

    /* total available room */
    public static function total_available_room($property_id){
        return self::where('property_id', $property_id)->where('tenant_id', null)->count();
    }

    /* current_rent */
    public static function current_rent($tenant_id, $property_id, $unit_id){
        $rent = self::where('tenant_id', $tenant_id)->where('property_id', $property_id)->where('unit_id', $unit_id)->first(['general_rent']);
        return $rent->general_rent;
    }
}
