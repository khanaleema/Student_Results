<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Celebration</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&family=Great+Vibes&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
            animation: backgroundChange 10s infinite alternate;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        /* Background Color Changing Animation with Two Shades */
        @keyframes backgroundChange {
            0% { background: linear-gradient(90deg, #e0f7fa, #f1f8e9); }
            25% { background: linear-gradient(90deg, #f1f8e9, #fff9c4); }
            50% { background: linear-gradient(90deg, #fff9c4, #e3f2fd); }
            75% { background: linear-gradient(90deg, #e3f2fd, #fce4ec); }
            100% { background: linear-gradient(90deg, #fce4ec, #e0f7fa); }
        }

        /* Congratulations Text Style */
        .congrats {
            font-size: 60px;
            font-family: 'Great Vibes', cursive;
            font-weight: bold;
            color: #ff4081;
            text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.3);
            animation: bounceIn 2s ease-in-out forwards;
            position: absolute;
            top: 15%; /* Move closer to the top */
            transform: translateX(-50%);
        }

        @keyframes bounceIn {
            0% { opacity: 0; transform: translateY(100px); }
            50% { opacity: 1; transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }

        /* Stylish Result Container */
        .result-container {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 80px; /* Increased padding */
            border-radius: 20px;
            border: 3px solid #ff4081;
            box-shadow: 0px 0px 20px 10px rgba(255, 64, 129, 0.5);
            max-width: 600px; /* Increased size */
            margin-top: 50px;
            animation: slideIn 3s forwards; /* Slide-in effect */
            display: none;
            text-align: center;
        }

        /* Slide-in animation for the result container */
        @keyframes slideIn {
            0% { transform: translateY(100%); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        /* Result Information */
        .result {
            font-size: 30px; /* Adjusted font size */
            color: #444444;
            font-weight: normal; /* Normal weight */
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
            font-family:  'Lobster', cursive; /* Added stylish font */
        }

        /* Confetti Effect */
        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background-color: red;
            animation: fall 4s linear infinite;
        }

        @keyframes fall {
            0% { transform: translateY(-100px) rotate(0deg); }
            100% { transform: translateY(100vh) rotate(360deg); }
        }

        /* Party Popper Animation */
        .party-popper {
            position: fixed;
            bottom: 0;
            width: 60px;
            height: 60px;
            animation: popperAnimation 0.5s ease-out;
        }

        .party-popper img {
            width: 100%;
            height: 100%;
        }

        @keyframes popperAnimation {
            0% { opacity: 0; transform: scale(0.5); }
            100% { opacity: 1; transform: scale(1.5); }
        }
    </style>
</head>
<body>

    <!-- Congratulations Message -->
    <div class="congrats" id="congrats">
        🎉 Congratulations {{ $student->name }}! 🎉
    </div>

    <!-- Stylish Result Container -->
    <div class="result-container" id="result-container">
        <div class="result">
            Student Name: {{ $student->name }} <br>
            Project: {{ $student->project }} <br>
            Marks: {{ $student->marks }} <br>
            Percentage: {{ $student->percentage }}% <br>
            Grade: {{ $student->grade }} <br>
            Complement: {{ $student->complement }}
        </div>
    </div>

    <!-- Party Poppers at the Bottom -->
    <div class="party-popper" style="left: 20px;">
        <img src="https://cdn-icons-png.flaticon.com/512/3037/3037071.png" alt="Party Popper">
    </div>
    <div class="party-popper" style="right: 20px;">
        <img src="https://cdn-icons-png.flaticon.com/512/3037/3037071.png" alt="Party Popper">
    </div>

    <!-- Confetti Effect -->
    <script>
        // Create confetti elements and animation
        function createConfetti() {
            for (let i = 0; i < 200; i++) {
                let confetti = document.createElement("div");
                confetti.className = "confetti";
                confetti.style.backgroundColor = getRandomColor();
                confetti.style.left = Math.random() * 100 + "vw";
                confetti.style.animationDuration = Math.random() * 2 + 3 + "s";
                document.body.appendChild(confetti);
            }
        }

        // Function to generate random color for confetti
        function getRandomColor() {
            let colors = ['#ff4081', '#ffd740', '#69f0ae', '#40c4ff', '#ff5252'];
            return colors[Math.floor(Math.random() * colors.length)];
        }

        // Show "Congratulations" and trigger confetti + result
        function showCongratulations() {
            const congrats = document.getElementById('congrats');
            const resultContainer = document.getElementById('result-container');
            
            congrats.style.opacity = 1;
            createConfetti(); // Start confetti animation

            // Show the student's result after the confetti
            setTimeout(() => {
                resultContainer.style.display = 'block';
            }, 3000); // Result shows after 3 seconds
        }

        // Trigger the animation after page loads
        window.onload = () => {
            setTimeout(showCongratulations, 1000); // Delay the congratulations by 1 second
        };
    </script>
</body>
</html>
