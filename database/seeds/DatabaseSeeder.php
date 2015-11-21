<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Profile;
use App\Project;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(ProjectsTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
    }
}

class ProjectsTableSeeder extends Seeder {
    public function run()
    {
        $faker = Faker\Factory::create();

        Project::truncate();

        foreach(range(1, 20) as $index) {
            Project::create([
                'title' => $faker->word,
                'image' => $faker->imageUrl(300, 200),
                'location' => $faker->country,
                'size_width' => $faker->numberBetween(5, 20),
                'size_length' => $faker->numberBetween(10, 30),
                'story' => $faker->paragraph(4),
            ]);
        }
    }
}

class ProfilesTableSeeder extends Seeder {
    public function run()
    {
        $faker = Faker\Factory::create();

        Profile::truncate();

        foreach(range(1,20) as $index) {
            Profile::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'job' => $faker->word,
                'motto' => $faker->sentence,
                'about' => $faker->paragraph(4),
                'favorite' => $faker->paragraph(4),
                'favorite_img' => $faker->imageUrl(300, 200),
                'sample_img1' => $faker->imageUrl(300, 200),
                'sample_img2' => $faker->imageUrl(300, 200),
                'sample_img3' => $faker->imageUrl(300, 200),
                'location' => $faker->country,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}