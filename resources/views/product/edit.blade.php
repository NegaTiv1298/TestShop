@extends('layouts.app')
@section('title', 'Редагування')
@section('content')
    <div class="container">
        <div class="starter-template" align="center">
            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif

            @if(session('error'))

                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>

            @endif
            <h1>{{ $product['name'] }}</h1>
            <img class="product_image" src="https://politeka.net/crops/4e2e47/360x0/1/0/2018/01/22/dLtEgCRjEFgP6TRx4uFClI9iDAUxRSmQ.jpg">
            <form method="post" action="{{ route('product.edit.post') }}">
                @csrf
                <br>
                <div class="form-group">
                    <label>Назва товару</label>
                    <input type="text" name="product_name" class="form-control" value="{{$product['name']}}" required>
                </div>
                <br>
                <div class="form-group">
                    <label>Ціна за одиницю:</label>
                    <input type="text" name="price" class="form-control" value="{{$product['price']}}" required>
                </div>
                <br>
                <div class="form-group">
                    <label>Кількість в наявності:</label>
                    <input type="text" name="qty" class="form-control" value="{{$product['qty']}}" required>
                </div>
                <input type="text" hidden name="product_code" value="{{$product['code']}}">

                <br>
                <button type="submit" class="btn btn-primary">Редагувати</button>
            </form>
        </div>
    </div>
@stop
