<?php

// Numerology chart
$numerology = [
    'A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5, 'F' => 6, 'G' => 7, 'H' => 8, 'I' => 9,
    'J' => 1, 'K' => 2, 'L' => 3, 'M' => 4, 'N' => 5, 'O' => 6, 'P' => 7, 'Q' => 8, 'R' => 9,
    'S' => 1, 'T' => 2, 'U' => 3, 'V' => 4, 'W' => 5, 'X' => 6, 'Y' => 7, 'Z' => 8
];

// Personality chart
$personalityChart = [
    1 => 'pioneering, leading, independent, attaining, individualistic',
    2 => 'cooperation, adaptability, considering, partnering, mediating',
    3 => 'expression, verbalization, socialization, arts, joy of living',
    4 => 'values foundation, service, struggle against limits, steady growth',
    5 => 'expansiveness, visionary, adventure, constructive use of freedom',
    6 => 'responsibility, protection, nurturing, balance, sympathy',
    7 => 'analysis, understanding, awareness, studious, mediating',
    8 => 'practical endeavors, status-oriented, power-seeking, high-mental goals',
    9 => 'humanitarian, giving, selflessness, obligations, creative expression',
    11 => 'higher spiritual plane, intuitive, illumination, idealist, a dreamer',
    22 => 'master builder, larger endeavors, powerful force, leadership'
];

// Destiny chart
$destinyChart = [
    1 => 'Primal Force',
    2 => 'All Knowing',
    3 => 'Creative Child',
    4 => 'Salt of the Earth',
    5 => 'Dynamic Force',
    6 => 'The Caretaker',
    7 => 'The Seeker',
    8 => 'Balance and Power',
    9 => 'The Caretaker',
    11 => 'The Intuitive',
    22 => 'Master Builder',
    33 => 'Master Teacher'
];

function calculateNumber($name, $numerology, $filterVowels = null) {
    $name = strtoupper(str_replace(' ', '', $name));
    $sum = 0;
    $steps = [];

    foreach (str_split($name) as $char) {
        if (isset($numerology[$char])) {
            if ($filterVowels === true && !in_array($char, ['A', 'E', 'I', 'O', 'U', 'Y'])) continue;
            if ($filterVowels === false && in_array($char, ['A', 'E', 'I', 'O', 'U', 'Y'])) continue;
            $sum += $numerology[$char];
            $steps[] = $numerology[$char];
        }
    }

    return ["number" => $sum, "steps" => $steps];
}

function reduceToSingleDigitSteps($num) {
    $steps = [];
    while ($num > 9) {
        $splitNums = str_split($num);
        $newSum = array_sum($splitNums);
        $steps[] = implode(" + ", $splitNums) . " = " . $newSum;
        $num = $newSum;
    }
    return ["number" => $num, "steps" => $steps];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numerology Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: url('violet.gif') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
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
        .calculator-card {
            background: rgba(72, 34, 139, 0.9); /* Adjusted to a softer violet */
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease-in-out;
        }
        .calculator-card:hover {
            transform: translateY(-5px);
        }
        .btn-calculate {
            background: linear-gradient(90deg, #6d28d9, #a855f7);
            transition: background 0.3s ease;
        }
        .btn-calculate:hover {
            background: linear-gradient(90deg, #5b21b6, #9333ea);
        }
        .result-box {
            background: rgba(72, 34, 139, 0.9); /* Adjusted to a softer violet */
            border: 1px solid rgba(255, 255, 255, 0.1);
            max-height: 60vh; /* Limit height to prevent overflow */
            overflow-y: auto; /* Add scroll if content overflows */
            padding: 1rem;
        }
        .footer-container {
            background: rgba(54, 25, 104, 0.9); /* Darker adjusted violet for footer */
        }
        pre {
            margin: 0;
            white-space: pre-wrap; /* Allow text wrapping */
        }
        /* Fallback if violet.gif is missing */
        @media (prefers-reduced-motion: no-preference) {
            .no-gif {
                background: linear-gradient(180deg, #1a0933 0%, #2c1b5a 100%);
            }
        }
    </style>
</head>
<body class="text-gray-200 font-sans">
    <div class="stars"></div>
    <div class="calculator-card max-w-2xl w-full rounded-xl p-6 shadow-lg relative z-10">
        <h1 class="text-3xl md:text-4xl font-extrabold text-center mb-6 text-purple-300">Numerology Calculator</h1>
        <form method="post" class="mb-6">
            <label for="name" class="block text-sm font-medium mb-2">Enter Your Name:</label>
            <input type="text" id="name" name="name" placeholder="e.g., John Smith" required
                   class="w-full p-3 rounded-lg bg-gray-800 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300">
            <button type="submit" class="btn-calculate w-full mt-4 p-3 rounded-lg text-white font-bold text-lg hover:shadow-lg transition duration-300">Calculate</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name'])) {
            $name = htmlspecialchars($_POST['name']);
            echo "<div class='result-box rounded-lg'>";
            echo "<h3 class='text-xl font-bold mb-3 text-purple-200'>Results for $name</h3>";
            echo "<pre class='text-sm'>";

            echo "HI $name, your name number in Numerology is\n\n";

            $soulData = calculateNumber($name, $numerology, true);
            $soulReduced = reduceToSingleDigitSteps($soulData["number"]);
            echo "<strong class='text-purple-300'>• Soul Number is: " . $soulReduced["number"] . "</strong>\n";
            echo "• " . implode(" + ", $soulData["steps"]) . " = " . $soulData["number"] . "\n";
            foreach ($soulReduced["steps"] as $step) {
                echo "• " . $step . "\n";
            }
            echo "\n";

            $personalityData = calculateNumber($name, $numerology, false);
            $personalityReduced = reduceToSingleDigitSteps($personalityData["number"]);
            echo "<strong class='text-purple-300'>• Personality Number is: " . $personalityReduced["number"] . " " . $personalityChart[$personalityReduced["number"]] . "</strong>\n";
            echo "• " . implode(" + ", $personalityData["steps"]) . " = " . $personalityData["number"] . "\n";
            foreach ($personalityReduced["steps"] as $step) {
                echo "• " . $step . "\n";
            }
            echo "\n";

            $destinyData = calculateNumber($name, $numerology);
            $destinyReduced = reduceToSingleDigitSteps($destinyData["number"]);
            echo "<strong class='text-purple-300'>• Destiny Number is: " . $destinyReduced["number"] . " " . $destinyChart[$destinyReduced["number"]] . "</strong>\n";
            echo "• " . implode(" + ", $destinyData["steps"]) . " = " . $destinyData["number"] . "\n";
            foreach ($destinyReduced["steps"] as $step) {
                echo "• " . $step . "\n";
            }
            echo "\n------------------------\n";
            echo "</pre>";
            echo "</div>";
        }
        ?>
        <div class="text-center mt-6">
            <a href="index.php" class="text-purple-400 hover:text-purple-600">Back to Home</a>
            <span class="mx-2">|</span>
            <a href="instructions.php" class="text-purple-400 hover:text-purple-600">Instructions</a>
        </div>
    </div>
    <footer class="footer-container absolute bottom-0 w-full text-center py-4 text-gray-400">
        © 2025 Juliana Mancera
    </footer>
</body>
</html>