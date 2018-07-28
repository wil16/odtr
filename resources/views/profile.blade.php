@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">My Profile</div>
                <div class="card-body">
                  <div class="row justify-content-center">
                      <div class="col-md-3">
                        <img src={{asset('images/profile_images/'.$user->profile_img)}} style="width:150px; height:150px; float:left; border-radius: 50%; margin-right:25px;">
                        <form enctype="multipart/form-data" action="/odtr/public/profile" method="POST">
                        <label>Update Profile Image</label>
                        <input type="file" name="profile_img">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <br><br>
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                        </form>
                      </div>
                      <div class="col-md-7">
                      <h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                      Job Title : {{ Auth::user()->job_title }}<br>
                      Keycode : {{ Auth::user()->passcode }}
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <br>

</div>
@endsection
