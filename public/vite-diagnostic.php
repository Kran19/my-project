<?php
/**
 * Diagnostic script to check Vite build files
 * Upload this to your public directory and access via browser
 */

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vite Build Diagnostic</title>
    <style>
        body { font-family: monospace; padding: 20px; background: #1e1e1e; color: #d4d4d4; }
        .success { color: #4ec9b0; }
        .error { color: #f48771; }
        .warning { color: #dcdcaa; }
        .section { margin: 20px 0; padding: 15px; background: #252526; border-left: 3px solid #007acc; }
        h2 { color: #4ec9b0; }
        pre { background: #1e1e1e; padding: 10px; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>🔍 Vite Build Diagnostic Report</h1>
    
    <div class="section">
        <h2>1. Document Root</h2>
        <pre><?php echo __DIR__; ?></pre>
    </div>

    <div class="section">
        <h2>2. Build Directory Check</h2>
        <?php
        $buildDir = __DIR__ . '/build';
        if (is_dir($buildDir)) {
            echo '<p class="success">✓ Build directory exists</p>';
            echo '<pre>Path: ' . $buildDir . '</pre>';
        } else {
            echo '<p class="error">✗ Build directory NOT found</p>';
            echo '<pre>Expected: ' . $buildDir . '</pre>';
        }
        ?>
    </div>

    <div class="section">
        <h2>3. Manifest File Check</h2>
        <?php
        $manifestPath = __DIR__ . '/build/manifest.json';
        if (file_exists($manifestPath)) {
            echo '<p class="success">✓ Manifest file exists</p>';
            echo '<pre>Path: ' . $manifestPath . '</pre>';
            echo '<h3>Manifest Contents:</h3>';
            echo '<pre>' . htmlspecialchars(file_get_contents($manifestPath)) . '</pre>';
        } else {
            echo '<p class="error">✗ Manifest file NOT found</p>';
            echo '<pre>Expected: ' . $manifestPath . '</pre>';
        }
        ?>
    </div>

    <div class="section">
        <h2>4. Asset Files Check</h2>
        <?php
        $assetsDir = __DIR__ . '/build/assets';
        if (is_dir($assetsDir)) {
            echo '<p class="success">✓ Assets directory exists</p>';
            $files = scandir($assetsDir);
            echo '<h3>Files in assets directory:</h3><ul>';
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    $filePath = $assetsDir . '/' . $file;
                    $size = filesize($filePath);
                    $readable = is_readable($filePath) ? '✓' : '✗';
                    echo "<li>$readable $file (" . number_format($size) . " bytes)</li>";
                }
            }
            echo '</ul>';
        } else {
            echo '<p class="error">✗ Assets directory NOT found</p>';
        }
        ?>
    </div>

    <div class="section">
        <h2>5. .htaccess Check</h2>
        <?php
        $htaccessPath = __DIR__ . '/.htaccess';
        if (file_exists($htaccessPath)) {
            echo '<p class="success">✓ .htaccess exists in public directory</p>';
            echo '<h3>Contents:</h3>';
            echo '<pre>' . htmlspecialchars(file_get_contents($htaccessPath)) . '</pre>';
        } else {
            echo '<p class="error">✗ .htaccess NOT found</p>';
        }

        $buildHtaccess = __DIR__ . '/build/.htaccess';
        if (file_exists($buildHtaccess)) {
            echo '<p class="success">✓ .htaccess exists in build directory</p>';
            echo '<h3>Contents:</h3>';
            echo '<pre>' . htmlspecialchars(file_get_contents($buildHtaccess)) . '</pre>';
        } else {
            echo '<p class="warning">⚠ .htaccess NOT found in build directory (optional)</p>';
        }
        ?>
    </div>

    <div class="section">
        <h2>6. Direct File Access Test</h2>
        <?php
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        $currentDir = dirname($_SERVER['PHP_SELF']);
        $testUrl = $baseUrl . $currentDir . '/build/manifest.json';
        
        echo '<p>Try accessing the manifest directly:</p>';
        echo '<p><a href="' . $testUrl . '" target="_blank">' . $testUrl . '</a></p>';
        echo '<p class="warning">⚠ If clicking the link shows HTML instead of JSON, the .htaccess is routing requests incorrectly.</p>';
        ?>
    </div>

    <div class="section">
        <h2>7. PHP Info</h2>
        <pre>
PHP Version: <?php echo PHP_VERSION; ?>

Server Software: <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?>

Document Root: <?php echo $_SERVER['DOCUMENT_ROOT'] ?? 'Unknown'; ?>

Script Filename: <?php echo $_SERVER['SCRIPT_FILENAME'] ?? 'Unknown'; ?>
        </pre>
    </div>

    <div class="section">
        <h2>📋 Summary</h2>
        <p>Upload this diagnostic report to your developer or check each section above.</p>
        <p class="warning">⚠ <strong>IMPORTANT:</strong> Delete this file after diagnosis for security!</p>
    </div>
</body>
</html>
