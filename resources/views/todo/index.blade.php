<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>ToDoアプリ</title>
</head>
<body>
  <main>
    <h2>Todo List</h2>
    @error('content')
    <ul>
      <li>{{$message}}</li>
    </ul>
    @enderror
    <form class="form__header" action="/todo" method="POST">
      @csrf
      <input type="text" class="form__header__content" name="contents">
      <input type="submit" class="form__header__create submit__button" name="create" value="追加">
    </form>


    <table>
      <tr>
        <th class="content__title">作成日</th>
        <th class="content__title">タスク名</th>
        <th class="button__title">更新</th>
        <th class="button__title">削除</th>
      </tr>


      @foreach($items as $item)
      <tr>
        <form action="/todo" method="POST">
          @csrf
          <input type="text" class="hide_id" name="id" value={{$item->id}}>
          <td class="table__time">{{$item->updated_at}}</td>
          <td><input class="main__form__content" type="text" name="content" value={{$item->content}}></td>
          <td><input class="main__form__update submit__button" type="submit" value="更新" name="update"></td>
          <td><input class="main__form__delete submit__button" type="submit" value="削除" name="delete"></td>
        </form>
      </tr>
      @endforeach

    </table>

  </main>

</body>
</html>