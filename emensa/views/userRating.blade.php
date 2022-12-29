@extends('appLayout')

@section('content')
   <section id="benutzer-bewertungen">
    <h2>Ihre Bewertungen:</h2>
    <table>
        <tr>
          <th>Name</th>
          <th>Bemerkung</th>
          <th>Bewertung</th>
        </tr>
        @foreach ($ratings as $rating) 
          <tr>
            <td>{{ utf8_encode($rating['NAME']) }}</td>
            <td>{{ utf8_encode($rating['bemerkung']) }}</td>
            <td>{{ $rating['sterne'] }}</td>
            <td><a href="/bewertung?gerichtid={{ $gericht['id'] }}">Löschen</a></td>
          </tr>
        @endforeach
    </table>
  </section>
 
  <a href="/">Hauptseite</a>
@endsection
