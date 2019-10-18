<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pl_PL');
        $numberOfUsers = 10;
        $password = bcrypt('pass');

        for ($i = 1; $i <= $numberOfUsers; $i++) {

            if ($i == 1) {
                DB::table('users')->insert([
                    'name' => 'Mike',
                    'sex' => 'm',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('admin'),
                ]);

            } else {

                $sex = $faker->randomElement(['m', 'f']);

                switch ($sex) {
                    case 'm':
                        $name = $faker->firstNameMale . ' ' . $faker->lastName;
                        $sex = 'm';
                        break;
                    case 'f':
                        $name = $faker->firstNameFemale . ' ' . $faker->lastName;
                        $sex = 'f';
                        break;
                }

                DB::table('users')->insert([
                    'name' => $name,
                    'sex' => $sex,
                    'email' => str_slug($name, '_') . '@' . $faker->freeEmailDomain,
                    'password' => $password,
                ]);
            }
        }

    }
}
