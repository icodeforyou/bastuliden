<html>
    <head>
        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/app.css"/>
        <style>
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                color: #798289;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                xvertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
                margin-bottom: 40px;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Bastulidens<br />fiberförening</div>
                <h4>Våra medlemmar</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Adress</th>
                            <th>Fastighetsbeteckning</th>
                            <th>Betalt avgift</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->house_number }}</td>
                            <td style="text-align: center; vertical-align:middle">
                            @if ($user->signup_fee_paid)
                                <span class="label label-success">Betalt</span>
                            @else 
                                <button class="btn-xs btn btn-primary" data-toggle="modal" data-target="#betala">Betala</button>
                            @endif
                            </td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @include ("modals.pay")
            </div>

        </div>
        
        

        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="js/all.js"></script>
    </body>
</html>
