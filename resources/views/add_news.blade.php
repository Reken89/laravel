
@extends('main')

@section('title')
Новости
@endsection

@section('content')
     <p>Страница добавления новостей</p>
     
     <!-- Выводим ошибки валидации -->
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
     <!-- Выводим все новости из таблицы news -->
     <!-- При нажатии на изменить, редактируем новость -->
     @foreach($news as $info)
     <form action="{{route('update_news_post')}}" method="post">
         @csrf
         
                <div class="form-group">
                
                    <input type="hidden" name="id" value="{{$info->id}}">
                    
               <label for="subject">Категория</label>
               <input type="text" name="categories" value="{{$info->categories}}" id="subject" class="form-control">
 
               <label for="message">Содержание</label>
               <textarea name="message" id="message" class="form-control">{{$info->news}}</textarea>

           <button type="submit" name="action" values="update" >Изменить</button>
           
           
       </form>
     
     <!-- При нажатии на удалить, удаляем новость -->
     <form action="{{route('delete_news_post')}}" method="post">
         @csrf
         <input type="hidden" name="id" value="{{$info->id}}">
          <button type="submit" name="action" values="update" >Удалить</button>
     </form>
@endforeach

<!-- При нажатии на добавить, добавляем новость -->
<form action="{{route('add_news_post')}}" method="post">
             @csrf
         
               <div class="form-group">
 
               <label for="subject">Категория</label>
               <input type="text" name="categories" placeholder="Категория" id="subject" class="form-control">
 
               <label for="message">Содержание</label>
               <textarea name="message" id="message" placeholder="Категория" class="form-control"></textarea>
               
               <label for="subject">Номер категории новостей</label>
               <input type="text" name="category_id" placeholder="Введите номер категории" id="subject" class="form-control">

           <input class="btn btn-success" type="submit" value="Добавить">
</form>
@endsection
