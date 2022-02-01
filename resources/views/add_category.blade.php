
@extends('main')

@section('title')
Категории
@endsection

@section('content')
     <p>Страница добавления категорий</p>
     
     <!-- Выводим все категории из таблицы categories -->
     <!-- При нажатии на изменить, редактируем категорию -->
     @foreach($category as $info)
     <form action="{{route('update_category_post')}}" method="post">
         @csrf
         
                <div class="form-group">
                
                    <input type="hidden" name="id" value="{{$info->id}}">
                    
               <label for="subject">Название категории</label>
               <input type="text" name="name" value="{{$info->name}}" id="subject" class="form-control">

           <button type="submit" name="action" values="update" >Изменить</button>
           
           
       </form>
     
     <!-- При нажатии на удалить, удаляем категорию -->
     <form action="{{route('delete_category_post')}}" method="post">
         @csrf
         <input type="hidden" name="id" value="{{$info->id}}">
          <button type="submit" name="action" values="update" >Удалить</button>
     </form>
@endforeach

<!-- При нажатии на добавить, добавляем новость -->
<form action="{{route('add_category_post')}}" method="post">
             @csrf
         
               <div class="form-group">
 
               <label for="subject">Название категории</label>
               <input type="text" name="name" placeholder="Категория" id="subject" class="form-control">
 
           <button type="submit" name="action" class="btn btn-success">Добавить</button>
</form>
@endsection
