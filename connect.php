<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adult = $_POST['adult'];
    $child = $_POST['children']; // corrected the name here
    $indate = $_POST['indate'];
    $outdate = $_POST['outdate'];
    $roompref = $_POST['room_preference']; // corrected the name here

    $conn = new mysqli('localhost', 'root', '', 'dbms_project');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO guests (name, email, phone, adult, child) VALUES (?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bind_param("ssiii", $name, $email, $phone, $adult, $child);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();

        // Close the connection
        $conn->close();
    }
?>