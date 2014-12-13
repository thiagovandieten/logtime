<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 13/12/14
 * Time: 16:26
 */
namespace OrangeSource\Validation;

class CheckClass {

    public function notUser($email)
    {
        return class_basename($email) != 'User'; //class_basename is een laravel helper, zie docs
    }
}