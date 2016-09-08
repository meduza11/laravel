@extends('layouts.app')

@section('content')

<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
    <form action="/product" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <!-- Имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Задача</label>
            <div class="col-sm-2">
                <input type="text" name="name" id="task-name" class="form-control" placeholder="название товара">
            </div>
            <div class="col-sm-2">
                <input type="text" name="price" id="task-name" class="form-control" placeholder="цена">
            </div>
            <div class="col-sm-2">
                <input type="text" name="discription" id="task-name" class="form-control" placeholder="описание">
            </div>
            <div class="col-sm-2">
                <select name="category" class="form-control">
                    <option>low</option>
                    <option>medium</option>
                    <option>hight</option>
                </select>
            </div>
        </div>
        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Добавить товар
                </button>
            </div>
        </div>
    </form>
</div>
<!-- Текущие задачи -->
@if (count($products) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Товары
    </div>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <!-- Заголовок таблицы -->
            <thead>
            <th>Название</th>
            <th>Цена</th>
            <th>Описание</th>
            <th>Качество</th>
            <th>Действие</th>
            </thead>
            <!-- Тело таблицы -->
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <!-- Имя задачи -->
                    <td class="table-text">
                        <div>{{ $product->name }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $product->price }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $product->discription }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $product->category }}</div>
                    </td>
                    <!-- Кнопка Удалить -->
                    <td>
                        <form action="/product/{{ $product->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger">Удалить</button>
                        </form>
                        <form action="/edit/{{ $product->id }}"  method="POST">
                            {{ csrf_field() }}
                            <button class="btn btn-primary">Редактировать</button>
                        </form>
                    </td>  
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection