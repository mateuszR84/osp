<?php

namespace Mater\Firebrigade\Models;

use Carbon\Carbon;
use Model;

/**
 * Action Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Action extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'mater_firebrigade_actions';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $hasMany = [
        'firefighters' => Firefighter::class,
    ];

    public function getTypeOptions()
    {
        return Settings::getActionTypeDefinitions();
    }

    public function getOfficerOptions()
    {
        $officersIds = Settings::getOfficers();

        $options = [];
        foreach ($officersIds as $officerId) {
            $officer = Firefighter::find($officerId['officer']);
            $options[$officerId['officer']] = $officer->full_name;
        }

        return $options;
    }

    public function getDurationAttribute()
    {
        $started = Carbon::parse($this->started_at);
        $ended = Carbon::parse($this->ended_at);

        $diffInHours = $ended->diffInHours($started);
        $diffInMinutes = $ended->diffInMinutes($started) %60;

        $formattedDuration = $diffInHours . ':' . str_pad($diffInMinutes, 2, '0', STR_PAD_LEFT);

        return $formattedDuration;
    }
}
