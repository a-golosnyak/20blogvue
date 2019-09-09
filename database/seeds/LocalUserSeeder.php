<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class LocalUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            User::create([
                'email'   => 'andreygoldpua@gmail.com',
                'password'=> 'password',
                'name'    => 'and'
            ]);
        } catch (Throwable $e) {
            $this->command->info('Local user exists');
        }
    }
}
