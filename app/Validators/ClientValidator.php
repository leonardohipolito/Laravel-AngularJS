<?php
/**
 * Created by PhpStorm.
 * User: leonardo
 * Date: 11/09/15
 * Time: 21:48
 */

namespace FacilitaProject\Validators;


use Prettus\Validator\LaravelValidator;

/**
 * Class ClientValidator
 * @package FacilitaProject\Validators
 */
class ClientValidator extends LaravelValidator
{
    protected $rules=[
        'name'=>'required',
        'responsible'=>'required',
        'email'=>'required'
    ];
}