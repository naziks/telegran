# PHP Telegram Bot Template

## Pre-Requirements
1. PHP Hosting
2. SSL Certificate (If you don't have it, you can use [Cloudflare](https://www.cloudflare.com/))
3. **CURL IS NOT REQUIRED**

## Quick Start	
1. Clone template to your website
2. Create bot via [BotFather](https://t.me/BotFather)
3. Open **[var.php](https://github.com/naziks/TGbot-template/blob/master/var.php)** and edit this:
```php
define("TOKEN", "BOT_TOKEN");        // (REQUIRED) BOT_TOKEN
define('ADMIN_ID', 'YOUR_ID');       // (OPTIONAL) YOUR ID

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
```
4. Set Webhook
5. THe End!
