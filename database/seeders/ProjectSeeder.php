<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
                'name' => 'Mini E-Library Website',
                'overview' => 'Welcome to the Mini E-Library website! Discover a vast collection of books in PDF format, read author biographies, and download your favorite titles. Enjoy a user-friendly interface, personalized recommendations, and engage with a vibrant literary community. Immerse yourself in the world of literature and start your digital reading adventure today!'
            ],
            [
                'name' => 'Single Vendor Ecommerce Website',
                'overview' => 'Welcome to our Single Vendor E-Commerce website, where you can effortlessly purchase multiple items at once with simple payment methods. Our platform offers a seamless user interface, allowing you to navigate and explore a wide range of products across various categories. With our best-in-class admin dashboard, managing your purchases and tracking orders is a breeze. Experience the convenience of shopping and enjoy a smooth online shopping experience with our Single Vendor E-Commerce website.'
            ],
            [
                'name' => 'Portfolio Website',
                'overview' => "Welcome to my portfolio! I'm thrilled to share my professional journey and expertise with you. Feel free to contact me anytime for collaboration opportunities or to discuss projects. Additionally, explore my portfolio to discover useful technical blogs, where I share insights, tips, and industry trends. Let's connect and embark on an exciting journey together."
            ],
        ];

        foreach ($projects as $project) {
            $slug = Str::slug($project['name'], '-');

            Project::create([
                'title' => $project['name'],
                'project_link' => $slug . '.zawhlaingwin.com',
                'coder' => 'Mr. Zaw Hlaing Win',
                'overview' => $project['overview'],
                'image' => $slug . '.png',
            ]);
        }
    }
}
