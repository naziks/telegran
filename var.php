 <?php 
define("TOKEN", "BOT_TOKEN");              // DEFINE BOT TOKEN 
define('ADMIN_ID', 'YOUR_ID');            // SET ADMINISTRATOR ID (Optional)

$_FEATURES = Array(
	"debug"      => false,
	"db_enabled" => false
);

$_DATABASE_CONFIG = Array(
	"host" => "localhost",
	"username" => "username",
	"password" => "password",
	"database_name" => "db_name"
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