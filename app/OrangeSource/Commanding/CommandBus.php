<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 25/11/14
 * Time: 06:43
 */

namespace OrangeSource\Commanding;

use Illuminate\Foundation\Application;

class CommandBus {

    protected $commandTranslator;

    /**
    * @var Application
    */
    private $app;

    function __construct(CommandTranslator $commandTranslator, Application $app)
    {
        $this->commandTranslator = $commandTranslator;
        $this->app = $app;
    }
    public function execute($command)
    {
        // Translate that object name into handler class
        $handler = $this->commandTranslator->toCommandHandler($command);
        // Resolve out of IoC container and call handle
        return $this->app->make($handler)->handle($command);
    }
} 