<?php
require_once 'connect.php';
session_start();

if ($_SESSION['user_type'] !== "1") {
    header('Location: index.php');
}


$sql = "SELECT * FROM users";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Admin page</title>
    <script src="https://kit.fontawesome.com/e0b18861b4.js" crossorigin="anonymous"></script>
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link href="styles/admin.css" rel="stylesheet">
</head>

<body>
    <div>
    <a href="welcome.php" class="btn btn-info pull-right back">Назад кон мојот профил</a>
    </div>
    <?php
    if ($stmt->rowCount() == 0) {
        echo "<h2 class='text-center'>No users found</h2>";
    } else {


        echo "<div>
    <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Lastname</th>
                <th>Company</th>
                <th>email</th>
                <th>Phone Number</th>                           
                <th>Number of employees</th>                           
                <th>Sector</th>                                                                                                            
                <th>Delete User</th>                                                      
            </tr>";
        while ($row = $stmt->fetch()) {

            $id = $row['id'];
            $name = $row['name'];
            $lastname = $row['lastname'];
            $company = $row['company'];
            $email = $row['email'];
            $phoneNumber = $row['phone_number'];
            $noOfEmployees = $row['no_of_employees'];
            $sector = $row['sector'];

            echo " <tr>
        <td>$id</td>
        <td>$name</td>
        <td>$lastname</td>
        <td>$company</td>
        <td>$email</td>
        <td>$phoneNumber</td>
        <td>$noOfEmployees</td>
        <td>$sector</td>
        <td><a class='btn btn-danger' href='adminDelete.php?id=$id'>Delete</a></td>
            </tr>";
        }

        echo "</table></div>";
    }

    ?>
</body>

</html>