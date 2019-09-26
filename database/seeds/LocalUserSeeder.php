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
                'password'=> '111111',
                'name'    => 'and'
            ]);
            User::create([
                'email'   => 'adm@mail.ru',
                'password'=> '111111',
                'name'    => 'adm'
            ]);
            User::create([
                'email'   => 'aaa@mail.ru',
                'password'=> '111111',
                'name'    => 'aaa'
            ]);

        } catch (Throwable $e) {
            $this->command->info('Local user exists');
        }
    }
}
