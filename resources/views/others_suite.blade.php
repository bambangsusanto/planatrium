@extends('templates.default')
@section('title', "Designer's Suite")

@section('content')

<div class="container">
    <br />

    <div class="row col-md-8 col-md-offset-2">
        <div class="col-sm-4">
            <img src="/icon/MM.gif" size="100px" class="img-circle" />
        </div>
        <div class="col-sm-7">
            <br />
            <h2>{{ $profile['first_name'] }} {{ $profile['last_name'] }}</h2>
            <p><em>{{ $profile['job'] }}</em></p>
            <p><em>Motto: {{ $profile['motto'] }}</em></p>
        </div>
        @if (Auth::user())
            <div class="col-sm-1">
                <a href="/edit_profile?id={{ $profile['id'] }}"><button class="btn btn-default">Edit Profile</button></a>
            </div>
        @endif
    </div>

    <div class="clearfix"></div>
    <br /><hr />

    <div class="col-sm-8 col-sm-offset-2">
        <h3><em>About Me</em></h3>
        <p>
            {{ $profile['about'] }}
        </p>
    </div>

    <div class="clearfix"></div>
    <br /><hr />

     <div class="col-sm-8 col-sm-offset-2">
        <h3><em>Favorite Project</em></h3>
        <div class="col-sm-6">
            @if ($favorite)
                <img src="/{{ $favorite['image'] }}" width="80%"/>
            @else
                <img src="" alt="no image available" width="80%"/>
            @endif
        </div>
        <p>
            @if ($favorite)
                <a href="/project?project_id={{ $favorite['id'] }}"><h4><em>{{ $favorite['title'] }}</em></h4></a>
                {{ $favorite['story'] }}
            @else
                <h4><em>Project Title</em></h4>
                Add your favorite project
            @endif
        </p>


    </div>

    <div class="clearfix"></div>
    <br /><hr />

    <div class="col-sm-8 col-sm-offset-2">
        <h3><em>Sample Project</em></h3>
        @if (count($project) >= 3)
            @for ($i=0; $i<=2; $i++)
                @if ($project[$i]['image'])
                    <div class='col-sm-4' align="center">
                        <a href="/project/?project_id={{ $project[$i]['id'] }}"><img src="/{{ $project[$i]['image'] }}" width='80%'/></a>
                        <br />
                        <a href="/project/?project_id={{ $project[$i]['id'] }}">{{ $project[$i]['title'] }}</a>
                    </div>
                @else
                    <div class='col-sm-4' align='center'>
                        <p><em>No image to show</em></p>
                        <a href="/project/?project_id={{ $project[$i]['id'] }}">{{ $project[$i]['title'] }}</a>
                    </div>
                @endif
            @endfor
        @else
            @for ($i=0;$i<(count($project)); $i++)
                @if ($project[$i]['image'])
                    <div class='col-sm-4' align="center">
                        <a href="/project/?project_id={{ $project[$i]['id'] }}"><img src="/{{ $project[$i]['image'] }}" width='80%'/></a>
                        <br />
                        <a href="/project/?project_id={{ $project[$i]['id'] }}">{{ $project[$i]['title'] }}</a>
                    </div>
                @else
                    <div class='col-sm-4' align='center'>
                        <p><em>No image to show</em></p>
                        <a href="/project/?project_id={{ $project[$i]['id'] }}">{{ $project[$i]['title'] }}</a>
                    </div>
                @endif
            @endfor
        @endif
    </div>

    <div class="clearfix"></div>
    <br /><hr />

    <div class="col-sm-8 col-sm-offset-2">
        <h3><em>Information</em></h3>
        <div class="row">
            <div class="col-sm-3">
                Email :
            </div>
            <div class="col-sm-9">
                <em>{{ $user['email'] }}</em>
            </div>

            <div class="col-sm-3">
                Location :
            </div>
            <div class="col-sm-9">
                <em>{{ $profile['location'] }}</em>
            </div>

            <div class="col-sm-3">
                Phone:
            </div>
            <div class="col-sm-9">
                <em>{{ $profile['phone'] }}</em>
            </div>

            <div class="col-sm-3">
                Contact Preference:
            </div>
            <div class="col-sm-9">
                <em>Email</em>
            </div>

        </div>

    </div>

    <div class="clearfix"></div>
    <br />
</div>

@stop