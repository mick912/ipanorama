<?php namespace Mirjan\ipanorama\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use BackendAuth;

class Panoramas extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Mirjan.Ipanorama', 'panoramas');
    }
}
