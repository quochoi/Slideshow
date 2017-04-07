<?php
namespace Foostart\Slideshow\Validators;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;

use Illuminate\Support\MessageBag as MessageBag;

class SlideshowAdminValidator extends AbstractValidator
{
    protected static $rules = array(
        'slideshow_name' => 'required',
    );

    protected static $messages = [];


    public function __construct()
    {
        Event::listen('validating', function($input)
        {
        });
        $this->messages();
    }

    public function validate($input) {

        $flag = parent::validate($input);

        $this->errors = $this->errors?$this->errors:new MessageBag();

        $flag = $this->isValidTitle($input)?$flag:FALSE;

        return $flag;
    }


    public function messages() {
        self::$messages = [
            'required' => ':attribute '.trans('slideshow::slideshow_admin.required')
        ];
    }

    public function isValidTitle($input) {

        $flag = TRUE;

        $min_lenght = config('slideshow_admin.name_min_length');
        $max_lenght = config('slideshow_admin.name_max_length');


        $slideshow_name = @$input['slideshow_name'];

        if ((strlen($slideshow_name) < $min_lenght)  || ((strlen($slideshow_name) > $max_lenght))) {
            $this->errors->add('name_unvalid_length', trans('name_unvalid_length', ['NAME_MIN_LENGTH' => $min_lenght, 'NAME_MAX_LENGTH' => $max_lenght]));
            $flag = TRUE;
        }

        return $flag;
    }
}