<?php

use App\User;
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
            User::create([
                'email'   => 'adm@mail.com',
                'password'=> '111111',
                'name'    => 'adm'
            ]);
        } catch (Throwable $e) {
            $this->command->info('Local user exists');
        }
    }
}
