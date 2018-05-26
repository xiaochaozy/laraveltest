@extends('layouts.app')

@section('content')
<form method="post">    
	<div><input type="text" name="title" value=""></div>
    <div><textarea name="content"></textarea></div>
    <input type="hidden" name="_token" value="{{csrf_token() }}">
    <button type="submit"> 提交 </button>
</form>

@endsection
