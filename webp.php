<?php

$input_dir = 'D:\input_images'; //replace it with your input directory path
$output_dir = 'output_webp_images'; //replace it with your desired output directory path

if (!is_dir($output_dir)) {
    mkdir($output_dir, 0777, true); 
}

$images = glob($input_dir . '/*.{jpg,jpeg,png}', GLOB_BRACE);

foreach ($images as $image_path) {
    $file_info = pathinfo($image_path);
    $filename = $file_info['filename'];
    $extension = strtolower($file_info['extension']);

    $output_webp_path = $output_dir . '/' . $filename . '.webp';

    
    if (file_exists($output_webp_path)) {
        echo "Skipping '{$filename}.{$extension}' as WebP already exists.<br>";
        continue;
    }

    $image = null;

    switch ($extension) {
        case 'jpg':
        case 'jpeg':
            $image = imagecreatefromjpeg($image_path);
            break;
        case 'png':
            $image = imagecreatefrompng($image_path);
            
            if ($image) {
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
            }
            break;
        default:
            echo "Unsupported image format for '{$filename}.{$extension}'. Skipping.<br>";
            continue 2; 
    }

    if ($image) {
       
        if (imagewebp($image, $output_webp_path, 80)) {
            echo "Converted '{$filename}.{$extension}' to '{$filename}.webp'.<br>";
        } else {
            echo "Failed to convert '{$filename}.{$extension}' to WebP.<br>";
        }
        imagedestroy($image); 
    } else {
        echo "Failed to load image '{$filename}.{$extension}'.<br>";
    }
}

echo "Image conversion process completed.";

?>