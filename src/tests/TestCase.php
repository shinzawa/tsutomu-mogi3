<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    // tests/TestCase.php

    protected function mockStripeCheckout()
    {
        $mock = \Mockery::mock('alias:Stripe\Checkout\Session');

        $mock->shouldReceive('create')
            ->andReturn((object)[
                'id' => 'cs_test_123',
                'url' => 'https://stripe.test/checkout',
            ]);

        return $mock;
    }
}


