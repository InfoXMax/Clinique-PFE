<?php
    // Include the database configuration file
    include('backend/admin/assets/inc/config.php');

    // Check if the form is submitted
    if(isset($_POST['submit'])) {
        // Get the form data
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dept = $_POST['dept'];
        $email = $_POST['email'];

        // Get the uploaded file details
        $image = $_FILES['image'];
        $image_name = $image['name'];
        $image_tmp = $image['tmp_name'];
        $image_size = $image['size'];
        $image_error = $image['error'];

        // Check if the file was uploaded successfully
        if($image_error == 0) {
            // Move the uploaded file to a designated directory
            $upload_dir = 'assets/files/img/';
            $image_path = $image_name;
            move_uploaded_file($image_tmp, $upload_dir);

            // Insert the form data into the database
            $stmt = $mysqli->prepare("INSERT INTO his_docs (doc_fname, doc_lname, doc_dept, doc_email, doc_image) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $fname, $lname, $dept, $email, $image_path);
            $stmt->execute();
            $stmt->close();

            // Redirect to a success page
            header("Location: success.php");
            exit();
        } else {
            // Handle file upload error
            echo "Error uploading file. Please try again.";
        }
    }
?>
