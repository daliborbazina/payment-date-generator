<?php declare(strict_types=1);

/**
 * Sample code for use in job applications.
 * @author Dalibor Bazina <daliborbazina@gmail.com>
 */


namespace App\Subscribers;

use App\Helpers\PaymentCalculator;
use App\Services\PaymentService;
use App\Events\EventDispatcher;

class PaymentSubscriber implements iEventSubscriber {

    public function __construct(private readonly EventDispatcher $eventDispatcher) {}

    public function handleEvent($event) : void
    {
        $paymentCalculator = new PaymentCalculator();
        $paymentService = new PaymentService($this->eventDispatcher, $paymentCalculator);
        $paymentService->calc($event);
    }
}