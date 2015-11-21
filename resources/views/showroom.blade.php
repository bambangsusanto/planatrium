@extends('templates.default')
@section('title', 'Showroom')

@section('content')

<form class="form-horizontal" role="form" id="search-form">
    <div class="row">
        <div class="col-md-8">
            <legend class="col-sm-offset-1">Filter</legend>

            <div class="clearfix"></div>

            <div class="form-group">
                <label for="filter" class="col-sm-2 control-label">Type: </label>
                <div class="col-sm-6">
                    <select name="type" id="filter" class="form-control" required="required">
                        <option value="invalid">No filter</option>
                        <option value="residential">Residential</option>
                        <option value="commercial">Commercial</option>
                        <option value="educational">Educational</option>
                        <option value="industrial">Industrial</option>
                        <option value="government">Government</option>
                        <option value="religious">Religious</option>
                        <option value="parking">Parking structures and storage</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-primary">Filter</button>
                </div>
            </div>
        </div>

    </div>

</form>

<div class="clearfix"></div>

<div class="container">

    @if (Auth::check())
        <br />
        <a href="/showcase"><button class="btn btn-info">Showcase your ideas or projects</button></a>
        <div class="clearfix"></div><br />
    @else
        <div class="clearfix"></div><br />
    @endif

    <?php
        $chunk = array_chunk($items->getCollection()->all(), 2);
    ?>

    @foreach($chunk as $row)
    <div class="row">
        @foreach($row as $item)
             <article class="col-md-6">
                <a href="/project?project_id={!! $item->id !!}"><img src="{{ $item->image}} " alt="{{ $item->title }}" width="80%"></a>
                <h3>{{ $item->title }}</h3>
                <h5><em>By: <a href="/others_suite?user_id={!! $item->user_id !!}">{{ $profiles->find($item->user_id)->profile->first_name }} {{ $profiles->find($item->user_id)->profile->last_name }}</a></em></h5>
                <div class="body">
                    <p>Status: <em>{{ $item->status }}</em></p>
                </div>
            </article>
        @endforeach
    </div>

    @endforeach

    {!! $items->appends(Request::except('page'))->render() !!}

    <div class="clearfix"></div><hr />


    <div class="text-right">
        <h3>Can't find what you want?</h3>
        <br />
        <a href="/request"><button class="btn btn-primary">Request for design</button></a>
    </div>

    <div class="clearfix"></div><br />

</div>


@endsection

@section('footer')
@include('templates.footer')
@endsection
