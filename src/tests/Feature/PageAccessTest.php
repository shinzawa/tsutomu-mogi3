<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PageAccessTest extends TestCase
{
    /**
     * 各画面が正しく表示されるか（200 OK）のテスト
     */
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_pages_are_accessible_asUser()
    {
        // 1. ログインが必要な場合はユーザーを作成してログイン状態にする
        $user = User::find(1) ?? User::factory()->create();

        // 2. テストしたいURLを配列で回すと楽です
        $urls = [
            '/menu1',
            '/user/reservations/index',
            '/detail/1', // ここは存在するshop_idに合わせてください
            // 他にも必要なURLがあれば追加してください
        ];

        foreach ($urls as $url) {
            $response = $this->actingAs($user)->get($url);

            // 読み込み成功（200）を確認
            $response->assertStatus(200);

            // 念のため、その画面固有の文字が含まれているかチェックしてもOK
            // $response->assertSee('設定画面');
        }
    }

    public function test_pages_are_accessible_asOwner()
    {
        // 1. ログインが必要な場合はユーザーを作成してログイン状態にする
        $owner = User::find(4) ?? User::factory()->create(['rlole' => 'owner']);

        // 2. テストしたいURLを配列で回すと楽です
        $urls = [
            '/owner/dashboard',
            '/owner/reviews',
            // 他にも必要なURLがあれば追加してください
        ];

        foreach ($urls as $url) {
            $response = $this->actingAs($owner)->get($url);

            // 読み込み成功（200）を確認
            $response->assertStatus(200);

            // 念のため、その画面固有の文字が含まれているかチェックしてもOK
            // $response->assertSee('設定画面');
        }
    }

    public function test_pages_are_accessible_asAdmin()
    {
        // 1. ログインが必要な場合はユーザーを作成してログイン状態にする
        $admin = User::find(3) ?? User::factory()->create(['role' => 'admin']);

        // 2. テストしたいURLを配列で回すと楽です
        $urls = [
            '/admin/menu',
            '/admin/owners',
            '/admin/shops',
            // 他にも必要なURLがあれば追加してください
        ];

        foreach ($urls as $url) {
            $response = $this->actingAs($admin)->get($url);

            // 読み込み成功（200）を確認
            $response->assertStatus(200);

            // 念のため、その画面固有の文字が含まれているかチェックしてもOK
            // $response->assertSee('設定画面');
        }
    }
}
