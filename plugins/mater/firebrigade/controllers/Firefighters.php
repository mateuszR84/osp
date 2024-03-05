<?php namespace Mater\Firebrigade\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Firefighters Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class Firefighters extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var array required permissions
     */
    public $requiredPermissions = ['mater.firebrigade.firefighters'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Mater.Firebrigade', 'firebrigade', 'firefighters');

        $this->addJs('/plugins/mater/firebrigade/assets/js/duedates.js');
    }
}
