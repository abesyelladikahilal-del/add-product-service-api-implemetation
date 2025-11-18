<?php
// Simple test to check if POST works
echo "Testing API POST endpoint...\n\n";

// Test Category POST
$url = 'http://localhost/pkl-14-11-25/public/api/categories';
$data = json_encode(['name' => 'Test Category ' . time()]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Accept: application/json'
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "URL: $url\n";
echo "HTTP Code: $httpCode\n";
echo "Response: $response\n\n";

// Check if table exists
echo "Checking database connection...\n";
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $pdo = DB::connection()->getPdo();
    echo "Database connected: " . $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";
    
    $tables = DB::select("SHOW TABLES");
    echo "Tables in database:\n";
    foreach ($tables as $table) {
        print_r($table);
    }
} catch (Exception $e) {
    echo "Database error: " . $e->getMessage() . "\n";
}
