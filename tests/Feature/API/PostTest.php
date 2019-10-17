<?php

namespace Tests\Feature\API;

use App\Models\Post;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Configure test suite
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function guest_can_watch_all_posts()
    {
        $this->assertGuest('api');

        factory(Post::class, 3)->create([
            'user_id' => factory(User::class)->create()->id,
        ]);

        $this->getJson(route('api.post.index'))
            ->assertStatus(200)
            ->assertJsonCount(3);

    }

    /** @test */
    public function guest_can_now_watch_one_post()
    {
        $this->assertGuest();

        $post = factory(Post::class)->create([
            'user_id' => factory(User::class)->create()->id,
        ]);

        $this->getJson(route('api.post.show', $post))
            ->assertStatus(401);

    }

    /** @test */
    public function user_can_watch_post()
    {
        $this->signIn();

        $post = factory(Post::class)->create([
            'user_id' => factory(User::class)->create()->id,
        ]);

        $this->getJson(route('api.post.show', $post))
            ->assertStatus(200);
    }
}
