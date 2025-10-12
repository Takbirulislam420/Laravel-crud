@extends('layouts.app')
@section('contents')


  <div class="container">
    {{-- @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif --}}
    
    <h1 class="text-primary text-center mt-5">Show all of the user</h1>
  </div>

  <div class="container">
        <a  href="" class="btn btn-success">Add task</a>

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
            @if ($user_account->isNotEmpty())
                @php
                    $sn=1;
                @endphp
                @foreach ($user_account as $user)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>{{$user->kyc_status}}</td>
                    <td>
                        <a href="" class="btn btn-danger">Edit</a>
                        <form method="POST" action="" style="display: inline-block">
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure? you want to delete')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endif
            
        </tbody>
    </table>
  </div>
@endsection