# Telegran

Modern Telegram bot template.
Bots are special Telegram accounts designed to handle messages automatically. Users can interact with bots by sending them command messages in private or group chats. These accounts serve as an interface for code running somewhere on your server.

## Table of Content
1. [Pre-Requirements](#pre-requirements)
2. [Quich Start](#quick-start)
3. [Variables](#variables)
4. [Telegram Class Methods](#telegram-class-methods)
5. [Template structure](#template-structure)

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
5. The End!

## Variables
| Location        |Variable        	| Description                           |
|:---------------:|:-------------------:|:-------------------------------------:|
| GLOBAL          | $tg                 | Telegram Object                       |
| GLOBAL          | $db                 | Database Object                       |  
| GLOBAL          | $\_DATA             | Webhook Income Data                   | 
| ~GLOBAL         | $\_M                | Message Object                        |
| SIMPLE\_MESSAGE | $\_T                | Message Text exploded by space        |
| ~GLOBAL         | $\_CID              | Telegram Message Chat Id              |
| INLINE\_BUTTON  | $\_QID              | Callback Query ID                     |
| INLINE\_BUTTON  | $\_QDATA            | Callback Query DATA exploded by ";"   |

## Telegram Class Methods

### Using:
```php
$tg->METHOD_NAME($PARAM_1, $PARAM_2, ..., $PARAM_N)
```

| Name                             | PARAMS        	                         | Return                          |
|:--------------------------------:|:-------------------------------------------:|:-------------------------------:|
| sendRequest                      | (_String_) Method, (_Array_) Params         | _Array_ Telegram API Response   |
|                                  |                                             |                                 |
| buildInlineButton                | Inline Button                               | _Array_                         |
| buildReplyButton                 | Reply Button                                | _Array_                         |
| buildInlineKeyboard              | (_Array_)  of InlineButtons                 | _String_ JSON                   |
| buildReplyKeyboard               | (_Array_)  of ReplyButtons, Array of params | _String_ JSON                   |
| buildForceReply                  | (_Array_)  of params                        | _String_ JSON                   |
| removeReplyKeyboard              | (_Array_)  of params                        | _String_ JSON                   |
| buildInlineLine                  | (_Array_)  of params                        | _Array_                         |
| buildInlineQueryResult           | (_Array_)  of params                        | _String_ JSON                   |

## Template structure

ROOT:  
```
├── classes  
│   ├── tg.class.php // Telegram API class
│   └── db.class.php // Database class
├── query_type 
│   ├── inline_button.php  // Message type inline button
│   ├── inline_message.php // Message type inline query  
│   └── simple_message.php // Message type simple message  
├── lang.php // language file
├── bot.php  // Main file, requested by WebHook
├── var.php  // Main variables of bot
└── lang.php // language file
```
