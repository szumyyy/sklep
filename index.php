<?php

declare(strict_types=1);

//include("C:\projects\Git\src\Utils\debug.php");
//include_once("C:\projects\Git\src\Utils\debug.php");
//require("C:\projects\Git\src\Utils\debug.php");

namespace App;

require_once("C:\projects\Git\src\Utils\debug.php");

$action =$_GET['action'] ?? null;

include_once("templates/pages/list.php");
/*if (!empty($_GET['action'])){
    $action =$_GET['action'];
} else {
    $action = null;
}*/

