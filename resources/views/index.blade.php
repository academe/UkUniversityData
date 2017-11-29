<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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

            .container {
                vertical-align: middle;
            }

            .content {
                display: inline-block;
            }

            .title {
                font-size: 127px;
            }

            a {
                font-size: 2em;
            }

            ul {
                list-style: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <ul>
                    @foreach ($institutions as $institution)
                        <li><a href="{{$institution->SUURL}}">{{$institution->SUURL}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </body>
</html>
