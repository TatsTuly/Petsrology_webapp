<?php

// Simple script to copy existing vet profile images to public/storage

$sourceDir = __DIR__ . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public';
$destDir = __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'storage';

// Create public/storage directory if it doesn't exist
if (!file_exists($destDir)) {
    mkdir($destDir, 0755, true);
    echo "Created directory: $destDir\n";
}

// Create public/storage/vet_profiles directory
$vetProfilesDest = $destDir . DIRECTORY_SEPARATOR . 'vet_profiles';
if (!file_exists($vetProfilesDest)) {
    mkdir($vetProfilesDest, 0755, true);
    echo "Created directory: $vetProfilesDest\n";
}

// Copy files from storage/app/public to public/storage
function copyDirectory($src, $dst) {
    $dir = opendir($src);
    if (!is_dir($dst)) {
        mkdir($dst, 0755, true);
    }
    
    while (($file = readdir($dir)) !== false) {
        if (($file != '.') && ($file != '..')) {
            $srcFile = $src . DIRECTORY_SEPARATOR . $file;
            $dstFile = $dst . DIRECTORY_SEPARATOR . $file;
            
            if (is_dir($srcFile)) {
                copyDirectory($srcFile, $dstFile);
            } else {
                copy($srcFile, $dstFile);
                echo "Copied: $file\n";
            }
        }
    }
    
    closedir($dir);
}

// Copy all files
copyDirectory($sourceDir, $destDir);

echo "All files copied successfully!\n";

?>
