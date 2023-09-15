<?php declare(strict_types=1);

/**
 * Sample code for use in job applications.
 * @author Dalibor Bazina <daliborbazina@gmail.com>
 * @link bazina.dev
 */

require_once __DIR__ . '/../vendor/autoload.php';

use App\Events\EventDispatcher;
use App\Subscribers\PaymentSubscriber;
use App\Subscribers\GenerateSubscriber;
use App\Helpers\CliMenu;

$menu = new CliMenu();
$data = $menu->display();

$eventDispatcher = EventDispatcher::getInstance();
$paymentSubscriber = new PaymentSubscriber($eventDispatcher);
$generateSubscriber = new GenerateSubscriber($eventDispatcher);

$eventDispatcher->subscribe('calc', [$paymentSubscriber, 'handleEvent']);
$eventDispatcher->subscribe('generate', [$generateSubscriber, 'handleEvent']);
$eventDispatcher->dispatch('calc', $data);