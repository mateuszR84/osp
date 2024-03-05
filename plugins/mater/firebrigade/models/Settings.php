<?php

namespace Mater\Firebrigade\Models;

use Lang;
use Mater\Firebrigade\Plugin;
use Model;
use System\Classes\PluginManager;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'mater_firebrigade_settings';

    public $settingsFields = 'fields.yaml';

    public function getOfficerOptions()
    {
        //TODO: consider selecting only firefighters with selected is_chief attribute
        $firefighters = Firefighter::all();

        $options = [];
        foreach ($firefighters as $firefighter) {
            $options[$firefighter->id] = $firefighter->full_name;
        }

        return $options;
    }

    //TODO: add predefined action types
    public static function getActionTypeDefinitions()
    {
        $actionTypes = self::instance()->action_type;

        $options = [];
        foreach ($actionTypes as $type) {
            $slug = $type['slug'];
            $name = $type['type'];
            $options[$slug] = $name;
        }

        return $options;
    }

    public static function getFunctionsDefinitions()
    {
        $functions = self::instance()->functions;

        $options = [];
        foreach ($functions as $function) {
            $slug = $function['slug'];
            $name = $function['type'];
            $options[$slug] = $name;
        }

        return $options;
    }

    public static function getOfficers()
    {
        $officers =  self::instance()->officers;
        return $officers;
    }

    public function getReminderPeriodOptions()
    {
        return [
            'day' => Lang::get('mater.firebrigade::lang.settings.reminders.day'),
            'week' => Lang::get('mater.firebrigade::lang.settings.reminders.week'),
            'month' => Lang::get('mater.firebrigade::lang.settings.reminders.month'),
            'year' => Lang::get('mater.firebrigade::lang.settings.reminders.year'),
        ];
    }

    public function getReminderProviderOptions()
    {
        return [
            'mail' => Lang::get('mater.firebrigade::lang.settings.reminders.mail'),
            'sms' => Lang::get('mater.firebrigade::lang.settings.reminders.sms'),
            'mail_sms' => Lang::get('mater.firebrigade::lang.settings.reminders.mail_sms'),
        ];
    }

    public function getReminderFieldsOptions()
    {
        $pluginManager = PluginManager::instance();
        $plugins = $pluginManager->getPlugins();
        $firebrigade = $plugins['Mater.Firebrigade'];

        $models = $firebrigade->getModels();

        return $models;
    }
}