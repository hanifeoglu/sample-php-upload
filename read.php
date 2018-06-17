
<?php

$dir = "uploads/";
$files = scandir($dir);
rsort($files);
    foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
    echo "FileName : <a href='table.php?FilesName=$file'> $file </a></br>";

    }
}
