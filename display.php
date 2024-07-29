<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Display</title>
</head>
<body>
    <div class="container my-5">
        <table class="table my-5 ">
            <thead>
                <tr>
                    <th scope="col">Sr.No</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">Services</th>
                    <th scope="col">PDF File</th>
                    <th scope="col">Date & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "skmedia");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM `law`";
                    $result = mysqli_query($conn, $sql);
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $number = $row['number'];
                            $service = $row['service'];
                            $date = isset($row['created']) ? $row['created'] : 'N/A';

                            echo '<tr>
                                    <th scope="row">' . $id . '</th>
                                    <td>' . $name . '</td>
                                    <td>' . $email . '</td>
                                    <td>' . $number . '</td>
                                    <td>' . $service . '</td>
                                    <td><a target="_blank" href="pdf.viewer.php?id=' . $id . '" class="btn btn-sm btn-success">View</a></td>
                                    <td>' . $date . '</td>
                                </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="7">No records found</td></tr>';
                    }
                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
