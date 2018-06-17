# sample-php-upload
php upload sample code with control

https://www.w3schools.com/Php/php_file_upload.asp

PHP script explained:

$target_dir = "uploads/" - specifies the directory where the file is going to be placed
$target_file specifies the path of the file to be uploaded
$uploadOk=1 is not used yet (will be used later)
$imageFileType holds the file extension of the file (in lower case)
Next, check if the image file is an actual image or a fake image


Create The HTML Form

<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

Some rules to follow for the HTML form above:

Make sure that the form uses method="post"
The form also needs the following attribute: enctype="multipart/form-data". It specifies which content-type to use when submitting the form
Without the requirements above, the file upload will not work.

Other things to notice:

The type="file" attribute of the <input> tag shows the input field as a file-select control, with a "Browse" button next to the input control
The form above sends data to a file called "upload.php", which we will create next.


Upload.php

Check if File Already Exists
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

Limit File Size
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

Limit File Type
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

/ Make sure the 'uploads' folder exists
// if not, create it
if(!is_dir($target_dir)){
    mkdir($target_dir, 0777, true);
}
Complete Upload File PHP Script

Read.php

<?php

$dir = "uploads/";
$files = scandir($dir);
rsort($files);
    foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
    echo "FileName : <a href='table.php?FilesName=$file'> $file </a></br>";

    }
}

<link rel="stylesheet" href="css/custom.css">
<?php
//get url in files name
$url = $_GET["FilesName"];

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



