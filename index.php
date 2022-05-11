<?php
include "app/classes/router/UrlFormatter.php";

include "app/classes/AutoLoadOne.php";
var_dump((new \DS\UrlFormatter())->get_parts());