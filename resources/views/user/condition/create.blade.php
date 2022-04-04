@extends('layouts.user')
@section('title', '今日の体調記録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>体調記録</h2>
                <form action="{{ action('User\ConditionController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">今日の体調</label>
                        <div class="col-md-10">
                            <output name ="result">0</output>
                            <input type="range" class="form-control" name="condition" value="{{ old('condition') }}" min=0 max=10>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">朝食</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image1">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">摂取カロリー</label>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="Morning">{{ old('Morning') }}</textarea>
                        </div>
                        kcal
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">昼食</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image2">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">摂取カロリー</label>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="Lunch">{{ old('Lunch') }}</textarea>
                        </div>
                        kcal
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">夕食</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image3">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">摂取カロリー</label>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="Dinner">{{ old('Dinner') }}</textarea>
                        </div>
                        kcal
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">1日のカロリー</label>
                        <div class="col-md-2">
                            <td id="allkcal">0</td>
                        </div>
                        kcal
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection