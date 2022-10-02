@extends('layouts.app')
@section('title', 'Замовлення')
@section('content')
    <div class="container" align="center">
        <div class="starter-template">
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
            <div class="row">
                <table>
                    <thead>
                    <th>Ім'я замовника</th>
                    <th>Назва товару</th>
                    <th>Кількість</th>
                    <th>Загальна ціна</th>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order['customer_name']}}</td>
                            <td>{{$order['product_name']}}</td>
                            <td>{{$order['qty']}}</td>
                            <td>{{$order['price']}} грн.</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop
