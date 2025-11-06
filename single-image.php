<?php
// Source image path
$source_image_path = './test_images/GoretexJacket-47.jpg'; 
// Destination image path
$destination_image_path = 'compressed.jpg';
// Desired quality (0-100, 100 is best quality, largest file size)
$quality = 75; 

// Load the source image
$image = imagecreatefromjpeg($source_image_path);

// Save the image with compression
imagejpeg($image, $destination_image_path, $quality);

// Free up memory
imagedestroy($image);

echo "Image compressed successfully!";
?>