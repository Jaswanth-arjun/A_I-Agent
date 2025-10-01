<?php
// env_loader.php - Enhanced version with better error handling

function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        error_log("❌ .env file not found at: " . $filePath);
        return false;
    }
    
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        error_log("❌ Failed to read .env file");
        return false;
    }
    
    foreach ($lines as $line) {
        // Skip comments and empty lines
        if (strpos(trim($line), '#') === 0 || trim($line) === '') {
            continue;
        }
        
        // Split the line into name and value
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            
            // Remove quotes if present
            $value = trim($value, '"\'');
            
            // Set the environment variable
            putenv("$name=$value");
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
            
            error_log("✅ Loaded env variable: $name = " . substr($value, 0, 10) . "...");
        }
    }
    return true;
}

// Function to get environment variable with fallback
function getEnvVariable($key, $default = null) {
    // Try different methods to get the environment variable
    $value = getenv($key);
    if ($value !== false) {
        return $value;
    }
    
    if (isset($_ENV[$key])) {
        return $_ENV[$key];
    }
    
    if (isset($_SERVER[$key])) {
        return $_SERVER[$key];
    }
    
    error_log("❌ Environment variable not found: $key");
    return $default;
}

// Load the .env file from the same directory
$envLoaded = loadEnv(__DIR__ . '/.env');

if (!$envLoaded) {
    error_log("❌ CRITICAL: Failed to load .env file");
}
?>
