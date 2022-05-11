<?php

namespace DS;
use ParseCsv\Csv;


class ErrorHandling
{
    private int $code;
    private ?string $message;

    public function __construct(int $_code, ?string $_message = null)
    {
        $this->code = $_code; // Set the global code to the one provided
        $this->loadMessageByCode($_code);
        $this->message = $_message ?? $this->message; // Set the global message to the one provided, or get the message from a file


    }

    private function loadMessageByCode(int $code)
    {
        $csv = new Csv(); // New CSV Instance
        $csv->delimiter = ","; // Set the col delimiter to an ","
        $csv->parseFile(APP_ROOT . '/app/config/ErrorCodes.csv'); // Parse the CSV into a array

        foreach ($csv->data as $row) {
            if (array_search($code, $row)) $this->message = $row['MESSAGE']; // if message is found with the matching code set the message
        }
    }

    public static function ThrowCustom(int $code, ?string $message = null)
    {

    }

    public function ShowErrorScreen()
    {
        Controller::view('error', array('code' => $this->code, 'message' => $this->message));
    }

//    public function __toString(): string
//    {
//        return "Error: [$this->code] $this->message"; // Returns the error as a string
//    }
}