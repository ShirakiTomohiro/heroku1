{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- profile.blade.phpの@yieldに('title')'ニュースの新規作成'を埋め込む --}}
@section('title','ニュースの新規作成')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
  <div class="container">
     <div class="row">
         <div class="col-md-8 mx-auto">
            <h2>profile</h2>
            <form action="{{action ('Admin\ProfileController@create') }}"
            method="post"  enctype="multipart/form-data">

              @if (count($errors) > 0)
                 <ul>
              @endif
              <div class="form-group row">

                  <label class="col-md-2" for="name">name</label>
                  <div class="col-md-10">
                      <input type="text" class="form-control"
                      name="name" value="{{ old('name') }}">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-2" for="gender">gender</label>
                  <div class="col-md-10">
                      <input type="text" class="form-control"
                      name="gender" value="{{ old('gender') }}">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-2" for="hobby">hobby</label>
                  <div class="col-md-10">
                      <input type="text" class="form-control-file" name="hobby">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-2" for="introduction">introduction</label>
                  <div class="col-md-10">
                      <textarea class="form-control" name="introduction"
                  rows="20">{{ old('introduction') }}</textarea>
                  </div>
              </div>
              {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="更新">
            </form>
          </div>
      </div>
   </div>
@endsection
