@extends('layouts.main')

@section('content')
    <table class="table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Images</th>
            <th></th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->image_name != "")
                        <ul>
                        @foreach(explode(',', $user->image_name) as $item)
                            <li>
                                <a href="{{ url("images/user/{$user->id}/{$item}") }}" target="_blank">
                                    {{$item}}
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    @else
                        <i>No image</i>
                    @endif
                </td>
                <td><a href="{{ url("load/image/user/{$user->id}") }}" class="btn btn-success">Upload Image</a></td>
            </tr>
        @endforeach
    </table>
@endsection