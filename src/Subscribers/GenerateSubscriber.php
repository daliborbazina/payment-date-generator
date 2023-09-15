<?php declare(strict_types=1);

/**
 * Sample code for use in job applications.
 * @author Dalibor Bazina <daliborbazina@gmail.com>
 * @link bazina.dev
 */

namespace App\Subscribers;

use App\Events\EventDispatcher;
use App\Services\GenerateService;
use App\Helpers\OutputClient;

class GenerateSubscriber implements iEventSubscriber {

    public function __construct(private readonly EventDispatcher $eventDispatcher) {}

    public function handleEvent($event) : void
    {
        $outputClient = new OutputClient();
        $generateService = new GenerateService($outputClient);
        $generateService->generate($event);
    }
}