<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skmedia";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $number = $conn->real_escape_string($_POST['number']);
    $service = $conn->real_escape_string($_POST['service']);

    // Handle file upload
    if (isset($_FILES['pdffile']) && $_FILES['pdffile']['error'] == 0) {
        $file = $_FILES['pdffile']['tmp_name'];
        $file_name = $_FILES['pdffile']['name'];
        $file_size = $_FILES['pdffile']['size'];
        $file_type = $_FILES['pdffile']['type'];
        $file_content = addslashes(file_get_contents($file));

        // Insert data into database
        $sql = "INSERT INTO law (name, email, number, service, file_name, file_size, file_type, file_content)
                VALUES ('$name', '$email', '$number', '$service', '$file_name', '$file_size', '$file_type', '$file_content')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('!!! We Will connect shortly !!!');
                    window.location.href = 'index.html';
                    </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading file.";
    }
}

// Close connection
$conn->close();
?>
