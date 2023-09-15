<?php declare(strict_types=1);

/**
 * Sample code for use in job applications.
 * @author Dalibor Bazina <daliborbazina@gmail.com>
 * @link bazina.dev
 */

namespace App\Helpers;

class OutputClient
{
    public iOutputInterface $output;

    public function setOutput(iOutputInterface $outputType): void
    {
        $this->output = $outputType;
    }

    public function loadOutput($data)
    {
        return $this->output->load($data);
    }
}