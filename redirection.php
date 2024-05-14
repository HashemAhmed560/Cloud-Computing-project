<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Created</title>
    <style>
        body {
            background-color: #121212; /* Dark background */
            color: #fff; /* White text for better contrast */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            transition: background-color 0.5s; /* Smooth background color transition */
        }
        .container-sign {
            text-align: center;
            background-color: #1e1e1e; /* Slightly lighter dark background for the container */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
        }
        .message {
            margin-bottom: 30px;
        }
        .timer {
            font-size: 1.5em;
            color: #4CAF50; /* Green color for the timer to stand out */
        }
    </style>
</head>
<body>
    <div class="container-sign" id="container">
        <div class="message">
            <h1>Your account has been created successfully!</h1>
            <p>You will be redirected in.</p>
            <p class="timer" id="timer">Redirecting in 4 seconds...</p>
        </div>
    </div>
    <script>
        // Countdown timer
        let timeLeft = 4;
        const timerElement = document.getElementById('timer');

        const countdown = setInterval(function() {
            timeLeft--;
            timerElement.textContent = 'Redirecting in ' + timeLeft + ' second' + (timeLeft > 1 ? 's' : '') + '...';
            if (timeLeft <= 0) {
                clearInterval(countdown);
                window.location.href = 'index.php'; // Redirect when the countdown is over
            }
        }, 1000);
    </script>
    <!-- PHP code to handle post-registration logic (if needed) -->
    <?php
    // Your PHP code here
    ?>
</body>
</html>