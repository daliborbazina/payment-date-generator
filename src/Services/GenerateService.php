<?php declare(strict_types=1);

/**
 * Sample code for use in job applications.
 * @author Dalibor Bazina <daliborbazina@gmail.com>
 * @link bazina.dev
 */

namespace App\Services;

use App\Helpers\OutputClient;

class GenerateService {

    public function __construct(private readonly OutputClient $output) {}

    public function generate($data) : void
    {
        $input = $data['input'];
        $outputClass = 'App\Helpers\\' . ucfirst($input->getType()) . 'Output';

        $generator = new $outputClass;

        $this->output->setOutput($generator);
        $this->output->loadOutput($data);
    }
}
