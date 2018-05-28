@extends('layouts.app')

@section('content')
<form method="post">    
	<div><input type="text" name="url" value=""></div>
    <input type="hidden" name="_token" value="{{csrf_token() }}">
    <button type="submit"> 提交 </button>
</form>

@endsection
