<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Calculator;

$calc = new Calculator();
$result = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['num1']) && isset($_POST['num2'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $result = $calc->add($num1, $num2);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator App</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">

    <!-- Container -->
    <div class="flex items-center justify-center min-h-screen bg-gray-50">

        <!-- Card -->
        <div class="bg-white rounded-lg shadow-lg w-96 p-8">

            <!-- Header -->
            <h1 class="text-2xl font-semibold text-center mb-6">PHP Calculator</h1>

            <!-- Form -->
            <form action="" method="POST" class="space-y-4">
                <div class="flex space-x-4">
                    <input type="number" name="num1" class="w-full p-2 border rounded-md" placeholder="Enter first number" required>
                    <span class="text-xl my-auto">+</span>
                    <input type="number" name="num2" class="w-full p-2 border rounded-md" placeholder="Enter second number" required>
                </div>
                
                <div class="flex justify-center mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Calculate</button>
                </div>
            </form>

            <!-- Result -->
            <?php if ($result !== ''): ?>
                <div class="mt-6 text-center text-lg font-semibold text-green-500">
                    Result: <?php echo $result; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>

</body>
</html>
