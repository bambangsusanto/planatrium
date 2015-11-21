@extends('templates.default')
@section('title', 'Request Info')

@section('content')

<div class="container">
    <br />
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Request ID</th>
                <th>{{ $request->slug }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Type</td>
                <td>{{ $request->type }}</td>
            </tr>

            <tr>
                <td>Type (specified)</td>
                <td>{{ $request->type_spec }}</td>
            </tr>

            <tr>
                <td>Dimension</td>
                <td>({{ $request->size_width }} x {{ $request->size_length }}) {{ $request->measurement }}</td>
            </tr>

            <tr>
                <td>Building Information</td>
                <td>{{ $request->type_info }}</td>
            </tr>

            <tr>
                <td>Project location</td>
                <td>{{ $request->country }}</td>
            </tr>

            <tr>
                <td>Addition project location information</td>
                <td>{{ $request->location_info }}</td>
            </tr>

            <tr>
                <td>Potential client's email</td>
                <td>{{ $request->email }}</td>
            </tr>

            <tr>
                <td>Potential client's contact detail</td>
                <td>{{ $request->phone }}</td>
            </tr>
        </tbody>
    </table>

    <div class="rows">
        <div class="col-sm-6"><a href="/request_take?request_id={{ $request->slug }}"><button class="btn btn-primary">Take request</button></a></div>
        <div class="col-sm-6"><a href="/request_view"><button class="btn btn-info">Back to Request list</button></a></div>
    </div>


    <div class="clearfix"></div><br />



</div>

@endsection

