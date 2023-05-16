<?php

namespace App\Config;

class DotEnv
{
    /**
     * Set environment variables with .env file
     */
    public static function setEnvVariables(): void
    {
        // Get all lines from .env
        $file = file(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . '.env', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

        foreach ($file as $line) {
            // Remove line spaces before first char to check if it is a comment
            trim($line);

            // Ignore comment lines
            if ($line[0] !== '#' && $line[0] !== ';') {
                // Get Key & Value from line
                $pair = explode('=', $line);

                // Set environment variable with found pair
                $_ENV[$pair[0]] = $pair[1];
            }
        }
    }
}