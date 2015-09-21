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
class ProjectNoteValidator extends LaravelValidator
{
    protected $rules=[
        'project_id'=>'required|integer',
        'title'=>'required',
        'note'=>'required',
    ];
}