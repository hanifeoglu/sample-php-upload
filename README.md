# sample-php-upload
php upload sample code with control

https://www.w3schools.com/Php/php_file_upload.asp

PHP script explained:

$target_dir = "uploads/" - specifies the directory where the file is going to be placed
$target_file specifies the path of the file to be uploaded
$uploadOk=1 is not used yet (will be used later)
$imageFileType holds the file extension of the file (in lower case)
Next, check if the image file is an actual image or a fake image



form.php
html post form

Upload.php
Check if File Already Exists
Limit File Size
Limit File Type
Make sure the 'uploads' folder exists
header("Refresh:5; url=form.php");
header("Location: table.php?FilesName=$filename");


Read.php
Read uploads/

Table.php
//read  it upload folder in grt url in files name
$file = file_get_contents('uploads/'.$url);

//explode it pear with space after
$lines = explode("\n", $file);
//unset($lines[0]);

//start table here
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
    echo '</tr>'; // end td
}
echo '</table>'; // end table


?>



