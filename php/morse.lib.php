<?php
	namespace ScottVM\Morse; 
	
	/**
	* PHP Morse Code Library
	* 
	* Copyright (c) 2023, Scott Vander Molen; some rights reserved.
	* 
	* This work is licensed under a Creative Commons Attribution 4.0 International License.
	* To view a copy of this license, visit https://creativecommons.org/licenses/by/4.0/
	* 
	* @author  Scott Vander Molen
	* @version 2.0
	* @since   2023-09-22
	*/
	
	// Change debugmode to true if you need to see error messages.
	$debugmode = false;
	if ($debugmode)
	{
		// Allow the display of error during debugging.
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	}
	else
	{
		// Display a 404 error if the user attempts to access this file directly.
		if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
		{
			header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
			exit("<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\r\n<html><head>\r\n<title>404 Not Found</title>\r\n</head><body>\r\n<h1>Not Found</h1>\r\n<p>The requested URL " . $_SERVER['SCRIPT_NAME'] . " was not found on this server.</p>\r\n</body></html>");
		}
	}

	// Mapping of unicode characters to morse codes.
	$morse = array(
		" " => "/",
		"A" => "·–",
		"B" => "–···",
		"C" => "–·–·",
		"D" => "–··",
		"E" => "·",
		"F" => "··–·",
		"G" => "––·",
		"H" => "····",
		"I" => "··",
		"J" => "·–––",
		"K" => "–·–",
		"L" => "·–··",
		"M" => "––",
		"N" => "–·",
		"O" => "–––",
		"P" => "·––·",
		"Q" => "––·–",
		"R" => "·–·",
		"S" => "···",
		"T" => "–",
		"U" => "··–",
		"V" => "···–",
		"W" => "·––",
		"X" => "–··–",
		"Y" => "–·––",
		"Z" => "––··",
		"0" => "–––––",
		"1" => "·––––",
		"2" => "··–––",
		"3" => "···––",
		"4" => "····–",
		"5" => "·····",
		"6" => "–····",
		"7" => "––···",
		"8" => "–––··",
		"9" => "––––·",
		"." => "·–·–·–",
		"," => "––··––",
		"?" => "··––··",
		"'" => "·––––·",
		"!" => "–·–·––",
		"/" => "–··–·",
		"(" => "–·––·",
		")" => "–·––·–",
		"&" => "·–···",
		":" => "–––···",
		";" => "–·–·–·",
		"=" => "–···–",
		"+" => "·–·–·",
		"–" => "–····–",
		"_" => "··––·–",
		"\"" => "·–··–·",
		"$" => "···–··–",
		"@" => "·––·–·"
	);
	
	/**
	* Encodes a plain text message into morse code.
	* 
	* @param message The plain text message to encode.
	* @return string The morse-encoded message. Words are separated by forward slashes.
	*/
	function encodeMessage($message)
	{
		global $morse;
		$result = "";
		
		// Loop through the message one character at a time.
		for ($i = 0; $i <= strlen($message) - 1; $i++)
		{
			$character = strtoupper(substr($message, $i, 1));
			$result .= (array_key_exists($character, $morse) ? $morse[$character] : "········") . " ";
		}
		
		$result = rtrim($result);
		return $result;
	}
	
	/**
	* Decodes a morse-encoded message into plain text.
	* 
	* @param message The morse-encoded message to decode.
	* @return string The decoded plain text message.
	*/
	function decodeMessage($message)
	{
		global $morse;
		$result = "";
		$characters = explode(" ", $message);
		
		foreach ($characters as &$character)
		{
			$result .= in_array($character, $morse, true) ? array_search($character, $morse, true) : "ERROR";
		}
		unset($character);
		
		return $result;
	}
?>
