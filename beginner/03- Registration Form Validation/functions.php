<?php

function post_data($field): string
{
	$_POST[$field] ??= '';
	
	return trim(htmlspecialchars(stripcslashes($_POST[$field])));
}
