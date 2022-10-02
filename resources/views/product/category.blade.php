@extends('layouts.app')
@section('title', $category['name'])
@section('content')
    <div class="container">
        <div class="starter-template" align="center">
            <h1>{{$category['name']}}</h1>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-auto">
                        <div class="panel-list">
                            <img class="product_image" src="https://politeka.net/crops/4e2e47/360x0/1/0/2018/01/22/dLtEgCRjEFgP6TRx4uFClI9iDAUxRSmQ.jpg">
                            <h3>
                                {{$product['name']}}
                            </h3>
                            <h5 class="product_price">{{ $product['price'] }} грн.</h5>
                            <a href="{{ route('product.card', [$product['code']]) }}">Детальніше</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
