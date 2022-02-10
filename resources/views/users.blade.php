
@extends('main')

@section('title')
Пользователи
@endsection

@section('content')
     <p>Страница редактирования пользователей</p>
     
     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
     <!-- Выводим всех пользователей -->
     <!-- При нажатии на изменить, редактируем пользователя -->
     
     
    @if ($_SESSION['role'] == 'admin')
     
     @foreach($users as $info)
     <form action="{{route('update_users')}}" method="post">
         @csrf
         
                <div class="form-group">
                
                    <input type="hidden" name="id" value="{{$info->id}}">
                    
               <label for="subject">Имя пользователя</label>
               <input type="text" name="name" value="{{$info->name}}" id="subject" class="form-control">
               
               <label for="subject">Email</label>
               <input type="text" name="email" value="{{$info->email}}" id="subject" class="form-control">
               
                <label>Новый пароль</label>
                    <input class="form-control" type="password" name="password">
                    
               <label>Текущий пароль</label>
                    <input class="form-control" type="password" name="current_password">

           <button type="submit" name="action" values="update" >Изменить</button>
           
           
       </form>
     
     <!-- При нажатии на удалить, удаляем категорию -->
     <form action="{{route('delete_users')}}" method="post">
         @csrf
         <input type="hidden" name="id" value="{{$info->id}}">
          <button type="submit" name="action" values="update" >Удалить</button>
     </form>
@endforeach

@endif

@endsection
