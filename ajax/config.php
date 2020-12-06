<?php

function get_path($path)
{
    echo 'http://localhost:8000/laravel/ajax/' . $path;
}
echo "http://" . $_SERVER['SERVER_NAME'] . ":8000" . $_SERVER['REQUEST_URI'];
