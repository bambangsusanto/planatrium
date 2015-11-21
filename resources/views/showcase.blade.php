@extends('templates.default')
@section('title', 'Showcase')

@section('content')

<div class="container">
    <form method="POST" role="form" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <legend>Showcase your work</legend>

        <div class="row">
            <div class="col-md-4">
                <p><em>Upload an image: </em></p>
                <div id="gallery"></div>
                <br />
                <input type="file" id="image" accept="image/*" name="image"/>
            </div>

            <div class="col-md-8">

                <div class="form-group">
                    <label for="title" class="control-label col-sm-4">Project Title</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Project title">
                    </div>
                </div>

                <div class="clearfix"></div><br />

                <div class="form-group">
                    <label for="type" class="control-label col-sm-4">Type</label>
                    <div class="col-sm-8">
                        <select name="type" id="type" class="form-control">
                            <option value="invalid">-- Select One --</option>
                            <option value="residential">Residential</option>
                            <option value="commercial">Commercial</option>
                            <option value="educational">Educational</option>
                            <option value="industrial">Industrial</option>
                            <option value="government">Government</option>
                            <option value="religious">Religious</option>
                            <option value="parking">Parking structures and storage</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="clearfix"></div><br />

                <div class="form-group">
                    <label class="control-label col-sm-4">Dimension</label>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-xs-3">
                                <input type="text" id="size_width" value="{{ old('size_width') }}" name="size_width" class="form-control">
                            </div>
                            <div class="col-xs-1 align-vertical">
                                <label class="control-label">x</label>
                            </div>
                            <div class="col-xs-3">
                                <input type="text" id="size_length" value="{{ old('size_length') }}" name="size_length" class="form-control">
                            </div>
                            <div class="col-xs-5">
                                <select name="measurement" id="measurement" class="form-control">
                                    <option value="meters">meters</option>
                                    <option value="feet">feet</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div><br />

                <div class="form-group">
                    <label for="location" class="control-label col-sm-4">Project Location</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="location" id="location" placeholder="city, country...">
                    </div>
                </div>

                <div class="clearfix"></div><br />

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

            </div>


        </div>



        <div class="clearfix"></div><br />

        <div class="form-group">
            <label for="story" class="control-label">About</label>
            <textarea class="form-control" type="text" id="story" name="story" value="{{ old('story') }}" aria-describedby="help-block-story" rows="10" placeholder="Blog about this project or idea.."></textarea>

        </div>


        <div class="clearfix"></div><br />

        <div class="button-holder">
            <input type="submit" value="upload" class="btn btn-primary" />
        </div>

    </form>
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