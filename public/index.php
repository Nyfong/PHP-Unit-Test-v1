<?php

require __DIR__ . '/../vendor/autoload.php';

use App\MathService;

$service = new MathService();
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['num1'], $_POST['num2'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $result = $service->addAndDouble($num1, $num2); // Integration logic here 🔗
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator App</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 to-blue-100 text-gray-900 font-sans">

    <div class="flex items-center justify-center min-h-screen px-4">

        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-8 border border-gray-200">

            <h1 class="text-3xl font-bold text-center text-blue-600 mb-4">PHP Integration Calculator</h1>
            <p class="text-center text-gray-500 mb-6 text-sm">This adds two numbers and doubles the result. Simple math, but make it ✨ stylish ✨.</p>

            <form method="POST" class="space-y-5">
                <div class="flex items-center space-x-3">
                    <input type="number" name="num1" required class="flex-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="First number">
                    <span class="text-xl font-bold">+</span>
                    <input type="number" name="num2" required class="flex-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Second number">
                </div>

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-lg transition duration-200">Calculate</button>
            </form>

            <?php if ($result !== ''): ?>
                <div class="mt-6 bg-green-100 text-green-700 font-medium text-center p-3 rounded-lg shadow-inner">
                    Result: <?= htmlspecialchars($result) ?>
                </div>
            <?php endif; ?>

        </div>

    </div>

</body>
</html>
