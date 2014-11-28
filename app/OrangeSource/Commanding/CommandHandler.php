<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 25/11/14
 * Time: 07:08
 */

namespace OrangeSource\Commanding;


interface CommandHandler {

    /**
     * Handle the command
     * @param $method
     * @return mixed
     */
    public function handle($method);
} 