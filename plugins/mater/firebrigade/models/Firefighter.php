<?php namespace Mater\Firebrigade\Models;

use Model;

/**
 * Firefighter Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Firefighter extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'mater_firebrigade_firefighters';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'duty_function' => 'required',
        'membership_type' => 'required',
        'email' => 'email|unique:mater_firebrigade_firefighters',
    ];
    
    /**
     * @var string table name
     */
    public $jsonable = [
        'additional_info',
    ];

    public function getDriverLicenseOptions()
    {
        return [
            'am' => 'AM',
            'a1' => 'A1',
            'a2' => 'A2',
            'a' => 'A',
            'b1' => 'B1',
            'b' => 'B',
            'be' => 'B+E',
            'c' => 'C',
            'c1' => 'C1',
            'c1e' => 'C1+E',
            'ce' => 'C+E',
            'd' => 'D',
            'd1' => 'D1',
            'd1e' => 'D1+E',
            'de' => 'D+E',
            't' => 'T',
        ];    
    }

    public function getMembershipTypeOptions()
    {
        return [
            'active' => 'mater.firebrigade::lang.models.firefighter.membership.type_active',
            'supportive' => 'mater.firebrigade::lang.models.firefighter.membership.type_supportive',
            'honorable' => 'mater.firebrigade::lang.models.firefighter.membership.type_honorable',
        ];
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;     
    }
}
