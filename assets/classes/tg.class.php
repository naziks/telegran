<?php
/**
 * Telegram Class
 *
 * @author     Naziks <mail4nazarko@gmail.com>
 * @copyright  2019 - Naziks
 * @version    1.1
 * @link       https://github.com/naziks/TGbot-template
 */

class Telegram{
	private $token;
	private $data = array();
	private $debug = false;

	public function __construct($token){
		$this->token = $token;
		$this->data = $this->getData();	}

	public function getData(){
		return json_decode(file_get_contents("php://input"), true);
	}

	public function buildInlineButton(array $params){
		return $params;
	}
	public function buildReplyButton(array $params){
		return $params;
	}

	public function buildInlineKeyboard(array $buttons){
		return json_encode(array("inline_keyboard" => $buttons), true);
	}

	public function buildReplyKeyboard(array $buttons, array $params = array()){
		return json_encode(array("keyboard" => $buttons, $params), true);
	}

	public function buildForceReply(array $params = array()){
		return json_encode(array("force_reply" => true, $params), true);
	}

	public function removeReplyKeyboard(array $params = array()){
		return json_encode(array("remove_keyboard" => true, $params), true);
	}

	public function buildInlineLine(array $params){
		return $params;
	}

	public function buildInlineQueryResult(array $params){
		return json_encode($params);
	}

	public function debug($chat_id = 0) {
		$this->debug = ($chat_id == 0 ? false : $chat_id);
	}

	public function sendRequest($method, array $params = array(), $debug = false){
		$url = "https://api.telegram.org/bot" . $this->token . "/" . $method . "?" . http_build_query($params);
		$result = file_get_contents($url);

		if(!$debug && $this->debug){
			$debugparams = array(
				"chat_id" => $this->debug,
				"text"	=>	"<b>[Debug info]</b>" . "\n" .
							"<b>Method: </b>$method" . "\n".
							"<b>Parameters:</b>" . "\n" .
							"<pre>" . 
								print_r(
									json_encode(
										$this->getData(),
										JSON_PRETTY_PRINT
									),
									true
								) . 
							"</pre>" . "\n" .
							"<b>API:</b>" . "\n" .
							"<pre>" .
								print_r(
									json_encode(
										$params,
										JSON_PRETTY_PRINT
									),
									true
								) . 
							"</pre>" . "\n" .
							"<b>Result:</b>" . "\n" .
							"<pre>" .
								print_r(
									json_decode($result),
									true
								) . 
							"</pre>" ."\n" . 
							"<a href=\"$url\">Request</a>",
				"parse_mode" => "HTML"
			);

			$this->sendRequest("sendMessage", $debugparams, true);
		}

		return json_decode($result, true);
	}

}
?>