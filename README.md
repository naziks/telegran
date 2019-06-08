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

├── **classes**

│   ├── **tg.class.php** - _Telegram API class_

│   └── **db.class.php** - _Database class_
├── **query_type**"."\n".
│   ├── **inline_button.php** - _Message type inline button_
│   ├── **inline_message.php**> - _Message type inline query_
│   └── **simple_message.php** - _Message type simple message_
├── **lang.php** - _language file_.
├── **bot.php** - _Main file, requested by WebHook_
├── **var.php** - _Main variables of bot_
├── **lang.php ** - _language file_
└── <b>debug.php</b> - _extra debug file_
