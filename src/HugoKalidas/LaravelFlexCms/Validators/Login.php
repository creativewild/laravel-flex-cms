<?php namespace HugoKalidas\LaravelFlexCms\Validators;
use HugoKalidas\LaravelFlexCms\Abstracts\ValidatorBase;

class Login extends ValidatorBase
{

    protected $rules = array(
        'email'         =>  'required|email',
        'password'      =>  'required'
    );

}