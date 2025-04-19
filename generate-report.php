<?php
// Run PHPUnit test
ob_start();
passthru('./vendor/bin/phpunit tests/MathServiceTest.php');  //modify this file
$output = ob_get_clean();

// Extract info
$testName = "testAddAndDouble";
$status = str_contains($output, 'FAILURES!') ? '❌ Failed' : '✅ Passed';
$color = $status === '✅ Passed' ? 'text-green-600' : 'text-red-600';
$message = $status === '✅ Passed' ? 'Test passed successfully.' : 'Test failed. Check assertion.';

// Get time and memory
preg_match('/Time:\s+(.*?),\s+Memory:\s+(.*)/', $output, $matches);
$time = $matches[1] ?? 'N/A';
$memory = $matches[2] ?? 'N/A';

// HTML output
$html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PHPUnit Test Report</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 font-sans text-gray-800">
  <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-lg p-6">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">🧪 PHPUnit Test Report</h1>

    <table class="w-full table-auto border border-gray-300 rounded overflow-hidden mb-6">
      <thead class="bg-blue-600 text-white">
        <tr>
          <th class="px-4 py-2 text-center">#</th>
          <th class="px-4 py-2 text-left">Test Name</th>
          <th class="px-4 py-2 text-left">Status</th>
          <th class="px-4 py-2 text-left">Message</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr>
          <td class="px-4 py-2 text-center">1</td>
          <td class="px-4 py-2">{$testName}</td>
          <td class="px-4 py-2 font-semibold {$color}">{$status}</td>
          <td class="px-4 py-2">{$message}</td>
        </tr>
      </tbody>
    </table>

    <div class="text-sm text-gray-600">
      <p><strong>Execution Time:</strong> {$time}</p>
      <p><strong>Memory Usage:</strong> {$memory}</p>
    </div>
  </div>
</body>
</html>
HTML;

file_put_contents('reports/test-report.html', $html);

echo "✅ Test report generated: test-report.html\n";

//run this cli to see test ❯ php generate-report.php  