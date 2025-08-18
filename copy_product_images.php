<?php

// Script to copy existing product images to public storage

$directories = [
    'food_products' => [
        'source' => __DIR__ . '/storage/app/public/food_products',
        'dest' => __DIR__ . '/public/storage/food_products'
    ],
    'toy_products' => [
        'source' => __DIR__ . '/storage/app/public/toy_products', 
        'dest' => __DIR__ . '/public/storage/toy_products'
    ]
];

echo "Copying existing product images...\n";

$totalCopied = 0;

foreach ($directories as $type => $paths) {
    echo "\nProcessing {$type}...\n";
    
    if (!file_exists($paths['source'])) {
        echo "No source directory found at: {$paths['source']}\n";
        echo "This is normal if no {$type} images have been uploaded yet.\n";
        continue;
    }

    if (!file_exists($paths['dest'])) {
        mkdir($paths['dest'], 0755, true);
        echo "Created destination directory: {$paths['dest']}\n";
    }

    $files = glob($paths['source'] . '/*');
    $copiedCount = 0;

    foreach ($files as $file) {
        if (is_file($file)) {
            $filename = basename($file);
            $destFile = $paths['dest'] . '/' . $filename;
            
            if (copy($file, $destFile)) {
                echo "Copied: $filename\n";
                $copiedCount++;
                $totalCopied++;
            } else {
                echo "Failed to copy: $filename\n";
            }
        }
    }

    echo "Copied $copiedCount {$type} images.\n";
}

echo "\nTotal: Copied $totalCopied product images successfully!\n";

?>
