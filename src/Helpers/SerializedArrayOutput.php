<?php declare(strict_types=1);

/**
 * Sample code for use in job applications.
 * @author Dalibor Bazina <daliborbazina@gmail.com>
 * @link bazina.dev
 */

namespace App\Helpers;

class SerializedArrayOutput implements iOutputInterface
{
    public function load($data):string
    {
        return serialize($data['data']);
    }
}