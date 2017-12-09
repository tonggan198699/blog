<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{
   use RefreshDatabase;

   /** @test */
    public function a_user_can_browse_threads()
    {
        $response = $this->get('/posts');
        $response->assertStatus(200);
    }

}
