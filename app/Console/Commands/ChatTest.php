<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class ChatTest extends Command
{
    protected $signature = 'chat:test';
    protected $description = 'Test BotMan in CLI';

    public function handle()
    {
        DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
        $botman = BotManFactory::create([]);

        $botman->hears('hi', function (BotMan $bot) {
            $bot->reply('Hello from Laravel CLI!');
        });

        $input = $this->ask('You:');
        $botman->listen($input);
    }
}
