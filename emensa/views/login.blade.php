@extends('appLayout')

@section('content')
    <p>{{ $msg }}</p>
    <form method="post" action="/anmeldung_verifizieren">
        <label for="username">Enter a username:</label>
        <input type="text" id="username" name="username">
        <label for="password">Enter a password:</label>
        <input type="password" id="password" name="password">
        <input type="submit" value="Anmeldung">
    </form>
@endsection
