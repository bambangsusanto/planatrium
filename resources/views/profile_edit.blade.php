@extends('templates.default')
@section('title', 'Edit Profile')

@section('content')

<div class="container">
<div class="col-md-8 col-md-offset-2">
    <form method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <legend>Edit Profile</legend>

        @foreach ($errors->all() as $error)
            <p class="alert alert-warning">{{ $error }}</p>
        @endforeach

        <div>
            <p><em>Change your profile picture picture: </em></p>
            <div id="gallery"></div>
            <br />
            <input type="file" id="image" accept="image/*" name="image"/>
        </div>

        <br />

        <div class="form-group">
            <label for="first_name" class="control-label col-sm-2">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" value="{{ $profile['first_name'] }}">
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name" value="{{ $profile['last_name'] }}">
            </div>
        </div>

        <div class="form-group">
            <label for="job" class="control-label col-sm-2">Occupation</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="job" id="job" placeholder="Occupation" value="{{ $profile['job'] }}">
            </div>
        </div>

        <div class="form-group">
            <label for="motto" class="control-label col-sm-2">Motto</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="motto" id="motto" placeholder="Your life motto" value="{{ $profile['motto'] }}">
            </div>
        </div>

        <div class="form-group">
            <label for="about" class="control-label col-sm-2">About</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="4" placeholder="Blog a little bit about yourself." name="about">{{ $profile['about'] }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="location" class="control-label col-sm-2">Location</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="location" id="location" placeholder="City, country" value="{{ $profile['location'] }}">
            </div>
        </div>

        <div class="form-group">
            <label for="phone" class="control-label col-sm-2">Phone</label>
            <div class="col-sm-10">
            <div class="input-group">
                <span class="input-group-addon">+</span>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" value="{{ old('phone') }}">
            </div>
                <span class="glyphicon form-control-feedback"></span>
            </div>
        </div>

        <div class="button-holder">
            <input type="submit" class="btn btn-success" value="Save changes" />
        </div>

    </form>
</div>
</div>

@endsection

@section('script')
<script>
$(document).ready(function() {
    $("#image").on('change', function () {

        if (typeof (FileReader) != "undefined") {

            var image_holder = $("#gallery");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumbnail"
                }).appendTo(image_holder);

            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });


});

</script>
@endsection