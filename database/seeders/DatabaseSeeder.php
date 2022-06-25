<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use App\Models\Video;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Hash;
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

        User::create([
            'name' => 'alphatester',
            'email' => 'a@m.fr',
            'email_verified_at' => now(),
            'password' => Hash::make('12'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'betatesteur',
            'email' => 'b@m.fr',
            'email_verified_at' => now(),
            'password' => Hash::make('12'),
            'remember_token' => Str::random(10),
        ]);

        Course::create([
            'title' => 'Guide Minecraft',
            'description' => 'Vous voulez en savoir plus sur Minecraft ?
            En vous partageant mon aventure, je vous explique toutes les bases pour survivre et prospérer dans Minecraft : artisanat, exploration, construction, mods et multijoueur...',
            'user_id' => User::all()->random()->id
        ]);

        $video_urls = [
            'https://www.youtube.com/embed/sh6mkiL6QzE',
            'https://www.youtube.com/embed/MC-ciF0uVrU'
        ];

        for($i=1;$i<=2;$i++)
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
                'video_url' => $video_urls[$i-1],
                'course_id' => Course::all()->first()->id
            ]);
        }
    }
}
