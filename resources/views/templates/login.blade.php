<a class="btn btn-primary" data-toggle="modal" href='#login'>Login</a>
<div class="modal fade" id="login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">

                <form action="/login" method="POST" role="form" class="col-md-8 col-md-offset-2">

                    {!! csrf_field() !!}

                    <div class="form-group has-feedback">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
                        <span class="glyphicon form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="passowrd">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Email Address">
                        <span class="glyphicon form-control-feedback"></span>
                    </div>

                    <div class="button-holder">
                        <button type="submit" class="btn btn-primary" id="login-btn">Login</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </form>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>