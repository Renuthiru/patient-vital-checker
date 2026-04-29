<?php

function scanFolder($path)
{
    $items = scandir($path);

    foreach ($items as $item) {

        // Skip current, parent, and .git folder
        if ($item === '.' || $item === '..' || $item === '.git') {
            continue;
        }

        $itemPath = $path . DIRECTORY_SEPARATOR . $item;

        //  Block anything inside .git
        if (strpos($itemPath, '.git') !== false) {
            continue;
        }

        if (is_dir($itemPath)) {
            scanFolder($itemPath);
        } else {

            // Show only PHP files
            if (pathinfo($item, PATHINFO_EXTENSION) === 'php') {
                echo 'File: ' . $item . '<br>';
            }
        }
    }
}