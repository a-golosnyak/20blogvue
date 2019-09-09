<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class LocalPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            factory(Post::class, 10)->create();
        } catch (Throwable $e) {
            $this->command->info('Local user exists');
        }
    }
}
