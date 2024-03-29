@extends('layouts.profile')
@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>profile</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ProfileController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ProfileController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">name</label>
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
                                <th width="20%">name</th>
                                <th width="10%">gender</th>
                                <th width="20%">hobby</th>
                                <th width="20%">introduction</th>
                                <th width="40%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $profiles)
                         <tr>
                                    <th>{{ $profiles->id }}</th>
                                    <td>{{ str_limit($profiles->name, 100) }}</td>
                                    <td>{{ str_limit($profiles->gender,50) }}</td>
                                    <td>{{ str_limit($profiles->hobby,50) }}</td>
                                    <td>{{ str_limit($profiles->introduction, 250) }}</td>
                            <td>
                               <div>
                                   <a href="{{ action('Admin\ProfileController@edit',['id' => $profiles->id]) }}">編集</a>
                               </div>
                               <div>
                                   <a href="{{ action('Admin\ProfileController@delete', ['id' => $profiles->id]) }}">削除</a>
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
