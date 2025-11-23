<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

$botman = resolve('botman');

$botman->hears('hi', function (BotMan $bot) {
    $bot->reply('Hello! 👋 How can I help you today?');
});

$botman->hears('help', function (BotMan $bot) {
    $bot->reply('You can ask me about our services, hours, or contact info.');
});
