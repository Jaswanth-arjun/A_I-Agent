<?php
echo "<h2>Simple Environment Test</h2>";

// Method 1: Direct file reading (most reliable)
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    echo "✅ .env file exists<br>";
    $content = file_get_contents($envFile);
    echo "File content:<br><pre>" . htmlspecialchars($content) . "</pre><br>";
    
    // Extract API key manually
    preg_match('/BREVO_API_KEY=(.*)/', $content, $matches);
    if (isset($matches[1])) {
        $api_key = trim($matches[1]);
        echo "✅ API Key found manually: " . substr($api_key, 0, 10) . "...<br>";
    } else {
        echo "❌ API Key not found in file<br>";
    }
} else {
    echo "❌ .env file not found at: $envFile<br>";
}

// Method 2: Check current directory
echo "Current directory: " . __DIR__ . "<br>";

// Method 3: List files
echo "Files in directory:<br>";
$files = scandir(__DIR__);
foreach ($files as $file) {
    if (strpos($file, '.env') !== false || $file == 'test_simple.php') {
        echo "- $file<br>";
    }
}
?>
