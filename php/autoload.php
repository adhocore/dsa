<?php

spl_autoload_register(function ($class) {
    $class = trim($class, '\\');
    if (preg_match('/^(data|test|tree)/', $class)) {
        return load_file($class);
    }
});

function load_file($file)
{
    $path = resolve_path($file);
    if ($path) {
        require $path;
    }
}

function resolve_path($file)
{
    $path = __DIR__.'/'.str_replace(['.', '\\'], '/', $file).'.php';
    if (is_file($path)) {
        return $path;
    }
}
