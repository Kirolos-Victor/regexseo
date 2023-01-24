<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_upload_page()
    {
        $response = $this->get('/upload');
        $response->assertStatus(200);
    }

    public function test_upload()
    {
        $image = UploadedFile::fake()->image('avatar.jpg');
        $formData = [
            'title' => 'test title',
            'description' => 'test description',
            'image' => $image,
        ];
        $this->post('/upload', $formData);
        $this->assertDatabaseCount('images', 1);
    }
}
