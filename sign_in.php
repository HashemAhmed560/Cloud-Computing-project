<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="all.min.css">
    <!-- Custom Styles for Dark Theme -->
    <style>
        body {
            background-color: #121212; /* Dark background */
            color: #bbaa64; /* Dark yellow text */
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #1e1e1e; /* Slightly lighter dark background for the container */
            border-radius: 8px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label, select, input, button {
            margin-bottom: 10px;
        }
        button {
            background-color: #bbaa64; /* Dark yellow background for buttons */
            color: #121212; /* Dark text for buttons */
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #a89954;
        }
        .search-results {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #bbaa64; /* Dark yellow border for table */
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #262626; /* Zebra striping for table rows */
        }
    </style>
</head>

<body>
    <title>Search</title>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="post" action="">
                <div class="search-col">
                    <label for="search_column">Choose a column:</label>
                    <select name="search_column" id="search_column">
                        <option value="id" <?php if (isset($_POST['search_column']) && $_POST['search_column'] == 'id')
                            echo 'selected'; ?>>ID</option>
                        <option value="name" <?php if (isset($_POST['search_column']) && $_POST['search_column'] == 'name')
                            echo 'selected'; ?>>Name</option>
                    </select>
                </div>
                <input type="text" name="search_value" placeholder="Enter search value" value="<?php if (isset($_POST['search_value']))
                    echo $_POST['search_value']; ?>">
                <button type="submit">Search</button>
                <button type="submit" name="show_all">Show All</button>
            </form>
        </div>
        <div class="back-button">
            <a href="index.php" class="back"><button type="submit">Back</button></a>
        </div>
    </div>

    <?php
$connect = mysqli_connect('database', 'php_docker', 'password', 'php_docker');
$table_name = "students";

if (isset($_POST['show_all'])) {
    $query = "SELECT * FROM $table_name";
    $response = mysqli_query($connect, $query);

    if (mysqli_num_rows($response) > 0) {
        echo "<div class='search-results'>";
        echo "<h2>Results</h2>"; // Label for the search results
        echo "<strong class='table'>$table_name: </strong>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th></tr>"; // Removed Age and CGPA columns
        while ($i = mysqli_fetch_assoc($response)) {
            echo "<tr>";
            echo "<td>" . $i['id'] . "</td>";
            echo "<td>" . $i['name'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "No records found.";
    }
} elseif (isset($_POST['search_column']) && isset($_POST['search_value'])) {
    $search_column = $_POST['search_column'];
    $search_value = $_POST['search_value'];

    if (empty($search_value)) {
        echo "Please enter a search value.";
    } else {
        $query = "SELECT * FROM $table_name WHERE ";
        if ($search_column === 'id') {
            $query .= "$search_column = '$search_value'";
        } elseif ($search_column === 'name') {
            $query .= "$search_column LIKE '$search_value%'";
        } else {
            echo "Invalid search column.";
            exit;
        }

        $response = mysqli_query($connect, $query);

        if (mysqli_num_rows($response) > 0) {
            echo "<div class='search-results'>";
            echo "<strong class='table'>$table_name: </strong>";
            while ($i = mysqli_fetch_assoc($response)) {
                echo "<div class='search-result'>";
                echo "<p><strong>ID:</strong> " . $i['id'] . "</p>";
                echo "<p><strong>Name:</strong> " . $i['name'] . "</p>";
                echo "<p><strong>Age:</strong> " . $i['age'] . "</p>";
                echo "<p><strong>Cgpa:</strong> " . $i['cgpa'] . "</p>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "No records found.";
        }
    }
}

mysqli_close($connect);
?>

</body>

</html>

