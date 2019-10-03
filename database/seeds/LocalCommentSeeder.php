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
            factory(Comment::class, 10)->create([
                'post_id' => '1',
                'user_id' => '1',
            ]);
        } catch (Throwable $e) {
            $this->command->info('Local user exists');
        }
    }
}
