<?php declare(strict_types=1);

/**
 * Sample code for use in job applications.
 * @author Dalibor Bazina <daliborbazina@gmail.com>
 * @link bazina.dev
 */

namespace App\Helpers;

class JsonOutput implements iOutputInterface
{
    public function load($data): bool|string
    {
        $input = $data['input'];
        if($input->getFilename() != '')
        {
            $jsonFilename = __DIR__ . '/../../var/' . $input->getFilename() . '.json';

            if (file_exists($jsonFilename)) {
                if (unlink($jsonFilename)) {
                    echo "Existing JSON file {$input->getFilename()}.json deleted.\nNew file was generated.\n";
                } else {
                    echo "Failed to delete existing JSON file '$jsonFilename'.\n";
                }
            }

            file_put_contents($jsonFilename, json_encode($data['data'], JSON_PRETTY_PRINT));

            //ToDo: Add validation

        } else {
            echo json_encode($data['data'], JSON_PRETTY_PRINT);
        }
        return true;
    }
}