@extends("layout")

@section("cssextra")
    <style>
        li:nth-child(even) {
            font-weight: bold;
        }
    </style>
@endsection

@section("content")
    <ul>
    @foreach($names as $name) 
        <li>{{ $name['name'] }}</li>
    @endforeach
    </ul>
@endsection
