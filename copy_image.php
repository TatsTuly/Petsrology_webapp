<?php

$sourceFile = __DIR__ . '/storage/app/public/vet_profiles/SfqXXAEUxeFohROwnlDujlTAaGM07Zhn6rbmizIF.jpg';
$destFile = __DIR__ . '/public/storage/vet_profiles/SfqXXAEUxeFohROwnlDujlTAaGM07Zhn6rbmizIF.jpg';

if (file_exists($sourceFile)) {
    if (copy($sourceFile, $destFile)) {
        echo "Image copied successfully!";
        echo "\nSource: " . $sourceFile;
        echo "\nDestination: " . $destFile;
        echo "\nDestination exists: " . (file_exists($destFile) ? 'Yes' : 'No');
    } else {
        echo "Failed to copy image.";
    }
} else {
    echo "Source file does not exist: " . $sourceFile;
}

?>
