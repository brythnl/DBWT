@extends("layout")

@section("content")
    <table>    
    @forelse($names_prices as $row) 
        <tr>
            <td>{{ utf8_encode($row['name']) }}</td>
            <td>{{ $row['preis_intern'] }}</td>
        </tr>
    @empty
        <tr>Es sind keine Gerichte vorhanden</tr>
    @endforelse
    </table>
@endsection
