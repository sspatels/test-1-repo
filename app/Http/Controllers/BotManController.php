<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

         $botman->hears('{message}',function($botman,$message) {
            if($message == 'hi') {
                $this->askName($botman);
            }else{
                $botman->reply('write hi for start communication!');
            }
         });

         $botman->listen();

    }

    public function askName($botman) {
        $botman->ask('hello! what is your Name ?',function(Answer $answer){
            $name = $answer->getText();

            $this->say('Nice to meet you '.$name);
        });
    }

}
