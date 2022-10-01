@extends('layouts.app')
@section('title', 'Товари')
@section('content')
    <div class="container" align="center">
        <h1>Всі товари</h1>
        <div class="starter-template">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-auto">
                        <div class="panel-list">
                            <img class="product_image" src="https://politeka.net/crops/4e2e47/360x0/1/0/2018/01/22/dLtEgCRjEFgP6TRx4uFClI9iDAUxRSmQ.jpg">
                            <h3>
                                {{$product['name']}}
                            </h3>
                            <h5 class="product_price">{{ $product['price'] }} грн.</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
