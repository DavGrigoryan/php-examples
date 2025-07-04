<?php
// Open the file "life-of-the-bee.txt" for reading.
$handle = fopen("life-of-the-bee.txt", "r");

// Initialize counters for total lines and short lines.
$total_lines = 0;
$short_lines = 0;


if ($handle) { // If the file was opened successfully.
    // Read the file line by line until the end of the file.
    while (($line = fgets($handle)) !== false) {
        $total_lines++;

        // If the length of the line is less than or equal to 30 characters.
        if (strlen($line) <= 30) {
            // Increment the short lines counter.
            $short_lines++;
        }
    }

    // Close the file.
    fclose($handle);
}

// Output the total number of lines processed.
echo "Total Lines: $total_lines.\n";

// Output the total number of lines that are less than or equal to 30 characters in length.
echo "Total number of short lines: $short_lines.\n";