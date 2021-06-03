<?php
	$lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
	$lang = explode(",", $lang);
	if ((string)$lang[0] == "ko-KR") {
		include_once "./lang/ko.php";
	} else {
		include_once "./lang/en.php";
	}
?>