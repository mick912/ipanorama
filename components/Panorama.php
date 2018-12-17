<?php namespace Mirjan\Ipanorama\components;

use peterhegman\slickslider\models\SlideShows;
use Symfony\Component\HttpFoundation\Request;
use Log;

class Panorama extends \Cms\Classes\ComponentBase
{
    public function componentDetails()
    {
        $items = \Mirjan\Ipanorama\Models\Panorama::all();
        if (count($items) > 0) {
            return [
                'name' => 'Panorama',
                'description' => 'Displays a panorama chosen from the dropdown'
            ];
        } else {
            return [
                'name' => 'Panorama',
                'description' => 'Please create a panoramas in the "Panorama 360" menu'
            ];
        }
    }

    public function defineProperties()
    {
        $items = \Mirjan\Ipanorama\Models\Panorama::all();
        if (count($items) > 0) {
            $optionsArray =  array();
            foreach ($items as $item) {
                $optionsArray[$item->attributes['id']] = $item->attributes['title'];
            }
            return [
                'panorama_id' => [
                    'title'       => 'Panorama',
                    'type'        => 'dropdown',
                    'default'     => $items->first()->attributes['id'],
                    'placeholder' => 'Select panorama',
                    'options'     => $optionsArray
                ]
            ];
        } else {
            return [
            ];
        }
    }

    public function onRun()
    {
        $this->addCss('assets/css/effect.css');
        $this->addCss('assets/css/ipanorama.css');
        $this->addCss('assets/css/ipanorama.theme.default.css');
        $this->addCss('assets/css/ipanorama.theme.modern.css');
        $this->addCss('assets/css/ipanorama.theme.dark.css');
        $this->addCss('assets/css/style.css');

        $this->addJs('assets/js/three.min.js');
        $this->addJs('assets/js/jquery.ipanorama.min.js');
    }

    // This array becomes available on the page as {{ component.slides }}
    public function panoramas()
    {
        $itemId = $this->property('panorama_id');
        $items = \Mirjan\Ipanorama\Models\Panorama::where('id', '=', $itemId)->first();
        return $items;
    }
}
