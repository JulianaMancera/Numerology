<?php
// No PHP logic needed for the landing page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmic Numerology</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: url('violet.gif') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            overflow-x: hidden;
            margin: 0;
        }
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            z-index: 0;
            animation: twinkle 5s infinite;
        }
        @keyframes twinkle {
            0%, 100% { opacity: 0.7; }
            50% { opacity: 0.3; }
        }
        .glow {
            animation: glow 3s ease-in-out infinite;
        }
        @keyframes glow {
            0%, 100% { text-shadow: 0 0 10px rgba(147, 51, 234, 0.7); }
            50% { text-shadow: 0 0 20px rgba(147, 51, 234, 1); }
        }
        .main-container {
            background: rgba(72, 34, 139, 0.9); /* Softer violet */
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .footer-container {
            background: rgba(54, 25, 104, 0.9); /* Darker violet for footer */
        }
        /* Fallback if violet.gif is missing */
        @media (prefers-reduced-motion: no-preference) {
            .no-gif {
                background: linear-gradient(180deg, #1a0933 0%, #2c1b5a 100%);
            }
        }
    </style>
</head>
<body class="text-white font-sans flex items-center justify-center min-h-screen">
    <div class="stars"></div>
    <div class="main-container max-w x-auto px-4 py-12 text-center rounded-xl shadow-lg relative z-5">
        <h1 class="text-5xl md:text-7xl font-extrabold mb-6 glow text-purple-300">Cosmic Numerology</h1>
        <p class="text-lg md:text-2xl mb-8 text-gray-200">Unlock the secrets of your name through the ancient art of numerology.</p>
        <div class="flex justify-center space-x-4">
            <a href="calculator.php" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 transform hover:scale-105">Try the Calculator</a>
            <a href="instructions.php" class="bg-transparent border-2 border-purple-400 hover:border-purple-600 text-purple-400 hover:text-purple-600 font-bold py-3 px-6 rounded-full transition duration-300">Learn More</a>
        </div>
    </div>
    <footer class="footer-container absolute bottom-0 w-full text-center py-4 text-gray-400">
        © 2025 Juliana Mancera
    </footer>
</body>
</html>