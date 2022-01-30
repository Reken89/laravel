
@extends('main')

@section('title')
Новости
@endsection

@section('content')
 <body>
     <p>Страница категорий новостей</p>
     <p>Информация пролученная из БД</p>
     <!-- Выводим через цикл значения из массива -->
     @foreach($news as $info)
     <table>
         <tr><td>{{$info->news}}</td>
             <td>{{$info->categories}}</td>
             <td>{{$info->status}}</td>
             <td>{{$info->sources}}</td></tr>
     </table>
     @endforeach
     
     
     <!-- Часть прошлого домашнего задания -->
  <p><a href="{{ route('news', 'sport')}}">Спорт</a></p>
  <p><a href="{{ route('news', 'science')}}">Наука</a></p>
  <p><a href="{{ route('news', 'technics')}}">Техника</a></p>
 </body>
@endsection
