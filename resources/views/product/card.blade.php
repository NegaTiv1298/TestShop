@extends('layouts.app')
@section('title', 'Сторінка товара')
@section('content')
    <div class="container">
        <div class="starter-template" align="center">
            <h1>{{ $product['name'] }}</h1>
            <img class="product_image" src="https://politeka.net/crops/4e2e47/360x0/1/0/2018/01/22/dLtEgCRjEFgP6TRx4uFClI9iDAUxRSmQ.jpg">
            <table id="productCardBlock">
                <tbody>
                <tr>
                    <td>Назва товару: </td>
                    <td>{{ $product['name'] }}</td>
                </tr>
                <tr>
                    <td>Ціна за одиницю: </td>
                    <td>{{ $product['price'] }} грн.</td>
                </tr>
                <tr>
                    <td>Кількість в наявності: </td>
                    <td>{{ $product['qty'] }} шт.</td>
                </tr>
                </tbody>
            </table>
            <a href="{{ route('product.buy', [$product['code']]) }}">Купити</a>
            <br>
            <a href="{{ route('product.edit', [$product['code']]) }}">Редагувати</a>
        </div>
    </div>
@stop
