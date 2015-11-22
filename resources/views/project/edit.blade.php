@extends('templates.default')
@section('title', 'Edit Project')

@section('content')

<div class="container">
    <form method="POST" role="form" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <!-- Form group for uploading image -->
        <div class="form-group">
            <p><em>Upload an image: </em></p>
            <div id="gallery"></div>
            <br />
            <input type="file" id="image" accept="image/*" name="image"/>
        </div>
        <!-- Form group for uploading image -->

        <br />

        <!-- Form group for updating status -->
        <div class="form-group">
            <label class="control-label col-sm-4">Status: </label>
            <div class="col-sm-8">
                <div class="radio">
                    <label class="radio-inline">
                        <input type="radio" name="status" value="built">
                            built
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" value="on-going">
                            on-going
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" value="idea">
                            still an idea
                    </label>
                </div>
            </div>
        </div>
        <!-- Form group for updating status -->

        <!-- Form group for updating story/about/blog -->
        <div class="form-group">
            <label for="story" class="control-label">About</label>
            <textarea class="form-control" type="text" id="story" name="story" value="{{ old('story') }}" aria-describedby="help-block-story" rows="10" placeholder="Blog about this project or idea.."></textarea>
        </div>
        <!-- Form group for updating story/about/blog -->

        <input type="submit" value="Update" class="btn btn-primary" />
    </form>
</div>

@endsection

@section('script')
<script>
$(document).ready(function() {

    /*Script for dynamic front-end image uploading*/
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