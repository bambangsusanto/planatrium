@extends('templates.default')
@section('title', 'View Requests')

@section('content')

<div class="container">
    <div class="table-responsive">
        <h3>Pending requests</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Request ticket number</th>
                    <th>Type</th>
                    <th>Specified type</th>
                    <th>Country</th>
                    <th>Location info</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td><a href="/request_view_show?view_id={{ $request->slug }}">{{ $request->slug }}</a></td>
                        <td>{{ $request->type }}</td>
                        <td>{{ $request->type_spec }}</td>
                        <td>{{ $request->country }}</td>
                        <td>{{ $request->location_info }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection