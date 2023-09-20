<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Tweet;



class TweetSeeder extends Seeder
{
    
    public $tweets = [
        [
            'title' => 'Delicious meal',
            'text' => 'Just had the most delicious meal! 🍔 #foodie'
        ],
        [
            'title' => 'Weekend getaway',
            'text' => 'Excited for the weekend getaway! 🌴 #vacationmode'
        ],
        [
            'title' => 'Coding fun',
            'text' => 'Coding is so much fun! 💻 #programming'
        ],
        [
            'title' => 'Great workout',
            'text' => 'Just finished a great workout! 💪 #fitness'
        ],
        [
            'title' => 'Movie night',
            'text' => 'Movie night with friends tonight! 🍿🎬 #FridayFun'
        ]
    ];

    public function run(): void
    {

        foreach($this->tweets as $tweet){
            Tweet::create([
                "title" => $tweet['title'],
                "text" => $tweet['text']
            ]);
        }
        
    }
}
