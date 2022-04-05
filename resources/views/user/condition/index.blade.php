@extends('layouts.admin')
@section('title', '体調記録一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>記録一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('User\ConditionController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('User\ConditionController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">記録日検索</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">記録日</th>
                                <th width="10%">体調</th>
                                <th width="20%">総カロリー</th>
                                <th width="30%">コメント</th>
                                <th width="20%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $condition)
                                <tr>
                                    <th>{{ $condition->id }}</th>
                                    <td>{{ \Str::limit($condition->created_at, 100) }}</td>
                                    <td>{{ \Str::limit($condition->condition, 250) }}</td>
                                    <td>{{ \Str::limit($condition->allkcal, 250) }}</td>
                                    <td>{{ \Str::limit($condition->body, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('User\ConditionController@edit', ['id' => $condition->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('User\ConditionController@delete', ['id' => $condition->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection