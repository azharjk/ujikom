<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class JourneyControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function test_urutkan_should_redirect_to_pagecatatan_perjalanan()
    {
        $response = $this->post(route('journey.urutkan'));

        $response->assertRedirect(route('page.catatan-perjalanan'));
    }

    public function tambahkanResponse()
    {
        return $this->post(route('journey.tambahkan'), [
            'tanggal' => '10-2-2022',
            'waktu' => '08.00',
            'lokasi' => 'Finland',
            'suhu_tubuh' => '38.0'
        ]);
    }

    public function test_tambahkan_should_redirect_to_pagecatatan_perjalanan()
    {
        $response = $this->tambahkanResponse();

        $response->assertRedirect(route('page.catatan-perjalanan'));
    }

    public function test_tambahkan_should_persist_journey_to_database()
    {
        $this->tambahkanResponse();

        $this->assertDatabaseHas('journeys', [
            'tanggal' => '10-2-2022',
            'waktu' => '08.00',
            'lokasi' => 'Finland',
            'suhu_tubuh' => '38.0'
        ]);
    }
}
