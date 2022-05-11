<?php

namespace DS;

use PHPUnit\Framework\TestCase;

class UrlFormatterTest extends TestCase
{
    private string $url;
    public array|null $parts;

    public function testGet_parts()
    {
        $expected = array('users', 'create');

        $this->url = '/users/create' ?? $_SERVER['REQUEST_URI']; // Get the request URI
        $this->parts = null;
        $_parts = explode('/', $this->url);

        foreach ($_parts as $_part) {
            if (strlen($_part) <= 0) continue;
            $this->parts[] = $_part;
        }

        $actual = $this->parts;

        $this->assertEquals($expected, $actual);
    }

}
