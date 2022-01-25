<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsModelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/news/add');

        # Проверяем шаблон, на содержание нужных слов или строк
        $response->assertStatus(200)
                ->assertSeeText('Страница добавления');
    }
}
