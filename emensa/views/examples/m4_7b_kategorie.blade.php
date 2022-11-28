@extends("layout")

@section("content")
    <ul>
    @foreach($names as $name) 
        <li>{{ $name }}</li>
    @endforeach
    </ul>
@endsection
