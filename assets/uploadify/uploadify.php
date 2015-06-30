<?php

/*
  Uploadify v3.1.0
  Copyright (c) 2012 Reactive Apps, Ronnie Garcia
  Released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
 */
//sleep(2);
// Define a destination
$targetFolder = 'upload_news/'; // Relative to the root

if (!empty($_FILES)) {
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetFile = rtrim($targetFolder, '/') . '/' . $_FILES['Filedata']['name'];

    // Validate the file type
    $fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
    $fileParts = pathinfo($_FILES['Filedata']['name']);

    if (in_array(strtolower($fileParts['extension']), $fileTypes)) {
        move_uploaded_file($tempFile, $targetFile);
        echo '1';
    } else {
        echo 'Invalid file type.';
    }
}
?>