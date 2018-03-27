<?php 
require_once('./vendor/autoload.php');
// Namespace 
use \LINE\LINEBot\HTTPClient\CurlHTTPClient; 
use \LINE\LINEBot; 
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;

$channel_token ='aRVe2ljy5XpffVHF+u5fjTmPOyYDDNca1/9ebxe+q8D5fJbn+kUgx/G6tYEn8p0h3BwctdLUEIjge+Labpcohi+gb8YaHbJFuAx2Jc2XTag3gXaIWSPgfD2Jk414h3blEjraXDTFvYmew4nWxCdIOQdB04t89/1O/w1cDnyilFU=';
$channel_secret = '91978f842fb92cd207d514d605509b35';

// Get message from Line API 
$content = file_get_contents('php://input'); 
$events = json_decode($content, true);

if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) { 
	// Line API send a lot of event type, we interested in message only.
	if ($event['type'] == 'message') {
	switch($event['message']['type']) {
		case 'text': // Get replyToken
			// Get replyToken 
			$replyToken = $event['replyToken'];
			// Reply message
			$respMessage = 'Hello, your message is '. $event['message']['text'];
			$httpClient = new CurlHTTPClient($channel_token);
			$bot = new LINEBot($httpClient, array('channelSecret' => $channel_secret));
			$textMessageBuilder = new TextMessageBuilder($respMessage);
			$response = $bot->replyMessage($replyToken, $textMessageBuilder);
		break;
} } } } echo "OK";