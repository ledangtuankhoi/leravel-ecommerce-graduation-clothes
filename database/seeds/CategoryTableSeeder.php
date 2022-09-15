<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $nameCate = [
            'laptop', 'desktop', 'mobile', 'tablet', 'tv', 'digital-camera',
            'appliance'
        ];
        $loremString = 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.;';


        // $ar = array('''')
        for ($i = 0; $i < 7; $i++) {
            Category::insert([
                [
                    'description' => 'description ' . $loremString,
                    'image' => 'categories/dummy/category-' . ($i + 1) . '.jpg',
                    'images' =>
                    "['products\/dummy\/" . $nameCate[$i] . "-1.jpg', 
                    'products\/dummy\/" . $nameCate[$i] . "-2.jpg', 
                    'products\/dummy\/" . $nameCate[$i] . "-3.jpg', 
                    'products\/dummy\/" . $nameCate[$i] . "-4.jpg', 
                    'products\/dummy\/" . $nameCate[$i] . "-5.jpg']",
                    'name' => '' . ucfirst($nameCate[$i]) . 's',
                    'slug' => '' . $nameCate[$i] . 's',
                    'created_at' => $now,
                    'updated_at' => $now
                ]
            ]);
        }
 
    }
}
