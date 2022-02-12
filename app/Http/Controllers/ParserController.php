<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\News;

class ParserController extends Controller
{
    public function index(){
        
        $xml = XmlParser::load('https://3dnews.ru/news/rss/');
        
# Парсим данные        
$data = $xml->parse([
    'channel_title' => ['uses' => 'channel.title'],
    'channel_description' => ['uses' => 'channel.description'],
    'items' => ['uses' => 'channel.item[title,description]'],
]);

# Записываем полученную информацию в БД
$news = new News();

$news->news = $data['items']['1']['description'];
$news->categories = $data['channel_title'];
$news->status = "OK";
$news->sources = "3dnews.ru";
$news->category_id = "1";

$news->save();

echo "Запись в БД выполнена";
        
    }
}
