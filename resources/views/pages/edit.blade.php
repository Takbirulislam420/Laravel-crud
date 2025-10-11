@extends('layouts.app')
@section('contents')
  <div class="container">
    
    <h1 class="text-primary text-center mt-5">Edit user page</h1>
  </div>
  <div class="container">
    <form method="POST" action="{{ route('update',$data->id)}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="{{$data->email}}">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="text" name="password" class="form-control" value="{{$data->password}}">
        </div>
        <div>
            <label for="photo">Image</label>
            <input type="file" name="image" class="form-control">
            @if ($data->otp)
            <img src="{{asset('storage/'.$data->otp)}}" alt="" style="width: 100px">
                
            @else
                
            @endif
        </div>
        <button class="btn btn-primary">submit</button>
        <a class="btn btn-primary" href="{{route('home')}}">Back</a>
    </form>

  </div>

    
@endsection