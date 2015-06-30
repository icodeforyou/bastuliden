<html>
    <head>
        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

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
                width:100%
            }

            .title {
                font-size: 96px;
            }

            .links {
                font-size: 18px
            }

            #map-canvas img { max-width: none; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Oktorp fiber</div>
                <p class="links">
                    <a href="/auth/login">Logga in</a> | <a href="/auth/register">Registrera</a> | <a href="mailto:fiber@oktorp.se">Kontakt</a>
                </p>
                <script>
                    var mapZoom = 13,
                        centerLat = 56.876142,
                        centerLon = 12.6819597,
                        disableDefaultUI = false,
                        loc = {
                            'estates':  <?=json_encode($estates);?>
                        };
                </script>

                <div id="map-canvas" style="height:400px; width:100%"></div>
                <p class="links">
                    <a href="/proceedings/view/{{ $latestProtocol->id }}">Senaste protokollet</a>
                </p>
            </div>

        </div>


        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyCnxx8GSwo9wTevNlsWOM2mvlTkXMc3I38"></script>
        <script src="js/all.js"></script>
    </body>
</html>
