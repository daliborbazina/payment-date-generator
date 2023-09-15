<?php declare(strict_types=1);

/**
 * Sample code for use in job applications.
 * @author Dalibor Bazina <daliborbazina@gmail.com>
 * @link bazina.dev
 */

namespace App\Helpers;

class CsvOutput implements iOutputInterface
{
    public function load($data) : void
    {
        $input = $data['input'];
        ob_start();

        $csvFilename = __DIR__ . '/../../var/' . $input->getFilename() . '.csv';

        if (file_exists($csvFilename)) {
            if (unlink($csvFilename)) {
                echo "Existing CSV file {$input->getFilename()}.csv deleted.\nNew file was generated.\n";
            } else {
                echo "Failed to delete existing CSV file '$csvFilename'.\n";
            }
        }

        $outputStream = fopen($csvFilename, 'w');

        if ($outputStream !== false) {

            fputcsv($outputStream, ['month name', 'salary payment date', 'bonus payment date']);

            for ($i = 0; $i < count($data['data']); $i++) {
                fputcsv($outputStream, [(string) $data['data'][$i]['month'], (string) $data['data'][$i]['base'], (string) $data['data'][$i]['bonus']]);
            }
            fclose($outputStream);

            $csvData = ob_get_clean();
            echo $csvData;
        } else {
            echo "Failed to open PHP output stream for writing.\n";
        }
    }
}