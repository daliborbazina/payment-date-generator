<?php declare(strict_types=1);

/**
 * Sample code for use in job applications.
 * @author Dalibor Bazina <daliborbazina@gmail.com>
 */

namespace App\Subscribers;

interface iEventSubscriber {
    public function handleEvent($event);
}