<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Prova</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>
<body>
    <form method="post" action="{{ route('site.login') }}">
        @csrf
        <h1>Faça o Login</h1>
        <p><input id="login" value="{{ old('login') }}" name="login" required="required" type="email" placeholder="Usuario" /></p>
        {{ $errors->has('login') ? $errors->first('login') : '' }}
        <p><input id="senha" value="{{ old('senha') }}" name="senha" required="required" type="password" placeholder="****"/></p>
        {{ $errors->has('senha') ? $errors->first('senha') : '' }}

        <p><input type="submit" value="Logar" /></p>
    </form>
    {{ isset($erro) && $erro != '' ? $erro : ''}}
</body>
</html>