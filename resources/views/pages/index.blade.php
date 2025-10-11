@extends('layouts.app')
@section('contents')


  <div class="container">
    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    
    <h1 class="text-primary text-center mt-5">Show all of the user</h1>
  </div>

  <div class="container">
        <a  href="{{ route('add')}}" class="btn btn-success">Add task</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Password</th>
                <th>image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersData as $userData)
            <tr>
                <td>{{ $loop->iteration + $usersData->firstItem() - 1 }}</td>
                <td>{{$userData->email}}</td>
                <td>{{$userData->password}}</td>
                <td>
                    @if ($userData->otp)
                    <img style="width: 60px" src="{{asset('storage/'.$userData->otp)}}">
                    @else
                    N/A
                    @endif
                    
                </td>
                <td>
                    <a href="{{route('edit',$userData->id)}}" class="btn btn-danger">Edit</a>
                    <form method="POST" action="{{route('delete',$userData->id)}}" style="display: inline-block">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure? you want to delete')">Delete</button>

                    </form>
                </td>
            </tr>
                
            @endforeach
            
        </tbody>
    </table>
    {{ $usersData->links('pagination::bootstrap-5') }}

  </div>
  
@endsection