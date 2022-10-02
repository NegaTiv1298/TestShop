@extends('layouts.app')
@section('title', 'Оформлення замовлення')
@section('content')
    <div class="container">
        <div class="starter-template">
            <form method="post" action="{{ route('order.create') }}">
                @csrf
                <br>
                <div class="form-group">
                    <label>Назва товару</label>
                    <input type="text" name="product_name" class="form-control" value="{{$product['name']}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Ім'я</label>
                    <input type="text" name="first_name" class="form-control" placeholder="Kristian" required>
                </div>
                <br>
                <div class="form-group">
                    <label>Прізвище</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Levkulych" required>
                </div>
                <br>
                <div class="form-group">
                    <label>Кількість</label>
                    <input type="number" name="qty" min="1" max="{{$product['qty']}}" class="form-control" required>
                </div>
                <input type="text" hidden name="product_code" value="{{$product['code']}}">

                <br>
                <button type="submit" class="btn btn-primary">Відправити</button>
            </form>
        </div>
@stop
