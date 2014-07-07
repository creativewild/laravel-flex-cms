<?php namespace HugoKalidas\FlexCms\Validators;
use HugoKalidas\FlexCms\Abstracts\ValidatorBase;

class Login extends ValidatorBase
{

    protected $rules = array(
        'email'         =>  'required|email',
        'password'      =>  'required'
    );

}