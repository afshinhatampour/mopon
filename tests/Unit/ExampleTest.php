<?php

namespace Tests\Unit;

use App\Coupon;
use Egulias\EmailValidator\Exception\CommaInDomain;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /** @test */
    public function userCanSeeCoupons()
    {
        $response = $this->withHeaders([
            'X-Header' => 'value'
        ])->json('GET', '/api/coupon');
        $response->assertStatus(200)->assertJson([
            'data' => true
        ]);
    }

    /** @test */
    public function userCanSeeCoupon()
    {
        $response = $this->withHeaders([
            'X-Header' => 'value'
        ])->json('GET', '/api/coupon/5');
        $response->assertStatus(200)->assertJson([
            'data' => true
        ]);
    }

    /** @test */
    public function adminCanDeleteCoupons()
    {
        $response = $this->withHeaders([
            'X-Header' => 'value'
        ])->json('DELETE', '/api/coupon/{id}');
        $response->assertStatus(200)->assertJson([
            'message' => 'coupon deleted',
            'message' => 'coupon not found'
        ]);
    }

    /** @test */
    public function adminCanEditcoupon()
    {
        $response = $this->withHeaders([
            'X-Header' => 'value'
        ])->json('PATCH', '/api/coupon/{id}');
        $response->assertStatus(200)->assertJson([
            'message' => true
        ]);
    }
}
