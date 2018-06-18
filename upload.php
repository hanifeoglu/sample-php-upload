<?php
session_start();
include_once "layout_header.php";
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filename = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["$_FILES"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an docs - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an csv.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.".'</br>';
    $_SESSION['message'] = 'Sorry, file already exists!';
    header("Refresh:5; url=index.php");
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.';
    $uploadOk = 0;
    exit;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.".'</br>';
    $_SESSION['message'] = 'Sorry, your file is too large.';
    header("Refresh:5; url=index.php");
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.';

    $uploadOk = 0;
    exit;
}
// Allow certain file formats
if($imageFileType != "xls" && $imageFileType != "xlsx" && $imageFileType != "csv"
    && $imageFileType != "doc" ) {
    echo "Sorry, only xls, xlsx, csv & doc files are allowed.".'</br>';
    $_SESSION['message'] = 'Sorry, only xls, xlsx, csv & doc files are allowed.';
    header("Refresh:5; url=index.php");
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.';
    $uploadOk = 0;
    exit;
}
// make sure the 'uploads' folder exists
// if not, create it
if(!is_dir($target_dir)){
    mkdir($target_dir, 0777, true);
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.".'</br>';
    $_SESSION['message'] = 'Sorry, your file was not uploaded.';
    header("Refresh:5; url=form.php");
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.';
    exit;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded".'</br>';
        header("Location: table.php?FilesName=$filename");


    } else {
        echo "Sorry, there was an error uploading your file.".'</br>';
        $_SESSION['message'] = 'Sorry, there was an error uploading your file.';
        header("Refresh:5; url=index.php");
        echo 'You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.';
    }
}
include_once "layout_footer.php";
?>
