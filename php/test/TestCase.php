<?php

namespace test;

class TestCase extends \PHPUnit_Framework_TestCase
{
    protected function load($files)
    {
        foreach (func_get_args() as $file) {
            load_file($file);
        }
    }
}
