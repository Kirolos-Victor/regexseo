<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FavoriteTest extends TestCase
{
    use RefreshDatabase;

    public function test_favorite_page()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get('/favorites');
        $response->assertStatus(200);
    }
}
