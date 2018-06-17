<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>File Upload From</title>
</head>
<body>


<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Docs to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>