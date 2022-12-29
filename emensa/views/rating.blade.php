@extends('appLayout')

@section('content')
  <form>
    <label for="bemerkung">Bemerkungen:</label>
    <textarea id="bemerkung" name="bemerkung" maxlength="800"></textarea>
    <label for="sterne">Sterne:</label>
    <select id="sterne" name="sterne">
      <option value="sehr gut">sehr gut</option>
      <option value="gut">gut</option>
      <option value="schlecht">schlecht</option>
      <option value="sehr schlecht">sehr schlecht</option>
    </select>
  </form>
@endsection
