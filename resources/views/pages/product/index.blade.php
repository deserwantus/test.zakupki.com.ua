@extends('layouts.main')

@section('content')
    <table class="table">
        <tr>
            <th>#</th>
            <th>Brand</th>
            <th>Model</th>
            <td></td>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->brand}}</td>
                <td>{{$product->model}}</td>
                <td><a href="" class="btn btn-danger">Upload Image</a></td>
            </tr>
        @endforeach
    </table>
@endsection