<?php

namespace DS;

class UrlFormatter
{
    public array|null $parts = null;
    private string $url;

    public function __construct(?string $_url = null)
    {
        $this->url = $_url ?? $_SERVER['REQUEST_URI']; // Get the request URI
        $_parts = explode('/', $this->url); // Chop the URI into parts

        foreach ($_parts as $_part) { // Loop over the local parts
            if (strlen($_part) <= 0) continue; // Check if the part length is longer or equal to 0 then skip this part
            $this->parts[] = $_part; // When length is longer then 0 save it to the variable
        }
    }

    public function get_parts(): array|null
    {
        return $this->parts; // Return the object with the URI parts
    }
}