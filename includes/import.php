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
            // working_date, name, platform, post_description, post_display_url, source_url, destination_url, Screenshot, category, handler, upi_id, account_no, post_date, phone_number, transaction_id
            $working_date = mysqli_real_escape_string($conn, $column[0]);
            $name = mysqli_real_escape_string($conn, $column[1]);
            $plateform = mysqli_real_escape_string($conn, $column[2]);
            $post_description = mysqli_real_escape_string($conn, $column[3]);
            $post_display_url = mysqli_real_escape_string($conn, $column[4]);
            $source_url = mysqli_real_escape_string($conn, $column[5]);
            $destination_url = mysqli_real_escape_string($conn, $column[6]);
            // $screenshot = mysqli_real_escape_string($conn, $column[7]);
            $category = mysqli_real_escape_string($conn, $column[7]);
            $handler = mysqli_real_escape_string($conn, $column[8]);
            $upi_id = mysqli_real_escape_string($conn, $column[9]);
            $account_no = mysqli_real_escape_string($conn, $column[10]);
            $post_date = mysqli_real_escape_string($conn, $column[11]);
            $phone_number = mysqli_real_escape_string($conn, $column[12]);
            $transaction_id = mysqli_real_escape_string($conn, $column[13]);

            $sql = "INSERT INTO test (working_date, name, plateform, post_description, post_display_url, source_url, destination_url, Screenshot, category, handler, upi_id, account_no, post_date, phone_number, transaction_id) VALUES ('$working_date', '$name', '$plateform', '$post_description', '$post_display_url', '$source_url', '$destination_url', 'NA', '$category', '$handler', '$upi_id', '$account_no', '$post_date', '$phone_number', '$transaction_id')";

            // if ($conn->query($sql) === TRUE) {
            //     // header("Location: index.php");
            //     $_SESSION['form_submitted'] = true;
            //     echo $sql;
            //     // header("Location: submitdata.php");
            //     // exit();
            // } 
            // else {
            //     echo "Error: " . $sql . "<br>" .  $conn->error;
            // }
            echo "working_date: $working_date, name: $name, plateform: $plateform, post_description: $post_description, post_display_url: $post_display_url, source_url: $source_url, destination_url: $destination_url, Screenshot: NA, category: $category, handler: $handler, upi_id: $upi_id, account_no: $account_no, post_date: $post_date, phone_number: $phone_number, transaction_id: $transaction_id";
        }

        fclose($file);
        echo "CSV Data Imported Successfully!";
        // header("Location: test.php");
        // exit();
    } else {
        echo "File size is zero.";
    }
    
}

mysqli_close($conn);
?>
