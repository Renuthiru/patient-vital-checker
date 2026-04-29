<?php

function scanFolder($path)
{
    $items = scandir($path);

    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }

        $itemPath = $path . DIRECTORY_SEPARATOR . $item;

        if (is_dir($itemPath)) {
            scanFolder($itemPath);
        } else {
            echo 'File: ' . $item . PHP_EOL;
        }
    }
}
