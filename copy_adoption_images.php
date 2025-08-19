<?php

// Script to copy existing adoption images to public storage

$sourceDir = __DIR__ . '/storage/app/public/adoption_images';
$destDir = __DIR__ . '/public/storage/adoption_images';

echo "Copying existing adoption images...\n";

if (!file_exists($sourceDir)) {
    echo "No source directory found at: $sourceDir\n";
    echo "This is normal if no adoption images have been uploaded yet.\n";
    exit(0);
}

if (!file_exists($destDir)) {
    mkdir($destDir, 0755, true);
    echo "Created destination directory: $destDir\n";
}

$files = glob($sourceDir . '/*');
$copiedCount = 0;

foreach ($files as $file) {
    if (is_file($file)) {
        $filename = basename($file);
        $destFile = $destDir . '/' . $filename;
        
        if (copy($file, $destFile)) {
            echo "Copied: $filename\n";
            $copiedCount++;
        } else {
            echo "Failed to copy: $filename\n";
        }
    }
}

echo "Copied $copiedCount adoption images successfully!\n";

?>
