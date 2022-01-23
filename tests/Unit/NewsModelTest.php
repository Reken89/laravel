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
        
        $model = new NewsModel();
        
        
        $data = $model->GetByID(10);
        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
        
        foreach($data as $item){
            $this->assertEquals(10, $item['id_category']);
        }
    }
}
