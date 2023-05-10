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
    public static function total_room($id){
        $units = self::where('property_id', $id)->get();
        $rooms = 0;
        foreach ($units as $unit) {
            $rooms += $unit->bedroom; 
        }
        return $rooms;
    }

    /* total available room */
    public static function total_available_room($id){
        return self::where('property_id', $id)->where('tenant_id', null)->count();
    }
}
