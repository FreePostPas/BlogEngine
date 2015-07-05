<?php

function render($view_name, $data = null)
{
    if(is_readable(dirname(__FILE__) .'/../views/'.$view_name.'.php'))
        readfile(dirname(__FILE__) .'/../views/'.$view_name.'.php');
    else
        echo "<h1>Error</h1><h2>Not found. Try again or come back later.</h2>";
}
