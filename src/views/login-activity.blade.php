<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Activity :: {{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <p class="text-right" style="margin-top: 50px;">
                <a href="{{ url('home') }}">
                    <i class="fa fa-backward"></i> Back To Home
                </a>
            </p>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-key"></i> My Login Activities
                </div>

                <div class="panel-body">
                    <table class="table table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th>Event Type</th>
                            <th>User Agent</th>
                            <th>IP Address</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activities as $activity)
                        <tr>
                            <td>{{ $activity->type }}</td>
                            <td>{{ $activity->user_agent }}</td>
                            <td>{{ $activity->ip_address }}</td>
                            <td>{{ $activity->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        {{ $activities->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>