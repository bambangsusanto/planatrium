@extends('templates.default')
@section('title', 'Project')

@section('content')
<br />

<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if ($project['image'])
                <img src="/{{ $project['image'] }}" alt="{{ $project['title'] }}" width="100%" style="max-width:640px; height:auto;">
            @elseif ($user['id'] == $project['user_id'])
                <form method="POST" role="form" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <p><em>Upload an image: </em></p>
                    <div id="gallery"></div>
                    <br />
                    <input type="file" id="image" accept="image/*" name="image"/>
                    <br />
                    <input type="submit" value="upload" class="btn btn-primary" />
                </form>
            @else
                No image to show.
            @endif
        </div>
        <div class="col-md-4">
            <h2>{{ $project['title'] }}</h2>
            <h4>By: <em><a href="/others_suite/?user_id={{ $profile['user_id'] }}">{{ $profile['first_name'] }} {{ $profile['last_name'] }}</a></em></h4>
            <p>Dimension: ({{ $project['size_width'] }} x {{ $project['size_length'] }}) square {{ $project['measurement'] }}</p>
            <p>Location: {{ $project['location'] }}</p>
            <p>Status: {{ $project['status'] }}</p>
            @if ($user['id'] == $project['user_id'] and ($project['favorite'] == 0))
                <a href="/project_favorite?project_id={{ $project['id'] }}"><button class="btn btn-primary">Favorite this project</button></a>
            @endif
        </div>

        <div class="clearfix"></div><br />

        <div class="col-md-12">
            <h4><em>About</em></h4>
            {{ $project['story'] }}
        </div>
    </div>
</div>

<br />

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