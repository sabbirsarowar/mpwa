<?php

$data = file_get_contents("php://input");

file_put_contents("messages.txt", $data.PHP_EOL, FILE_APPEND);

echo "OK";

?>