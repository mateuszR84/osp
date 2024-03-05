<?php namespace Mater\Firebrigade\Models;

use Model;

/**
 * Unit Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Unit extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'mater_firebrigade_units';

    /**
     * @var array rules for validation
     */
    public $rules = [];
}
