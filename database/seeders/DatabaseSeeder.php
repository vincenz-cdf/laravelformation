<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use App\Models\Video;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        for($i=1;$i<=10;$i++)
        {
            Course::create([
                'title' => 'A0'.$i,
                'description' => $this->faker->paragraphs(3, true),
                'user_id' => User::all()->random()->id
            ]);
        }

        for($i=1;$i<=20;$i++)
        {
            if($i <= 9)
            {
                $title = 'V0'.$i;
            }
            else
            {
                $title = 'V'.$i;
            }

            Video::create([
                'title' => $title,
                'description' => $this->faker->paragraphs(3, true),
                'video_url' => 'test.com' . rand(10,255),
                'course_id' => Course::all()->random()->id
            ]);
        }
    }
}
