<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
class ReservationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_reservation_validation_date()
    {
        $this->actingAs(User::factory()->create(['email_verified_at' => now()]));

        $response = $this->post('/reservation', [
            'shop_id' => 1,
            'date' => "",
            'time' => "19:00",
            'number_of_people' => 2,
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('date');
        $errors = session('errors');
        $this->assertEquals('年月を入力してください', $errors->first('date'));
    }
}

