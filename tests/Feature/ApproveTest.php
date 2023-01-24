<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApproveTest extends TestCase
{
    use RefreshDatabase;
    public function test_approve_page()
    {
        $user = factory(User::class)->create([
            'is_admin' => 1
        ]);
        $this->actingAs($user);
        $response = $this->get('/admin/approve');
        $response->assertStatus(200);
    }
}
