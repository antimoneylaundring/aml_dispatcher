<?php
include('db.php');

if (isset($_POST['importCSVFileButton'])) {
    $fileName = $_FILES['csv_file']['tmp_name'];

    if ($_FILES['csv_file']['size'] > 0) {
        $file = fopen($fileName, 'r');

        // Skip the first line if it contains column headers
        fgetcsv($file);

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            // Assuming CSV columns are in this order:
            $date = mysqli_real_escape_string($conn, $column[0]);
            $name = mysqli_real_escape_string($conn, $column[1]);
            $groupName = mysqli_real_escape_string($conn, $column[2]);
            $url = mysqli_real_escape_string($conn, $column[3]);
            $id = mysqli_real_escape_string($conn, $column[4]);
            $password = mysqli_real_escape_string($conn, $column[5]);
            $phoneNo = mysqli_real_escape_string($conn, $column[6]);
            $mailId = mysqli_real_escape_string($conn, $column[7]);

            $sql = "INSERT INTO all_credentials (date, name, group_name, url, id, password, phone_no, mail_id) VALUES ('$date', '$name', '$groupName', '$url', '$id', '$password', '$phoneNo', '$mailId')";

            if ($conn->query($sql) === TRUE) {
                // header("Location: index.php");
                $_SESSION['form_submitted'] = true;
                echo $sql;
                // header("Location: submitdata.php");
                // exit();
            } 
            else {
                echo "Error: " . $sql . "<br>" .  $conn->error;
            }
            echo "Successfull";
        }

        fclose($file);
        echo "CSV Data Imported Successfully!";
        header("Location: ../all_credential.php");
        exit();
    } else {
        echo "File size is zero.";
    }
    
}

mysqli_close($conn);
?>
