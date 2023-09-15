<?php declare(strict_types=1);

/**
 * Sample code for use in job applications.
 * @author Dalibor Bazina <daliborbazina@gmail.com>
 * @link bazina.dev
 */

namespace App\Helpers;

use App\Dto\InputDTO;

class CliMenu {

    public function __construct() {}

    public function display() : InputDTO
    {
        echo "Generate Menu\n";
        echo "1. Json\n";
        echo "2. Array\n";
        echo "3. Csv\n";
        echo "4. Quit\n";

        $todayDate = date('Y-m-d');
        $choice = readline("Enter your choice (1-4): ");

        switch ($choice) {
            case 1:
                $type = 'json';
                $fileName = $this->askForFileNameIfRequired();
                break;
            case 2:
                $type = 'array';
                $fileName = '';
                break;
            case 3:
                $type = 'csv';
                $fileName = $this->askForFileNameIfRequired();
                break;
            case 4:
                echo "Goodbye!\n";
                exit;
            default:
                echo "Invalid choice. Please try again.\n";
                return $this->display();
        }

        return new InputDTO($todayDate, $type, $fileName);
    }

    private function askForFileNameIfRequired(): string
    {
        $generateFile = strtolower(readline("Do you want a file to be generated? (y/n) "));

        if ($generateFile === 'y') {
            return readline("Enter filename: ");
        }

        return '';
    }
}