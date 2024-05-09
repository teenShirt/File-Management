<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    //check if files were uploaded without errors
    if(isset($_FILES["files"])) {
        $target_dir = "C:/file_upload_download/uploads/"; //change this to desired directory to save files

        // Loop through each file
        for($i = 0; $i < count($_FILES["files"]["name"]); $i++) {
            $target_file = $target_dir . basename($_FILES["files"]["name"][$i]);
            $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $allowed_types = array("jpg", "png", "pdf", "jpeg");
            if(!in_array($file_type, $allowed_types)) {
                echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
            } else {
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_file)) {
                    // File upload success, now store information in the database
                    $filename = $_FILES["files"]["name"][$i];
                    $filesize = $_FILES["files"]["size"][$i];
                    $filetype = $_FILES["files"]["type"][$i];

                    // Database connection
                    $db_host = "localhost";
                    $db_user = "root";
                    $db_pass = "";
                    $db_name = "fileupload_download";

                    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

                    if($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // data inserting to the files
                    $sql = "INSERT INTO files (filename, filesize, filetype) VALUES ('$filename', $filesize, '$filetype')";

                    if ($conn->query($sql) === TRUE) {
                        echo "The file " . basename($_FILES["files"]["name"][$i]) . " has been uploaded and the information has been stored in the database.<br>";
                    } else {
                        echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error . "<br>";
                    }

                    $conn->close();
                } else {
                    echo "Sorry, there was an error uploading your file.<br>";
                }
            }
        }
    } else {
        echo "No file was uploaded.<br>";
    }
}
?>

