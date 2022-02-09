<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    
    # Тест для формы Добавления новостей
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/laravel/public/news/add')
                    ->assertSee('Страница добавления новостей')
                    ->type('categories','')
                    ->press('Добавить')
                    ->assertSee('Поле categories обязательно для заполнения')
                    ->type('message','')
                    ->press('Добавить')
                    ->assertSee('Поле message обязательно для заполнения');

        });
    }
}
