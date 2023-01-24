<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{

    public function test_home_page()
    {
        $response = $this->get('/home');
        $response->assertStatus(200);
    }

}
