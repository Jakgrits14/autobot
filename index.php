<?php

// example: https://github.com/onlinetuts/line-bot-api/blob/master/php/example/chapter-01.php

include ('line-bot-api/php/line-bot.php');

$channelSecret = '91978f842fb92cd207d514d605509b35';
$access_token  = 'fMcjIQwxtTaSpnukO+x2A9tWXzq5pYWL73lfItfkrYSd2G0+i04XbiHa7wdlBuOG3BwctdLUEIjge+Labpcohi+gb8YaHbJFuAx2Jc2XTajdUHOzg01TCZDko8TPrVZ6mBiV06JlmbYaWD2dsptItAdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
		
	$bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

	if ($bot->isSuccess()) {
		echo 'Succeeded!';
		exit();
	}

	// Failed
	echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
	exit();

}
