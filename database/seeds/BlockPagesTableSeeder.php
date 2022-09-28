<?php

use App\BlockPage;
use Illuminate\Database\Seeder;

class BlockPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlockPage::create(
            [
                'title' => 'landing-page-category',
                'slug' => 'landing-page-category',
                'config-content' =>
                // "['laptops','desktops','mobile','tablets','tvs']", 
                serialize([0,1,2,3,4,5]),
                'description' => 'description',
                'status' => true
            ]
        );
    }
}
