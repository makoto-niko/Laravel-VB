<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;

class PostRequest extends TestCase
{
    protected $post;

    /**
     * A basic unit test example.
     */
    public function test_index(): void
    {
        // テスト用にユーザーを作成
        $post = Post::create([

            'title' => 'aaaaa',
            'author_id' => 'テスト太郎',
            'content' => 'テストです'
        ])->create();
        //$user = User::factory()->create();
        // ログイン
        //$this->actingAs($user);

        // テスト対象のURLにアクセスさせる
        $response = $this->get(route('create'));

        // 　テスト検証
        $response
            ->assertOk();                     // レスポンスに問題がないか
    }

    public function test_store(): void
    {
        $data = [
            'title' => 'aaaaa',
            'author_id' => 'テスト太郎',
            'content' => 'テストです'
        ];

        // テスト対象のURLにアクセスさせる
        $response = $this->create(route("show.create"), $data);

        // 　テスト検証

        // 登録後のリダイレクト先が正しいか
        $response->assertRedirect(route("index"));

        // 登録データがDBに保存されているか
        $this->assertDatabaseHas(Post::class, $data);
    }
}
