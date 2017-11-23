<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                {{ Form::open(['url' => '/search', 'method' => 'get']) }}
                    <div class="form-group">
                        {{ Form::label('search', 'Search: ') }}
                        {{ Form::text('search', '', ['class' => 'form-control']) }}
                    </div>
                    {{ Form::label('advancedOptions', 'Advanced Options:') }}
                    <button type="button" data-toggle="collapse" data-target="#demo"><span class="glyphicon glyphicon-chevron-down"></span></button>
                    <div class="form-group collapse" id="demo">
                        <table class="table">
                            <tr>
                                <td>{{ Form::label('Location', 'Location: ') }}</td>
                                <td>{{ Form::label('Group', 'University Group: ') }}</td>
                                <td>{{ Form::label('Foundation', 'Foundation Year:')}}</td>
                                <td>{{ Form::label('Sandwhich', 'Sandwhich Year:')}}</td>
                            </tr>
                            <tr>
                                <td>{{ Form::select('Location', array('UK' => 'United Kingdom', 'ENG' => 'England', 'SCT' => 'Scotland'), null, ['placeholder' => 'Select an option']) }}</td>
                                <td>{{ Form::select('Group', array('Oxbridge', 'Russel Group', 'Red Brick'), null, ['placeholder' => 'Select an option']) }}</td>
                                <td>{{ Form::checkbox('Foundation', '1') }}</td>
                                <td>{{ Form::checkbox('Sandwhich', '1') }}</td>
                            </tr>
                        </table>


                        <br>

                    </div>
                    <br>
                    {{ Form::submit('Search', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
                <br>
                <hr>
                <br>
                <div id="results" class="container-fluid">
                    <h1>Search Results: </h1>
                    @if(isset($results) and $results->count() != 0)
                        <table class="table">
                            <tr class="active">
                                <th>University</th>
                                <th>Course</th>
                            </tr>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{ $result->university->VIEW_NAME }}</td>
                                    <td><a href="{{$result->CRSEURL}}">{{$result->TITLE}}</a></td>
                                </tr>
                            @endforeach                     
                        </table>

                    {{ $results->appends(request()->input())->links() }}
                    @elseif (isset($results) and $results->count() == 0)
                        <p>No Results were found.</p>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
