<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Entities\User::query()->create([
            'name' => 'Andrew',
            'email' => 'andrew@mail.com',
            'password' => 'password',
        ]);

        $this->command->info('User Andrew has been created!');
    }
}
