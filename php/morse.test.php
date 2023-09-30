<?php
	/**
	* PHP Morse Code Unit Tests
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
		// Allow the display of errors during debugging.
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	}
	
	echo "<pre>";
	echo "/***************************************************************************************\\\n";
	echo "| PHP Morse Code Library                                                                |\n";
	echo "|                                                                                       |\n";
	echo "| Copyright (c) 2023, Scott Vander Molen; some rights reserved.                         |\n";
	echo "|                                                                                       |\n";
	echo "| This work is licensed under a Creative Commons Attribution 4.0 International License. |\n";
	echo "| To view a copy of this license, visit https://creativecommons.org/licenses/by/4.0/    |\n";
	echo "|                                                                                       |\n";
	echo "\***************************************************************************************/\n";
	echo "</pre>";

	include 'morse.lib.php';
	use ScottVM\Morse as Morse;
	
	/**
	* Encodes a plain text message into morse code and compares to the expected result.
	* 
	* @param input The plain text message to encode.
	* @param expected The expected morse-encoded result.
	* @return boolean Whether the result matched the expectation.
	*/
	function testEncode($input, $expected)
	{
		$actual = Morse\encodeMessage(strtoupper($input));
		$result = $actual == $expected;

		echo "Unit Test: encodeMessage()\n";
		echo "Input:     " . strtoupper($input) . "\n";
		echo "Expected:  " . $expected . "\n";
		echo "Actual:    " . $actual . "\n";
		echo "Result:    Test " . ($result ? "successful" : "failed") . "!\n\n";
		
		return $result;
	}
	
	/**
	* Decodes a morse-encoded message into plain text and compares to the expected result.
	* 
	* @param input The morse-encoded message to decode.
	* @param expected The expected plain text result.
	* @return boolean Whether the result matched the expectation.
	*/
	function testDecode($input, $expected)
	{
		$actual = Morse\decodeMessage($input);
		$result = $actual == strtoupper($expected);

		echo "Unit Test: decodeMessage()\n";
		echo "Input:     " . strtoupper($input) . "\n";
		echo "Expected:  " . strtoupper($expected) . "\n";
		echo "Actual:    " . $actual . "\n";
		echo "Result:    Test " . ($result ? "successful" : "failed") . "!\n\n";
		
		return $result;
	}
	
	echo "<pre>";
	$test1 = testEncode("Hello world!", "···· · ·–·· ·–·· ––– / ·–– ––– ·–· ·–·· –·· –·–·––");
	$test2 = testDecode("···· · ·–·· ·–·· ––– / ·–– ––– ·–· ·–·· –·· –·–·––", "Hello world!");
	echo "</pre>";
?>
