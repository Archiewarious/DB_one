<?php
require("lib/DB.php");

$db = new DB;
$table =$db->getTable("users");
echo($table);

$meta = [
    "user" => "Archiewar"
];
print($meta["user"]);

