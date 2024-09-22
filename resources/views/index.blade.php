<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Result</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&family=Lobster&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('https://t3.ftcdn.net/jpg/08/21/56/38/360_F_821563852_MafBbQmNZdS7H4cqM7nbF5zeWIqn6s7j.jpg'); /* Background image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: moveBackground 10s linear infinite; /* Background movement */
        }

        @keyframes moveBackground {
            0% { background-position: 0 0; }
            100% { background-position: 100% 100%; }
        }

        .logo {
            max-width: 150px; /* Adjust logo size as needed */
            position: absolute; /* Position it over the background */
            top: 20px; /* Adjust vertical position */
            left: 50%; /* Center horizontally */
            transform: translateX(-50%); /* Center the logo */
            margin-bottom: 20px;
        }

        h1, h2 {
            font-family: 'Lobster', cursive;
            border-radius: 20px;
            padding: 20px;
            margin: 10px 0;
            opacity: 0; /* Initially hidden */
            transform: translateY(-50px); /* Start off-screen */
            animation: slideIn 1s forwards; /* Slide in animation */
            transition: background-color 0.5s; /* Smooth transition for background color */
        }

        h1 {
            font-size: 3rem;
            animation-delay: 0.5s; /* Delay for the first text */
        }

        h2 {
            font-size: 2rem;
            animation-delay: 1s; /* Delay for the second text */
        }

        @keyframes slideIn {
            from { transform: translateX(-100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        input[type="text"] {
            padding: 10px;
            width: 300px;
            margin: 20px 0;
            font-size: 16px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px;
            width: 150px; /* Smaller button width */
            margin: 20px 0;
            font-size: 1.1rem; /* Stylish font size */
            border-radius: 10px;
            border: none;
            background-color: hsl(197, 70%, 34%); /* Light green button color */
            color: white;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
            animation: buttonPulse 1s infinite alternate;
            opacity: 1; /* Make button visible */
        }

        @keyframes buttonPulse {
            from { transform: scale(1); }
            to { transform: scale(1.05); }
        }

        button:hover {
            background-color: #6ec3d8; /* Slightly darker shade on hover */
            transform: scale(1.1); /* Scale effect on hover */
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2qcvTM5BuJDzSY-_c0WKCcdXtSvOyp17cQqTJgBbjfRa9KDXT35U7U-6KJ2fCU5X7Bhk&usqp=CAU" alt="Logo" class="logo">
    <div>
        <h1 id="welcomeText">Welcome to Your Assignment Result</h1>
        <h2 id="assignedText">Assigned by Student Leader Aleema Khan</h2>
        <form action="/result" method="POST">
            @csrf
            <input type="text" name="roll_number" placeholder="Enter Your Roll Number" required>
            <button type="submit" data-toggle="modal" data-target="#resultModal">Get Result</button>
        </form>
        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Processing...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Please wait while we fetch your result...
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to animate text appearance
        function animateText() {
            const welcomeText = document.getElementById('welcomeText');
            const assignedText = document.getElementById('assignedText');

            welcomeText.style.opacity = 1;
            welcomeText.style.transform = 'translateY(0)';
            welcomeText.style.animation = 'slideIn 1s forwards';

            assignedText.style.opacity = 1;
            assignedText.style.transform = 'translateY(0)';
            assignedText.style.animation = 'slideIn 1s forwards';
        }

        // Change background color for text
        const colors = ['#FFCCCB', '#CCFFCC', '#CCCCFF', '#FFDDCC', '#FFDDAA', '#E3F2FD', '#FFEBEE', '#F0E68C', '#FFF9C4', '#FFE0B2']; // Light colors
        let colorIndex = 0;

        function changeBackgroundColor() {
            const welcomeText = document.getElementById('welcomeText');
            const assignedText = document.getElementById('assignedText');

            welcomeText.style.backgroundColor = colors[colorIndex];
            assignedText.style.backgroundColor = colors[colorIndex];

            colorIndex = (colorIndex + 1) % colors.length; // Loop through colors
        }

        // Call animateText function initially and every 10 seconds
        setInterval(animateText, 10000); // 10 seconds
        animateText(); // Initial call

        // Change colors every 2 seconds (faster transition)
        setInterval(changeBackgroundColor, 2000); // 2 seconds
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
