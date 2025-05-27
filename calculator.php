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
    // Preserve master numbers 11 and 22
    if ($num == 11 || $num == 22) {
        return ["number" => $num, "steps" => $steps];
    }
    while ($num > 9) {
        $splitNums = str_split($num);
        $newSum = array_sum($splitNums);
        $steps[] = implode(" + ", $splitNums) . " = " . $newSum;
        $num = $newSum;
    }
    return ["number" => $num, "steps" => $steps];
}

// Process form submission
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $name = trim($_POST['name']);
    if (!empty($name)) {
        // Calculate Destiny Number (full name)
        $destinyCalc = calculateNumber($name, $numerology);
        $destinyReduced = reduceToSingleDigitSteps($destinyCalc['number']);
        
        // Calculate Soul Number (vowels only)
        $soulCalc = calculateNumber($name, $numerology, true);
        $soulReduced = reduceToSingleDigitSteps($soulCalc['number']);
        
        // Calculate Personality Number (consonants only)
        $personalityCalc = calculateNumber($name, $numerology, false);
        $personalityReduced = reduceToSingleDigitSteps($personalityCalc['number']);
        
        $result = [
            'name' => $name,
            'destiny' => [
                'number' => $destinyReduced['number'],
                'steps' => array_merge(
                    [implode(" + ", $destinyCalc['steps']) . " = " . $destinyCalc['number']],
                    $destinyReduced['steps']
                ),
                'description' => $destinyChart[$destinyReduced['number']] ?? 'Unknown'
            ],
            'soul' => [
                'number' => $soulReduced['number'],
                'steps' => array_merge(
                    [implode(" + ", $soulCalc['steps']) . " = " . $soulCalc['number']],
                    $soulReduced['steps']
                ),
                'description' => $personalityChart[$soulReduced['number']] ?? 'Unknown'
            ],
            'personality' => [
                'number' => $personalityReduced['number'],
                'steps' => array_merge(
                    [implode(" + ", $personalityCalc['steps']) . " = " . $personalityCalc['number']],
                    $personalityReduced['steps']
                ),
                'description' => $personalityChart[$personalityReduced['number']] ?? 'Unknown'
            ]
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numerology Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: url('violet.gif') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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
            animation: twinkle 8s infinite;
        }
        
        .stars::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(2px 2px at 20px 30px, #eee, transparent),
                radial-gradient(2px 2px at 40px 70px, rgba(255,255,255,0.8), transparent),
                radial-gradient(1px 1px at 90px 40px, #fff, transparent),
                radial-gradient(1px 1px at 130px 80px, rgba(255,255,255,0.6), transparent),
                radial-gradient(2px 2px at 160px 30px, #fff, transparent);
            background-repeat: repeat;
            background-size: 200px 100px;
            animation: sparkle 10s linear infinite;
        }
        
        @keyframes twinkle {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 0.4; }
        }
        
        @keyframes sparkle {
            from { transform: translateX(0); }
            to { transform: translateX(200px); }
        }
        
        .calculator-card {
            background: linear-gradient(145deg, rgba(45, 7, 89, 0.95), rgba(30, 4, 66, 0.95));
            border: 2px solid rgba(147, 51, 234, 0.3);
            backdrop-filter: blur(20px);
            box-shadow: 
                0 25px 50px rgba(45, 7, 89, 0.4),
                0 0 100px rgba(147, 51, 234, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            margin-bottom: 50px;
        }
        
        .calculator-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(147, 51, 234, 0.1), transparent);
            transition: left 0.8s;
        }
        
        .calculator-card:hover::before {
            left: 100%;
        }
        
        .calculator-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 
                0 35px 70px rgba(45, 7, 89, 0.6),
                0 0 150px rgba(147, 51, 234, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            border-color: rgba(147, 51, 234, 0.5);
        }
        
        .title-glow {
            background: linear-gradient(45deg, #9333ea, #c084fc, #9333ea);
            background-size: 200% 200%;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient-shift 3s ease infinite;
            filter: drop-shadow(0 0 20px rgba(147, 51, 234, 0.5));
        }
        
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .input-field {
            background: linear-gradient(145deg, rgba(15, 4, 35, 0.8), rgba(25, 4, 55, 0.8));
            border: 2px solid rgba(147, 51, 234, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            position: relative;
        }
        
        .input-field:focus {
            border-color: #9333ea;
            box-shadow: 
                0 0 20px rgba(147, 51, 234, 0.4),
                inset 0 0 20px rgba(147, 51, 234, 0.1);
            transform: translateY(-2px);
        }
        
        .btn-calculate {
            background: linear-gradient(135deg, #4c1d95, #7c3aed, #9333ea);
            background-size: 200% 200%;
            border: 2px solid rgba(147, 51, 234, 0.4);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            margin-bottom: 40px;
        }
        
        .btn-calculate::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }
        
        .btn-calculate:hover::before {
            left: 100%;
        }
        
        .btn-calculate:hover {
            background-position: 100% 100%;
            transform: translateY(-3px);
            box-shadow: 
                0 15px 30px rgba(147, 51, 234, 0.4),
                0 0 40px rgba(147, 51, 234, 0.2);
            border-color: rgba(147, 51, 234, 0.6);
        }
        
        .result-box {
            background: linear-gradient(145deg, rgba(30, 4, 66, 0.95), rgba(45, 7, 89, 0.95));
            border: 2px solid rgba(147, 51, 234, 0.3);
            backdrop-filter: blur(15px);
            max-height: 60vh;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(147, 51, 234, 0.5) transparent;
            box-shadow: 
                inset 0 0 30px rgba(147, 51, 234, 0.1),
                0 10px 30px rgba(45, 7, 89, 0.3);
        }
        
        .result-box::-webkit-scrollbar {
            width: 8px;
        }
        
        .result-box::-webkit-scrollbar-track {
            background: rgba(147, 51, 234, 0.1);
            border-radius: 4px;
        }
        
        .result-box::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #7c3aed, #9333ea);
            border-radius: 4px;
        }
        
        .result-box::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #9333ea, #a855f7);
        }
        
        .nav-links a {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #9333ea, #c084fc);
            transition: width 0.3s ease;
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .nav-links a:hover {
            color: #c084fc;
            transform: translateY(-2px);
        }
        
        .footer-container {
            background: linear-gradient(135deg, rgba(20, 4, 45, 0.95), rgba(35, 7, 75, 0.95));
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(147, 51, 234, 0.2);
        }
        
        .mystical-icon {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(5deg); }
        }
        
        .result-number {
            background: linear-gradient(45deg, #7c3aed, #c084fc);
            background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 0 10px rgba(147, 51, 234, 0.6));
        }
        
        @media (max-width: 768px) {
            .calculator-card {
                margin: 1rem;
                padding: 1.5rem;
            }
            
            .title-glow {
                font-size: 2rem;
            }
        }
        
        @media (prefers-reduced-motion: no-preference) {
            .no-gif {
                background: linear-gradient(135deg, #1a0033 0%, #2d0559 25%, #4c1d95 50%, #2d0559 75%, #1a0033 100%);
                background-size: 400% 400%;
                animation: gradient-bg 15s ease infinite;
            }
        }
        
        @keyframes gradient-bg {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
    </style>
</head>
<body class="text-gray-100 font-sans">
    <div class="stars"></div>
    <div class="calculator-card max-w-2xl w-full rounded-2xl p-8 shadow-2xl relative z-10">
        <div class="text-center mb-8">
            <i class="fas fa-star-and-crescent text-4xl text-purple-400 mystical-icon mb-4"></i>
            <h1 class="text-4xl md:text-5xl font-extrabold title-glow mb-4">Numerology Calculator</h1>
            <p class="text-purple-200 text-lg opacity-90">Discover the mystical power within your name</p>
        </div>
        
        <form method="post" class="mb-8">
            <div class="relative mb-6">
                <label for="name" class="block text-sm font-semibold mb-3 text-purple-200">
                    <i class="fas fa-user-circle mr-2"></i>Enter Your Full Name:
                </label>
                <input type="text" id="name" name="name" placeholder="e.g., John Smith" required
                       class="input-field w-full p-4 rounded-xl text-white focus:outline-none transition-all duration-300 text-lg"
                       value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
            </div>
            <button type="submit" class="btn-calculate w-full py-4 rounded-xl text-white font-bold text-lg relative z-10">
                <i class="fas fa-calculator mr-2"></i>Calculate My Numbers
            </button>
        </form>

        <div class="result-box rounded-xl p-6">
            <h3 class="text-2xl font-bold mb-4 text-center">
                <i class="fas fa-crystal-ball mr-2 text-purple-400"></i>
                <span class="result-number">Your Mystical Numbers</span>
            </h3>
            <?php if ($result): ?>
                <div class="space-y-6 text-purple-100">
                    <!-- Destiny Number -->
                    <div>
                        <h4 class="text-xl font-semibold text-purple-300">Destiny Number: <span class="result-number"><?php echo $result['destiny']['number']; ?></span></h4>
                        <p class="text-lg"><?php echo $result['destiny']['description']; ?></p>
                        <p class="text-sm opacity-75">Calculation: <?php echo implode(' → ', $result['destiny']['steps']); ?></p>
                    </div>
                    <!-- Soul Number -->
                    <div>
                        <h4 class="text-xl font-semibold text-purple-300">Soul Number: <span class="result-number"><?php echo $result['soul']['number']; ?></span></h4>
                        <p class="text-lg"><?php echo $result['soul']['description']; ?></p>
                        <p class="text-sm opacity-75">Calculation: <?php echo implode(' → ', $result['soul']['steps']); ?></p>
                    </div>
                    <!-- Personality Number -->
                    <div>
                        <h4 class="text-xl font-semibold text-purple-300">Personality Number: <span class="result-number"><?php echo $result['personality']['number']; ?></span></h4>
                        <p class="text-lg"><?php echo $result['personality']['description']; ?></p>
                        <p class="text-sm opacity-75">Calculation: <?php echo implode(' → ', $result['personality']['steps']); ?></p>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center text-purple-200 opacity-75">
                    <i class="fas fa-magic text-3xl mb-4"></i>
                    <p>Enter your name above to reveal your numerological destiny</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="nav-links text-center mt-8 space-x-6">
            <a href="index.php" class="text-purple-300 hover:text-purple-100 font-medium">
                <i class="fas fa-home mr-1"></i>Back to Home
            </a>
            <span class="text-purple-500">|</span>
            <a href="instructions.php" class="text-purple-300 hover:text-purple-100 font-medium">
                <i class="fas fa-book mr-1"></i>Instructions
            </a>
        </div>
    </div>
    
    <footer class="footer-container fixed bottom-0 w-full text-center py-4">
        <p class="text-purple-300">
            <i class="fas fa-copyright mr-1"></i>2025 Juliana Mancera
            <i class="fas fa-star ml-2 text-purple-400"></i>
        </p>
    </footer>
</body>
</html>