<?php

use App\Models\Comment;
use Illuminate\Database\Seeder;

class LocalCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            factory(Comment::class, 5)->create([
                'post_id' => '1',
                'user_id' => '1',
            ]);
            factory(Comment::class, 5)->create([
                'post_id' => '1',
                'user_id' => '2',
            ]);

            factory(Comment::class, 5)->create([
                'post_id' => '2',
                'user_id' => '1',
            ]);
            factory(Comment::class, 5)->create([
                'post_id' => '2',
                'user_id' => '2',
            ]);
        } catch (Throwable $e) {
            $this->command->info('Local user exists');
        }
    }
}
