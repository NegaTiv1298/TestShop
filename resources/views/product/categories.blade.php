@extends('layouts.app')
@section('title', 'Категорії товарів')
@section('content')
    <div class="container" >
        <div class="starter-template" align="center">
            @foreach($categories as $category)
                <div class="panel">
                    <a href="{{ route('category.show', ['code' => $category['code']] ) }}">
                        <h2>{{$category['name']}}</h2>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@stop
