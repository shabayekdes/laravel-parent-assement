<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class FetchUsersTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_fetch_users_successful_with_all_providers(): void
    {
        // Call API
        $response = $this->get('/api/v1/users');
        $result = $response->json();

        // Assertion
        $response->assertStatus(200);
        $providers = collect($result)->pluck('provider')->unique()->values()->all();
        $this->assertSame($providers, ['DataProviderX', 'DataProviderY']);
    }
    /**
     * A basic feature test example.
     */
    public function test_fetch_users_successful_filter_provider(): void
    {
        // Call API
        $response = $this->get('/api/v1/users?provider=DataProviderX');
        $result = $response->json();

        // Assertion
        $response->assertStatus(200);
        $providers = collect($result)->pluck('provider')->unique()->all();
        $this->assertCount(1, $providers);
        $this->assertEquals('DataProviderX', $providers[0]);
    }
    /**
     * A basic feature test example.
     */
    public function test_fetch_users_successful_filter_status(): void
    {
        // Call API
        $response = $this->get('/api/v1/users?statusCode=authorised');
        $result = $response->json();

        // Assertion
        $response->assertStatus(200);
        $status = collect($result)->pluck('status_label')->unique()->all();
        $this->assertCount(1, $status);
        $this->assertEquals('authorised', $status[0]);
    }
    /**
     * A basic feature test example.
     */
    public function test_fetch_users_successful_filter_balance_min_max(): void
    {
        // Call API
        $response = $this->get('/api/v1/users?balanceMin=100&balanceMax=300');
        $result = $response->json();

        // Assertion
        $response->assertStatus(200);
        $balance = collect($result)->whereBetween('amount', [100, 300]);
        $this->assertCount(count($result), $balance);
    }
}
