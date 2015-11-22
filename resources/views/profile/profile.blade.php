@extends('templates.default')
@section('title', 'Make Profile')

@section('content')

<div class="container">
    <div class="alert">
        <div class="alert alert-info" role="alert">
            You have successfully registered to Plan Atrium! Please fill in your profile info below.
        </div>

        <form method="POST" role="form" class="col-sm-8 col-sm-offset-2">
            @foreach ($errors->all() as $error)
                <p class="alert alert-warning">{{ $error }}</p>
            @endforeach

            {!! csrf_field() !!}

            <legend>Make Profile</legend>

            <div class="form-group">
                <label for="first_name" class="control-label col-sm-4">First Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name"  value="{{ old('first_name') }}">
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>

            <div class="clearfix"></div><br />

            <div class="form-group">
                <label for="last_name" class="control-label col-sm-4">Last Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name"  value="{{ old('last_name') }}">
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>

            <div class="clearfix"></div><br />

            <div class="form-group">
                <label for="job" class="control-label col-sm-4">Occupation</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="job" name="job" placeholder="What you do" value="{{ old('job') }}">
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>

            <div class="clearfix"></div><br />

            <div class="form-group">
                <label for="phone" class="control-label col-sm-4">Contact number</label>
                <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">+</span>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" value="{{ old('phone') }}">
                </div>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>

            <div class="clearfix"></div><br />

            <div class="form-group has-feedback">
                <label for="location" class="control-label col-sm-4">Location</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Where people can find you" value="{{ old('location') }}">
                    </div>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
            </div>

            <div class="clearfix"></div><br />

            <div class="form-group">
                <label for="motto" class="control-label">Motto</label>
                <textarea class="form-control" placeholder="Insert your favorite quote or your own motto" id="motto" name="motto" rows="2"></textarea>
            </div>

            <div class="clearfix"></div><br />

            <div class="form-group">
                <label for="about" class="control-label">About</label>
                <textarea class="form-control" placeholder="Blog a little bit about yourself" id="about" name="about" rows="4"></textarea>
            </div>

            <div class="button-holder">
                <button type="submit" class="btn btn-primary">Submit profile</button>
            </div>
        </form>

    </div>
</div>

@endsection

