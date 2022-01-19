@extends("layouts.app")


@section("content")

we are in entries
{{last(request()->segments()) }}



@endsection
