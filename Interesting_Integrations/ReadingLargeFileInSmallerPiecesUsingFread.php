<?php
function count_file_iterations($filename)
{
    // Open the file for reading
    $handle = fopen("large-story.txt", "r");

    // Set the chunk size to 1 MB
    $chunk_size = 1024 * 1024;

    // Initialize a counter for the number of iterations
    $iterations = 0;

    // If the file was opened successfully
    if ($handle) {
        // Loop through the file until the end is reached
        while (!feof($handle)) {
            $iterations++; // Increment the iteration counter
            $chunk = fread($handle, $chunk_size); // Read a chunk of the file (up to 1 MB in size)
            // Do something with the chunk (this code currently does nothing with it)
        }
        fclose($handle); // Close the file handle
    }

    // Return the number of iterations
    return $iterations;
}

// Call the function with the file name
$filename = "large-story.txt";
$iterations = count_file_iterations($filename);

// Output a message indicating the number of iterations it took to read the whole file
echo "Read the whole file in $iterations iterations.";