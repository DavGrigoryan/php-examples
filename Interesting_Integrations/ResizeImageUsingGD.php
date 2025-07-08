<?php
/**
 * Image Resizer
 *
 * A simple PHP script to resize images using the GD library.
 */

function resizeImage($sourceImagePath, $destinationImagePath, $newWidth, $newHeight)
{
    // Get the original image dimensions
    list($originalWidth, $originalHeight) = getimagesize($sourceImagePath);

    // Create a new image resource with the specified dimensions
    $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

    // Load the original image
    $originalImage = imagecreatefromjpeg($sourceImagePath);

    // Resize the image
    imagecopyresized($resizedImage, $originalImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

    // Save the resized image to the destination path
    imagejpeg($resizedImage, $destinationImagePath);

    // Free up memory
    imagedestroy($resizedImage);
    imagedestroy($originalImage);

    echo "Image resized and saved successfully!";
}

// Example usage
$sourceImage = "path/to/source/image.jpg";
$destinationImage = "path/to/destination/image.jpg";
$newWidth = 800;
$newHeight = 600;

resizeImage($sourceImage, $destinationImage, $newWidth, $newHeight);
