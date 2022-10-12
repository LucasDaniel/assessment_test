<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Prova</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>
<body>
  <p><a href="{{route('site.logout')}}">Logout</a></p>
  <form method="post" action="{{ route('site.bookstore.add') }}">
        @csrf
        <h1>Criar registro</h1>
        <p><input id="name" value="{{ old('name') }}" name="name" required="required" type="text" placeholder="Name" /></p>
        {{ $errors->has('name') ? $errors->first('name') : '' }}
        <p><input id="isbn" value="{{ old('isbn') }}" name="isbn" required="required" type="number" placeholder="ISBN" /></p>
        {{ $errors->has('isbn') ? $errors->first('isbn') : '' }}
        <p><input id="value" value="{{ old('value') }}" name="value" required="required" type="number" step="0.01" placeholder="Value" /></p>
        {{ $errors->has('value') ? $errors->first('value') : '' }}
        <p><input type="submit" value="Cadastrar" /></p>
    </form>
</body>
</html>