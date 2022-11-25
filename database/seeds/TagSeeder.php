<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag;
        $tag->inserting(
            [
                [ 'title' => '#javascript' ],
                [ 'title' => '#react' ],
                [ 'title' => '#vuejs' ],
                [ 'title' => '#webdev' ],
                [ 'title' => '#software developer' ],
                [ 'title' => '#mobilecoding' ],
                [ 'title' => '#beginner' ],
                [ 'title' => '#programming' ],
                [ 'title' => '#devops' ]
            ]
        );
    }
}
