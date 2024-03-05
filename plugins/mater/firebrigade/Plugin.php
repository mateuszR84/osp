<?php

namespace Mater\Firebrigade;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Mater\Firebrigade\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'mater.firebrigade.some_permission' => [
                'tab' => 'Firebrigade',
                'label' => 'Some permission'
            ],
        ];
    }
    
    public function registerSettings()
    {
        return [
            'firebrigade' => [
                'label' => 'mater.firebrigade::lang.settings.label',
                'description' => 'mater.firebrigade::lang.settings.description',
                'category' => 'mater.firebrigade::lang.settings.category',
                'icon' => 'icon-fire',
                'class' => 'Mater\Firebrigade\Models\Settings',
                'order' => 100,
                'permissions' => ['sevenseven.games.*']
            ]
        ];
    }
}
