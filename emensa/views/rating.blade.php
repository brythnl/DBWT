@extends('appLayout')

@section('content')
  <h2>{{ utf8_encode($gericht['name']) }}</h2>

  <td><img class="gericht-img"
    @if ($gericht['bildname'] == NULL) 
      src="/img/gerichte/00_image_missing.jpg"
    @else
      src={{ "/img/gerichte/" . $gericht['bildname'] }}
    @endif
  ></td>

  <form action="/bewertung_speichern?gerichtid={{ $gerichtid }}" method="post">
    <label for="bemerkung">Bemerkungen:</label>
    <textarea id="bemerkung" name="bemerkung" minlength="5" maxlength="800"></textarea>
    <label for="sterne">Sterne:</label>
    <select id="sterne" name="sterne">
      <option value="sehr gut">sehr gut</option>
      <option value="gut">gut</option>
      <option value="schlecht">schlecht</option>
      <option value="sehr schlecht">sehr schlecht</option>
    </select>
    <input type="submit" value="Submit">
  </form>

  <section id="bewertungen">
    <h2>Bewertungen</h2>
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
            @if ($admin)
                <td><a href="/hervorheben?gerichtid={{ $rating['gericht_id'] }}">Hervorheben</a></td>
            @endif
          </tr>
        @endforeach
    </table>
  </section>
 
  <a href="/">Hauptseite</a>
@endsection
