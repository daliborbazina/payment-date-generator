<?php declare(strict_types=1);

/**
 * Sample code for use in job applications.
 * @author Dalibor Bazina <daliborbazina@gmail.com>
 * @link bazina.dev
 */

namespace App\Dto;
class InputDTO
{
    public function __construct(private readonly string $date, private readonly string $type, private readonly string $fileName) {}

    public function getDate() : string
    {
        return $this->date;
    }

    public function getType() : string
    {
        return $this->type;
    }

    public function getFilename() : string
    {
        return $this->fileName;
    }
}