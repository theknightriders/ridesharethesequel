<?php
session_start();
$email = $_SESSION['email'];




$partsOfEmail = explode("@", $email);
$newPicName = $partsOfEmail[0];
$newPicName = str_replace(".", "", $newPicName);
$uploadErrorString = "<span class='error'>";
$uploadSuccessString = "<span class='success'>";
$target_dir = "profilePics/";
$target_file = $target_dir . basename($_FILES["profilePicFile"]["name"]);
$newFileName = $target_dir . $newPicName;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$newFileName .= "." . $imageFileType;

// Check if image file is a actual image or fake image
if(isset($_POST["submitProfilePicChangeButton"])) {
    $check = getimagesize($_FILES["profilePicFile"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadErrorString .= "File is not an image.<br>";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $uploadErrorString .= "Sorry, file already exists.<br>";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["profilePicFile"]["size"] > 500000) {
    $uploadErrorString .= "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadErrorString .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $uploadErrorString .= " Sorry, your file was not uploaded.<br>";

// if everything is ok, try to upload file
} else {

    // Deal with overwriting the previous file
    if (file_exists('$newFileName')) {
        chmod('$newFileName',0755);
        unlink('$newFileName');
    }

    // Try to upload the file
    if (move_uploaded_file($_FILES["profilePicFile"]["tmp_name"], $newFileName)) {

        // Connect to the database
        include ('mysqli_connect.php');

        // Begin preparing the SQL statement
        $sql = "UPDATE users SET profile_image = '" . $newFileName . "' WHERE email = '" . $_SESSION['email'] . "';";

        // Send the SQL statement to the database
        $conn->query($sql);

        // Close the db connection
        $conn->close();

    // One more part to the error message
    } else {
        $uploadErrorString .= "Sorry, there was an error uploading your file.<br>";
    }
}



$uploadErrorString .= "</span>";
// $uploadErrorString needs to be sent to someplace
echo $uploadErrorString;




?>
