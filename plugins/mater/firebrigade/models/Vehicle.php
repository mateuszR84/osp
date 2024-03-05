<?php namespace Mater\Firebrigade\Models;

use Model;

/**
 * Vehicle Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Vehicle extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'mater_firebrigade_vehicles';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public function getTypeOptions()
    {
        return [
            'car' => 'mater.firebrigade::lang.models.vehicle.type_car',
            'boat' => 'mater.firebrigade::lang.models.vehicle.type_boat',
            'other' => 'mater.firebrigade::lang.models.vehicle.type_other',
        ];    
    }
    
    public function getStatusOptions()
    {
        return [
            'active' => 'mater.firebrigade::lang.models.vehicle.status_active',
            'not_in_use' => 'mater.firebrigade::lang.models.vehicle.status_not_in_use',
            'not_active' => 'mater.firebrigade::lang.models.vehicle.status_not_active',
        ];    
    }

    public function getFuelOptions()
    {
        return [
            'gas' => 'mater.firebrigade::lang.models.vehicle.fuel_gas',
            'diesel' => 'mater.firebrigade::lang.models.vehicle.fuel_diesel',
        ];    
    }
}
