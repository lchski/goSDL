<?php
	require_once("../vendor/autoload.php");
	include('../include/lib_smarty.php');

	/**
      * SDL endpoint
      */

	$smarty->display('page_sdl.txt');
	exit;
