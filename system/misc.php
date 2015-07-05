<?php

//Extract GET argument from string like : ?test=test and put them into $_GET
function try_extract_args_from_uri_fragments(&$uri_fragment)
{
	if(strpos($uri_fragment, '?') !== false)
	{
		$tmp = explode('?', $uri_fragment);
		$uri_fragment = ($tmp[0] == '') ? 'index' : $tmp[0]; //Never happens with controller, only for action (because controller has default value set in config.php)
		parse_str($tmp[1], $_GET);
	}
}
