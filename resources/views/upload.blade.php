@extends('layouts.app')

@section('content')
<form method="post" enctype="multipart/form-data" >    
    <input type="file" name="picture">
    <input type="hidden" name="_token" value="{{csrf_token() }}">
    <button type="submit"> 提交 </button>
</form>

@endsection
