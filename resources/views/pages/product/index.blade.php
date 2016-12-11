@extends('layouts.main')

@section('content')
    <table class="table">
        <tr>
            <th>#</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Images</th>
            <td></td>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->brand}}</td>
                <td>{{$product->model}}</td>
                <td>
                    @if($product->image_name != "")
                        <ul>
                            @foreach(explode(',', $product->image_name) as $item)
                                <li>
                                    <a href="{{ url("images/product/{$product->id}/{$item}") }}" target="_blank">
                                        {{$item}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <i>No image</i>
                    @endif
                </td>
                <td><a href="{{ url("load/image/product/{$product->id}") }}" class="btn btn-danger">Upload Image</a></td>
            </tr>
        @endforeach
    </table>
@endsection