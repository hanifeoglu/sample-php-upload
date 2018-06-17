<link rel="stylesheet" href="css/custom.css">
<?php

$url = $_GET["FilesName"];

$file = file_get_contents('uploads/'.$url);

$lines = explode("\n", $file);
//unset($lines[0]);

echo '<table>';
foreach ($lines as $key => &$line) {
    echo '<tr>';
    $line = explode(" ", $line);
    foreach ($line as $item) {
        if ($key)
            echo '<td>' .$item.'</td>';
        else

            echo '<th>' . $item. '</th>';
    }
    echo '</tr>';
}
echo '</table>';



?>