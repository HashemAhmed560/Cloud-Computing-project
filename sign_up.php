<?php
$connect = mysqli_connect('database', 'php_docker', 'password', 'php_docker');

if (isset($_POST['sign_up'])) {
    if (isset($_POST['id'], $_POST['name'], $_POST['age'], $_POST['cgpa'])) {
        $id = mysqli_real_escape_string($connect, $_POST['id']);
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $age = mysqli_real_escape_string($connect, $_POST['age']);
        $cgpa = mysqli_real_escape_string($connect, $_POST['cgpa']);

        // Validate CGPA
        if (empty($id) || empty($name) || empty($age) || empty($cgpa)) {
            echo "<script>alert('Please fill out all fields.');</script>";
        } elseif (!is_numeric($cgpa) || $cgpa < 0 || $cgpa > 4) {
            echo "<script>alert('Invalid CGPA. Please enter a value between 0 and 4.');</script>";
        } else {
            // Check if the ID already exists
            $checkIdQuery = "SELECT id FROM students WHERE id = '$id'";
            $idResult = mysqli_query($connect, $checkIdQuery);
            if (mysqli_num_rows($idResult) > 0) {
                echo "<script>alert('This ID is already registered.');</script>";
            } else {
                // Insert the new record since ID does not exist
                $query = "INSERT INTO students (id, name, age, cgpa) 
                          VALUES ('$id', '$name', '$age', '$cgpa')";
                if (mysqli_query($connect, $query)) {
                    header("Location: redirection.php");
                    exit;
                } else {
                    echo "<script>alert('Error: Unable to insert data into the database. Please try again later.');</script>";
                }
            }
        }
    } else {
        echo "<script>alert('Please fill out all fields.');</script>";
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #121212;
            color: #d1c7ac;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        form {
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            background-color: #555;
            color: #fff;
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #b59f3b;
            color: #121212;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        button:hover {
            background-color: #a88e2a;
        }
    </style>
    <title>Register new Student</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="post" action="">
                <h1>Create Account</h1>
                <input type="text" placeholder="Student ID" name="id" />
                <input type="text" placeholder="Name" name="name" />
                <input type="text" placeholder="Age" name="age" />
                <input type="text" placeholder="CGPA" name="cgpa" />
                <button name="sign_up" value="sign_up">Sign Up</button>
            </form>
        </div>
    </div>
</body>
</html>