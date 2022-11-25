<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category;
        $category->inserting(
            [
                [ 'title' => 'Web Development' ],
                [ 'title' => 'Mobile Development' ],
                [ 'title' => 'REACT Dev' ],
                [ 'title' => 'Vuejs' ],
                [ 'title' => 'Javascript' ],
                [ 'title' => 'Magento' ],
                [ 'title' => 'WordPress' ],
                [ 'title' => 'UI/UX Design' ],
                [ 'title' => 'HTML/CSS' ],
                [ 'title' => 'Angular' ],
                [ 'title' => 'PHP Laravel' ],
                [ 'title' => 'Quality Testing' ]
            ]
        );
    }
}
