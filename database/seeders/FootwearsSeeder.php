<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Footwears;

class FootwearsSeeder extends Seeder
{
    public function runs(): void
    {
     $footwears = [
            [
                'category' => 'Male Shoe',
                'name' => 'Black office Shoe',
                'price' => 150000,
                'description' => 'Nice, shining black shoe that can be worn on corporate wears to offices, meetings, etc.',
                'image' => 'mshoe1.jpg'
            ],
            [
                'category' => 'Male Shoe',
                'name' => 'Leather Shoe',
                'price' => 120000,
                'description' => 'Leather shoe with long lasting material which is available in different colors.',
                'image' => 'mshoe2.jpg'
            ],
            [
                'category' => 'Male Shoe',
                'name' => 'Stoned Shining shoe.',
                'price' => 200000,
                'description' => 'Stoned shining shoe, most suitable for parties, dates, etc. ',
                'image' => 'mshoe3.jpg'
            ],
            [
                'category' => 'Male Shoe',
                'name' => 'Appenda Shoe',
                'price' => 160000,
                'description' => 'Appenda shiny shoe suitable for official purposes.',
                'image' => 'mshoe4.jpg'
            ],
            [
                'category' => 'Male Shoe',
                'name' => 'Lappenda shoe',
                'price' => 200000,
                'description' => 'Lappenda shoe suitable for offices, hangouts, dates, etc.',
                'image' => 'mshoe5.jpg'
            ],
            [
                'category' => 'Female Shoe',
                'name' => 'Red High Heel Shoe',
                'price' => 150000,
                'description' => 'High heel suitable for parties, events and may be worn for official purposes.',
                'image' => 'fshoe1.jpg'
            ],
            [
                'category' => 'Female Shoe',
                'name' => 'Grey Low Heel Shoe',
                'price' => 120000,
                'description' => 'Low soled heel most suitable for ceremonies, nice on native dresses as well.',
                'image' => 'fshoe2.jpg'
            ],
            [
                'category' => 'Female Shoe',
                'name' => 'Baby Shoe',
                'price' => 200000,
                'description' => 'Nice baby shoe, most suitable for official purposes.',
                'image' => 'fshoe3.jpg'
            ],
            [
                'category' => 'Female Shoe',
                'name' => 'Covered Low Heel Shoe',
                'price' => 160000,
                'description' => 'Covered low heel show suitable for official purposes.',
                'image' => 'fshoe4.jpg'
            ],
            [
                'category' => 'Female Shoe',
                'name' => 'Birken Stock Shoe',
                'price' => 200000,
                'description' => 'Beautiful portable shoe suitable for official purposes and casual wear.',
                'image' => 'fshoe5.jpg'
            ],
            [
                'category' => 'Casual Wear',
                'name' => 'Home Wear',
                'price' => 5000,
                'description' => 'Nice, shining black and white slide, suitable for wearing inside homes.',
                'image' => 'slide1.jpg'
            ],
            [
                'category' => 'Casual Wear',
                'name' => 'Brown Leathered Slide',
                'price' => 12000,
                'description' => 'Strong, leathered slide to be worn casually.',
                'image' => 'slide2.jpg'
            ],
            [
                'category' => 'Casual Wear',
                'name' => 'Soft Sole Slide.',
                'price' => 4000,
                'description' => 'Soft slide to be worn casually and inside homes.',
                'image' => 'slide3.jpg'
            ],
            [
                'category' => 'Casual Wear',
                'name' => 'Rubber Slide',
                'price' => 4000,
                'description' => 'Colored, rubber slide to be worn casually.',
                'image' => 'slide4.jpg'
            ],
            [
                'category' => 'Casual Wear',
                'name' => 'Black Sole Leathered Slide',
                'price' => 10000,
                'description' => 'Strong, leathered slide to be worn casually.',
                'image' => 'slide5.jpg'
            ],
                [
                'category' => 'Sandal',
                'name' => 'Black office Sandal',
                'price' => 15000,
                'description' => 'Nice, shining black sandal that can be worn on corporate wears to offices, meetings, etc.',
                'image' => 'sandal1.jpg'
            ],
            [
                'category' => 'Sandal',
                'name' => 'One Sided Leather Sandal',
                'price' => 12000,
                'description' => 'Nice multicolored sandal that can be used for school or office purpose.',
                'image' => 'sandal2.jpg'
            ],
            [
                'category' => 'Sandal',
                'name' => 'High Sole Sandal.',
                'price' => 20000,
                'description' => 'High soled sandal, mostly suitable for females ',
                'image' => 'sandal3.jpg'
            ],
            [
                'category' => 'Sandal',
                'name' => 'Appenda Sandal',
                'price' => 16000,
                'description' => 'White Appenda Sandal for casual wear.',
                'image' => 'sandal4.jpg'
            ],
            [
                'category' => 'Sandal',
                'name' => 'Brown Adult Sandal',
                'price' => 20000,
                'description' => 'Brown covered sandal, mostly for adults.',
                'image' => 'sandal5.jpg'
            ]
       ];

        foreach ($footwears as $item) {
            Footwears::create($item);
        }
    }
}
