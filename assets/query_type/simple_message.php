<?php
/**
 * Simple Message
 * 
 * @package    TGbot-template
 * @author     Naziks <mail4nazarko@gmail.com>
 * @copyright  2019 - Naziks
 * @version    1.1
 * @link       https://github.com/naziks/TGbot-template
 */

if(!isset($tg)) die(); // IF OPENED IN BROWSER -> DO NOT DO ANYTHING

// MESSAGE OBJECT
$_M = $_DATA['message'];

// MESSAGE TEXT
$_T = explode(" ", $_M['text']);  

// CHAT ID
$_CID = $_M['chat']['id'];        

//IF TEXT is COMMAND
if(substr($_M['text'], 0, 1) == "/"){ 
	switch ($_T[0]) { 
		case '/start':
			$tg->sendRequest('sendMessage', [
				"chat_id" => $_CID,
				"text" => $_LANG['hello_world'],
				"parse_mode" => "HTML"
			]);
		break;
	}
}