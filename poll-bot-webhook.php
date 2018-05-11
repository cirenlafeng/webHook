<?php

require_once 'PollBot.php';

define('BOT_TOKEN', '485853567:AAGTdBMBbL2IfXoowR3itZkXx484t-nG7kQ');
define('BOT_WEBHOOK', 'https://testbot.mobibookapp.com/poll-bot-webhook.php');

$bot = new PollBot(BOT_TOKEN, 'PollBotChat');

if (php_sapi_name() == 'cli') {
  if ($argv[1] == 'set') {
    $bot->setWebhook(BOT_WEBHOOK);
  } else if ($argv[1] == 'remove') {
    $bot->removeWebhook();
  }
  exit;
}

$response = file_get_contents('php://input');
$update = json_decode($response, true);





file_get_contents("https://api.telegram.org/bot".BOT_TOKEN."/sendMessage?chat_id=".$update['message']['chat']['id']."&text=".$update['message']['text']);
// $bot->init();
// $bot->onUpdateReceived($update);
// $bot->botSendMessage("ABCD\nDEFG\rSSSS");

