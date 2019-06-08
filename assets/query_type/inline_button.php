<?php
/**
 * Inline Button
 *
 * @author     Naziks <mail4nazarko@gmail.com>
 * @copyright  2019 - Naziks
 * @version    1.1
 * @link       https://github.com/naziks/TGbot-template
 */


if(!isset($tg)) die(); // IF OPENED IN BROWSER -> DO NOT DO ANYTHING

// MESSAGE OBJECT
$_M     = $_DATA['callback_query']['message'];

// CALLBACK QUERY ID        
$_QID   = $_DATA['callback_query']['id'];

// CALLBACK QUERY DATA		  
$_QDATA = explode(';', $_DATA['callback_query']['data']);

// CHAT ID
$_CID   = $_M['chat']['id'];                              

switch ($_QDATA[0]) { // SWITCH COMMAND
	default: // IF NO COMMAND, JUST ANSWER
	$tg->sendRequest("answerCallbackQuery", [
		"callback_query_id" =>  $d['callback_query']['id']
	]);
	break;
}

?>