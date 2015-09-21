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
class ProjectValidator extends LaravelValidator
{
    protected $rules=[
        'owner_id'=>'required|integer',
        'client_id'=>'required|integer',
        'name'=>'required',
        'description'=>'required',
    ];
}