<?php namespace Mirjan\Ipanorama;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Mirjan\Ipanorama\Components\Panorama' => 'panorama'
        ];
    }

    public function registerMarkupTags()
    {
        return [
            'functions' => [
                // Using an inline closure
                'numberToBoolean' => [$this, 'numberToBoolean']
            ]
        ];
    }

    public function numberToBoolean($number)
    {

        if ($number == 1) {
            return 'true';
        } else {
            return 'false';
        }
    }

}
