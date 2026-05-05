<?php

// tests/Feature/PaymentTest.php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function 決済開始で_checkout_sessionが作成されstripeにリダイレクトされる()
    {
        // Stripe Session::create をモック
        Mockery::mock('alias:Stripe\Checkout\Session')
            ->shouldReceive('create')
            ->andReturn((object)[
                'id' => 'cs_test_123',
                'url' => 'https://stripe.test/checkout',
            ]);

        $user = User::factory()->create();
        $shop = Shop::factory()->create([
            'price' => 3000,
        ]);

        $response = $this->actingAs($user)
            ->post(route('payment.create', $shop->id));

        // Stripe の URL にリダイレクトされる
        $response->assertRedirect('https://stripe.test/checkout');
    }

    /** @test */
    public function 決済成功後に予約が作成される()
    {
        // Stripe Session のモック
        \Mockery::mock('alias:Stripe\Checkout\Session')
            ->shouldReceive('retrieve')
            ->andReturn((object)[
                'id' => 'cs_test_123',
                'payment_intent' => 'pi_test_999',
                'amount_total' => 3000,
            ]);

        $user = User::factory()->create();
        $shop = Shop::factory()->create([
            'price' => 3000,
        ]);

        $response = $this->actingAs($user)
            ->get(route('payment.success', [
                'session_id' => 'cs_test_123',
                'shop_id' => $shop->id,
            ]));

        $response->assertStatus(200);

        $this->assertDatabaseHas('reservations', [
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'payment_status' => 'paid',
            'payment_intent_id' => 'pi_test_999',
            'price_at_booking' => 3000,
        ]);
    }
    /** @test */
    public function 決済キャンセル画面が表示される()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('payment.cancel'));

        $response->assertStatus(200);
    }
}
