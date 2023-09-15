<?php declare(strict_types=1);

/**
 * Sample code for use in job applications.
 * @author Dalibor Bazina <daliborbazina@gmail.com>
 * @link bazina.dev
 */

namespace App\Events;

/**
 * Singleton-based implementation of an event dispatcher.
 * It's designed to facilitate event-driven programming by allowing objects to subscribe (listen)
 * to events and dispatch (trigger) those events.
 */
class EventDispatcher {
    /**
     * @var EventDispatcher|null
     * Holds the single instance of the EventDispatcher class.
     */
    private static ?EventDispatcher $instance = null;

    /**
     * @var array
     * An associative array that stores event names as keys and arrays of callable listeners as values.
     */
    private array $listeners = [];

    private function __construct() {}

    public static function getInstance() : EventDispatcher {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function subscribe(string $eventName, callable $listener) : void {
        $this->listeners[$eventName][] = $listener;
    }

    public function dispatch(string $eventName, $data = null) : void {
        if (isset($this->listeners[$eventName])) {
            foreach ($this->listeners[$eventName] as $listener) {
                call_user_func($listener, $data);
            }
        }
    }
}