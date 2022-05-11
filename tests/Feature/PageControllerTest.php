<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Journey;
use Carbon\Carbon;

class PageControllerTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function test_home_should_have_status_code_200()
    {
        $response = $this->get(route('page.home'));

        $response->assertStatus(200);
    }

    public function test_catatanPerjalanan_should_have_status_code_200()
    {
        $response = $this->get(route('page.catatan-perjalanan'));

        $response->assertStatus(200);
    }

    public function test_catatanPerjalanan_should_have_empty_journeys()
    {
        $response = $this->get(route('page.catatan-perjalanan'));

        $journeys = $response->viewData('journeys');

        $this->assertTrue($journeys->isEmpty());
    }

    public function test_catatanPerjalanan_should_have_presented_journeys()
    {
        $this->user->journeys()->save(Journey::factory()->make());

        $response = $this->get(route('page.catatan-perjalanan'));

        $journeys = $response->viewData('journeys');

        $this->assertTrue($journeys->isNotEmpty());
    }

    public function test_catatanPerjalanan_should_have_tanggal()
    {
        $response = $this->get(route('page.catatan-perjalanan', ['tanggal' => '1']));

        $response->assertViewHas('tanggal', '1');
    }

    public function test_catatanPerjalanan_should_have_filtered_journeys_by_tanggal()
    {
        // 2-2-2020
        $this->user->journeys()->saveMany(Journey::factory([
            'tanggal' => Carbon::create(2020, 2, 2)->toDateString()
        ])->count(3)->make());

        // Random
        $this->user->journeys()->saveMany(Journey::factory()->count(2)->make());

        $response = $this->get(route('page.catatan-perjalanan', ['tanggal' => '2020-02-02']));

        $journeys = $response->viewData('journeys');

        $this->assertEquals(3, $journeys->count());
    }

    public function test_catatanPerjalanan_should_have_sorted_journeys_by_ascending()
    {
        $this->user->journeys()->saveMany([
            Journey::factory([
                'tanggal' => Carbon::create(2020, 2, 2)->toDateString(),
                'waktu' => Carbon::createFromTime(1, 0, 0)->toTimeString(),
                'lokasi' => 'Bandung',
                'suhu_tubuh' => 30
            ])->make(),
            Journey::factory([
                'tanggal' => Carbon::create(2020, 2, 2)->toDateString(),
                'waktu' => Carbon::createFromTime(1, 0, 0)->toTimeString(),
                'lokasi' => 'Bandung',
                'suhu_tubuh' => 31
            ])->make(),
        ]);

        $response = $this->get(route('page.catatan-perjalanan', ['mode' => 'ascending', 'field' => 'suhu_tubuh']));

        $journeys = $response->viewData('journeys');

        $this->assertEquals('30.0', $journeys->first()->suhu_tubuh);
    }

    public function test_catatanPerjalanan_should_have_sorted_journeys_by_descending()
    {
         $this->user->journeys()->saveMany([
            Journey::factory([
                'tanggal' => Carbon::create(2020, 2, 2)->toDateString(),
                'waktu' => Carbon::createFromTime(1, 0, 0)->toTimeString(),
                'lokasi' => 'Bandung',
                'suhu_tubuh' => 30
            ])->make(),
            Journey::factory([
                'tanggal' => Carbon::create(2020, 2, 2)->toDateString(),
                'waktu' => Carbon::createFromTime(1, 0, 0)->toTimeString(),
                'lokasi' => 'Bandung',
                'suhu_tubuh' => 31
            ])->make(),
        ]);

        $response = $this->get(route('page.catatan-perjalanan', ['mode' => 'descending', 'field' => 'suhu_tubuh']));

        $journeys = $response->viewData('journeys');

        $this->assertEquals('31.0', $journeys->first()->suhu_tubuh);
    }

    public function test_tambahCatatanPerjalanan_should_have_status_code_200()
    {
        $response = $this->get(route('page.tambah-catatan-perjalanan'));

        $response->assertStatus(200);
    }
}
