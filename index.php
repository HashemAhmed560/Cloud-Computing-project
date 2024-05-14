<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viedwport" content="width=device-width, initial-scale=1.0">
    <title>Registration and Sign In</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: #e1b12c;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container-sign {
            background-color: #1f1f1f;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            width: 350px;
            max-width: 90%;
        }

        h1 {
            color: #e1b12c;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 10px;
        }

        button {
            background-color: #333;
            color: #e1b12c;
            border: none;
            padding: 12px 0;
            margin: 10px 0;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            background-color: #444;
        }

        .label-container {
            text-align: center;
            margin-top: 20px;
        }

        .label {
            display: block;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container-sign">
        <h1>Welcome</h1>
        <div class="label-container">
            <span class="label">Choose an option to proceed:</span>
        </div>
        <form method="post" action="sign_up.php">
            <button name="sign_up" value="sign_up">Sign Up</button>
        </form>
        <form method="post" action="sign_in.php">
            <button name="search" value="search">Sign In</button>
        </form>
    </div>
</body>
</html>