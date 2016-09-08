@extends('layouts.app')

@section('content')
<div class="panel-body">
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                <th>Название</th>
                <th>Цена</th>
                <th>Описание</th>
                <th>Качество</th>
                <th>Действие</th>
                </thead>
                <tbody>
                <form action="/save/{{ $product->id}}" method="POST" class="form-horizontal">
                    <tr>
                        <td class="table-text">
                            <div>Название</div>
                            <input type="text" name="name" id="task-name" class="form-control" value="{{ $product->name }}">
                        </td>
                        <td class="table-text">
                            <div>Цена</div>
                            <input type="text" name="price" id="task-name" class="form-control" value="{{ $product->price }}">
                        </td>
                        <td class="table-text">
                            <div>Описание</div>
                            <input type="text" name="discription" id="task-name" class="form-control" value="{{ $product->discription }}">
                        </td>
                        <td class="table-text">
                            <div>Качество</div>
                            <select name="category">
                                <option>low</option>
                                <option>medium</option>
                                <option>hight</option>
                            </select>
                        </td>
            
                <td class="table-text">
                   
                        {{ csrf_field() }}
                        <button class="btn btn-success">Save</button>
                    </form>
                </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection