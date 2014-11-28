<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 25/11/14
 * Time: 06:47
 */

namespace OrangeSource\Commanding;


class CommandTranslator {

    public function toCommandHandler($command)
    {
        $handler = str_replace('Command', 'CommandHandler', get_class($command)) ; //LoginAuthenticationCommandHandler

        if (! class_exists($handler))
        {
            $message = "Command handler [$handler] does not exist";

            throw new \Exception($message);
        }

        return $handler;
    }
}