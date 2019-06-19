@extends('layouts.profile')
@section('title', 'ニュースの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>profile</h2>
                <form action="{{ action('Admin\ProfileController@update') }}"
method="post" enctype="multipart/form-data">
                   @if (count($errors) > 0)
                <ul>
                  @foreach($errors->all() as $e)
                      <li>{{ $e }}</li>
                  @endforeach
                </ul>
                   @endif
                   <div class="form-group row">
                       <label class="col-md-2" for="name">name</label>
                       <div class="col-md-10">
                           <input type="text" class="form-control"
                    name="name" value="{{ !empty($profiles_form->name) ? $profiles_form->name:"" }}">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-2" for="gender">gender</label>
                      <div class="col-md-10">
                          <input type="text" class="form-control"
                    name="gender" value="{{ !empty($profiles_form->gender) ? $profiles_form->gender:"" }}">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-2" for="hobby">hobby</label>
                      <div class="col-md-10">
                          <input type="text" class="form-control"
                          name="hobby" value="{{ !empty($profiles_form->hobby) ? $profiles_form->hobby:"" }}">
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2" for="introduction">introduction</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="introduction"
                       value="{{ !empty($profiles_form->introduction) ? $profiles_form->introduction:"" }}">
                    </div>
                  </div>
                  <div class="form-form_group row">
                      <div class="col-md-10">
                          <input type="hidden" name="id" value="{{ !empty($profiles_form->id) ? $profiles_form->id:"" }}">
                  {{ csrf_field() }}
                  <input type="submit" class="btn btn-primary" value="更新">
                      </div>
                  </div>
              </form>
              <div class="row mt-5">
                  <div class="col-md-4 mx-auto">
                      <h2>編集履歴</h2>
                      <ul class="list-group">
                         @if ($profiles_form->histories != NULL)
                            @foreach ($profiles_form->histories as $histories)
                         <li class="list-group-item">{{ $histories->edited_at }}</li>
                            @endforeach
                         @endif
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
