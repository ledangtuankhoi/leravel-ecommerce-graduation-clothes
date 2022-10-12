<?php

use App\BlockPage;
use Illuminate\Database\Seeder;

class BlockPagesTableSeeder extends Seeder
{

    protected $dataSample_landing_page_new_product =
    [
        "0" => [
            "category_id" => 6  ,
            "products" => [67, 68]
        ],
        "1" => [
            "category_id" => 1,
            "products" => [2]
        ],
        "2" => [
            "category_id" => 2,
            "products" => [31,32]
        ],
        "3" => [
            "category_id" => 3,
            "products" => [40,41]
        ],
        "4" => [
            "category_id" => 4,
            "products" => [53]
        ],
    ];


    protected $dataSample_landing_page_banners_slider = [
            'captions' => [
                0 => [
                    'title' => 'public static function BannerSlider()',
                    'link_shop' => 'http://localhost/test-theme/shop?c=desktops'
                ],
                2 => [
                    'title' => 'public static function BannerSlider()',
                    'link_shop' => 'http://localhost/test-theme/shop?c=desktops'
                ],
                3 => [
                    'title' => 'public static function BannerSlider()',
                    'link_shop' => 'http://localhost/test-theme/shop?c=desktops'
                ],
                4 => [
                    'title' => 'public static function BannerSlider()',
                    'link_shop' => 'http://localhost/test-theme/shop?c=desktops'
                ]
            ],
            'image' => [
                'image_left' => '',
                'image_right' => '',
                'image_background' => 'banners/dummy/banner-1.jpg'
            ]

        ];

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
                serialize([0, 1, 2, 3, 4, 5]),
                'description' => 'description',
                'status' => true
            ],
            [
                'title' => 'landing-page-new-product',
                'slug' => 'landing-page-new-product',
                'config-content' =>
                // "['laptops','desktops','mobile','tablets','tvs']", 
                serialize($this->dataSample_landing_page_new_product),
                'description' => 'description',
                'status' => true
            ],

            [
                'title' => 'landing-page-banners-slider',
                'slug' => 'landing-page-banners-slider',
                'config-content' =>
                // "['laptops','desktops','mobile','tablets','tvs']", 
                serialize($this->dataSample_landing_page_banners_slider),
                'description' => 'description',
                'status' => true
            ]
        );
    }
}
