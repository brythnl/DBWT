@extends('appLayout')

@section('content')
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

  <a href="/">Hauptseite</a>
@endsection
