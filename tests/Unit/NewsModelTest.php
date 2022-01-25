<?php

namespace Tests\Unit;

use App\Models\NewsModel;
use PHPUnit\Framework\TestCase;


class NewsModelTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
        
        # Новый оъект для модели
        $model = new NewsModel();
        
        # Проверяем что возвращается массив, и что он не пустой
        $data = $model->GetByID(10);
        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
        
        # Проверяем что в массиве есть новости с категорией ID равной 10
        foreach($data as $item){
            $this->assertEquals(10, $item['id_category']);
        }
    }
}
