<?php
function compressImage($source_path, $destination_path, $quality) {
    $info = getimagesize($source_path);
    

    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source_path);
        imagejpeg($image, $destination_path, $quality);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source_path);
        $png_quality = 9 - round(($quality / 100) * 9); 
        imagepng($image, $destination_path, $png_quality);
    } else {
        return false; 
    }

    imagedestroy($image);
    return $destination_path;
}

function optimizeImagesInFolder($folder_path, $quality = 80, $size_limit_mb = 2) {
    if (!is_dir($folder_path)) {
        die(" Invalid folder path!");
    }

    $output_folder = rtrim($folder_path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . "optimized_images";
    if (!file_exists($output_folder)) {
        mkdir($output_folder, 0777, true);
    }

    $files = scandir($folder_path);
    $optimized_count = 0;

    foreach ($files as $file) {
        $file_path = $folder_path . DIRECTORY_SEPARATOR . $file;
        echo "\nProcessing: $file_path\n";
        if (is_file($file_path)) {
            $ext = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
            $file_size_mb = filesize($file_path) / (1024 * 1024); 

            if (in_array($ext, ['jpg', 'jpeg', 'png']) && $file_size_mb > $size_limit_mb) {
                $dest_path = $output_folder . DIRECTORY_SEPARATOR . $file;
                $result = compressImage($file_path, $dest_path, $quality);

                if ($result) {
                    echo " Optimized: $file (" . round($file_size_mb, 2) . " MB)\n";
                    $optimized_count++;
                } else {
                    echo " Skipped (unsupported or failed): $file\n";
                }
            } elseif (in_array($ext, ['jpg', 'jpeg', 'png'])&& $file_size_mb <= $size_limit_mb) {
                copy($file_path, $output_folder . DIRECTORY_SEPARATOR . $file);
                echo " Skipped (size below limit): $file (" . round($file_size_mb, 2) . " MB)\n";
            } else {
                echo " Skipped (unsupported format): $file\n";
            }
        }
    }

    echo "\nTotal optimized images: $optimized_count\n";
    echo "Optimized images saved in: $output_folder\n";
}


$folder = "test_images"; 
optimizeImagesInFolder($folder, 80, 2);
?>
