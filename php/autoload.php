<?php

/**
 * Register class autoloader with a closure.
 */
spl_autoload_register(function ($class) {
    $class = trim($class, '\\');
    if (preg_match('/^(data|test|tree)/', $class)) {
        return load_file($class);
    }
});

/**
 * Loads a file in `/dsa/php/` path.
 *
 * @param string $file Relative file path/name
 *
 * @return bool True if success, false otherwise
 */
function load_file($file)
{
    $path = resolve_path($file);
    if ($path) {
        require $path;

        return true;
    }

    return false;
}

/**
 * Resolves full path of given relative file.
 *
 * @param string $file Relative file path/name
 *
 * @return string|null Full pathname if exists, null otherwise
 */
function resolve_path($file)
{
    $path = __DIR__ . '/' . str_replace(['.', '\\'], '/', $file) . '.php';
    if (is_file($path)) {
        return $path;
    }
}
