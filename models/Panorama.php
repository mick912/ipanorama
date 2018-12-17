<?php namespace Mirjan\Ipanorama\Models;

use Illuminate\Support\Facades\App;
use Model;
use Input;
use BackendAuth;
use Log;
use peterhegman\slickslider\Models\Settings;

/**
 * Model
 */
class Panorama extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [

    ];

    public $customMessages = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mirjan_ipanorama_panoramas';

    protected $jsonable = ['content'];

    public function filterFields($fields, $context = null)
    {
        if (isset($fields->type)) {
            if (!is_null($fields->type->value) && $fields->type->value == 'cube') {
                $fields->{'image[left]'}->hidden = false;
                $fields->{'image[right]'}->hidden = false;
                $fields->{'image[top]'}->hidden = false;
                $fields->{'image[bottom]'}->hidden = false;
                $fields->{'image[back]'}->hidden = false;

                $fields->{'image[left]'}->value = null;
                $fields->{'image[right]'}->value = null;
                $fields->{'image[top]'}->value = null;
                $fields->{'image[bottom]'}->value = null;
                $fields->{'image[back]'}->value = null;
            } else {
                $fields->{'image[left]'}->hidden = true;
                $fields->{'image[right]'}->hidden = true;
                $fields->{'image[top]'}->hidden = true;
                $fields->{'image[bottom]'}->hidden = true;
                $fields->{'image[back]'}->hidden = true;
            }
        }
    }
}
