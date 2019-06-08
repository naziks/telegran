 <?php 
 /**
 * Variables
 *
 * @author     Naziks <mail4nazarko@gmail.com>
 * @copyright  2019 - Naziks
 * @version    1.1
 * @link       https://github.com/naziks/TGbot-template
 */

define("TOKEN", "BOT_TOKEN");    // (REQUIRED) BOT_TOKEN
define('ADMIN_ID', 'YOUR_ID');   // (OPTIONAL) YOUR ID

$_FEATURES = Array(
	"debug"      => false,       // (OPTIONAL) YOUR_ID OR FALSE
	"db_enabled" => false        // (OPTIONAL) TRUE OR FALSE
);

$_DATABASE_CONFIG = Array(
	"host" => "localhost",       // DATABASE HOST
	"username" => "username",    // DATABASE USER
	"password" => "password",    // DATABASE USER PASSWORD
	"database_name" => "db_name" // DATABASE NAME
);



//* ---------------------------. *//
//* DO NOT CHANGE ANYTHING BELOW *//
//* ---------------------------. *//

define('BOT_ID', explode(':',TOKEN)[0]);   // GET BOT ID FROM TOKEN 

require("assets/classes/tg.class.php"); // IMPORT TELEGRAM CLASS
$tg = new Telegram(TOKEN); //CREATE TELEGRAM CONNECTION

if($_FEATURES['db_enabled']){
require("assets/classes/db.class.php"); // IMPORT DATABASE CLASS
$db = new xDB($_DATABASE_CONFIG); //CREATE DATABASE CONNECTION
}        

if($_FEATURES['debug'] != false){
	$tg->debug($_FEATURES['debug']); // (ENABLE / DISABLE) DEBUG
}

$_DATA = $tg->getData();   // GET Webhook