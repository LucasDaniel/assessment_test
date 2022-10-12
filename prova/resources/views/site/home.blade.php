<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Prova</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>
<body>
  <p><a href="{{route('site.logout')}}">Logout</a></p>
  <p>{{ $msg }}</p>
  <form method="post" action="{{ route('site.bookstore.add') }}">
    @csrf
    <h1>Criar registro</h1>
    <p><input id="name" value="{{ old('name') }}" name="name" required="required" type="text" placeholder="Name" /></p>
    {{ $errors->has('name') ? $errors->first('name') : '' }}
    <p><input id="ISBN" value="{{ old('ISBN') }}" name="ISBN" required="required" type="number" placeholder="ISBN" /></p>
    {{ $errors->has('ISBN') ? $errors->first('ISBN') : '' }}
    <p><input id="value" value="{{ old('value') }}" name="value" required="required" type="number" step="0.01" placeholder="Value" /></p>
    {{ $errors->has('value') ? $errors->first('value') : '' }}
    <p><input type="submit" value="Cadastrar" /></p>
  </form>
  @isset($bookStoreList)
    @foreach($bookStoreList as $bookStore)
      Id: {{ $bookStore['id'] }}
      <br>
      Name: {{ $bookStore['name'] }}
      <br>
      ISBN: {{ $bookStore['ISBN'] }}
      <br>
      Value: {{ $bookStore['value'] }}
      <br>
      <p><a href="{{ route('site.bookstore.edit') }}">Editar</a></p>
      <br>
      <p><a href="{{ route('site.bookstore.delete') }}">Deletar</a></p>
      <br>
      -----------
      <br>
    @endforeach
  @endisset

</body>
</html>