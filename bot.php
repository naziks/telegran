 <?php
 /**
 * INDEX FILE
 *
 * @author     Naziks <mail4nazarko@gmail.com>
 * @copyright  2019 - Naziks
 * @version    1.1
 * @link       https://github.com/naziks/TGbot-template
 */

header('Content-type:text/plain; charset=utf-8'); // SET WEBPAGE TYPE
ini_set("log_errors", 1);                         // ENABLE ERROR LOG
ini_set("error_log", "./error.log");              // CHOOSE ERROR LOG FILE

require('var.php');  // IMPORT VARIABLES
require("lang.php"); // IMPORT BOT ANSWERS FILE


// Choose type of income update

if(array_key_exists("message", $_DATA)){             // TYPE: SIMPLE MESSAGE
	require("assets/query_type/simple_message.php"); 	  // IMPORT 

}elseif(array_key_exists("callback_query", $_DATA)){ // TYPE: INLINE BUTTON CLICK
	require("assets/query_type/inline_button.php");		  // IMPORT 
	
}elseif(array_key_exists("inline_query", $_DATA)){   // INLINE QUERY
	require('assets/query_type/inline_message.php');	  // IMPORT 
}
?>