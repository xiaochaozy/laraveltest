@extends('layouts.app')

@section('content')

@foreach ($student as $r)

    <p>This is user {{ $r->id }}</p>
@endforeach

@endsection
