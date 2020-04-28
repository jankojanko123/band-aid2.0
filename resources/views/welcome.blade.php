<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BandAid</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Load the Twitch embed script -->
    <script src="https://embed.twitch.tv/embed/v1.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".btn").click(function () {
                $("#myModal").modal('show');
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#flip1").ready(function () {
                $("#panel1").slideDown("slow");
            });
            $("#flip1").click(function () {
                $("#panel1").slideDown("slow");
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#panel1").click(function () {
                $("#panel1").slideUp("slow");
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#flip2").ready(function () {
                $("#panel2").slideDown("slow");
            });
            $("#flip2").click(function () {
                $("#panel2").slideDown("slow");
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#panel2").click(function () {
                $("#panel2").slideUp("slow");
            });
        });
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        <?php
        //ger viewer count and title
        if ( $media_data->last()->type == 'stream'){

            $username = $media_data->last()->username;
            $twitch = new romanzipp\Twitch\Twitch;
            $twitch->setClientId('lze3t1okyae8txn8hys3utpit8osw4');
             // Get User by Username
            $result = $twitch->getUserByName($username);

            // Check, if the query was successfull
            if (!$result->success()) {
                die('Ooops: ' . $result->error());
            }
             // Shift result to get single user data
            $user = $result->shift();
            $userId = $user->id;

            $result = $twitch->getStreams(['user_id' => $userId], $paginator = NULL, isset($result) ? $result->next() : null);

            if(empty($result->data)){

                $media_id = 604037253; //hardcode bob ross
                $media_type = 'video';
                $media_title = 'Stream currenty offline, but here is Bob Ross';
                $viewer_count = '';

            }else {
                $viewer_count = $result->data[0]->viewer_count;
                $media_title = $result->data[0]->title;
                $media_id = $media_data->last()->media_id;
                $media_type = $media_data->last()->type;
            }

        }elseif($media_data->last()->type == 'video'){

            $twitch = new romanzipp\Twitch\Twitch;
            $twitch->setClientId('lze3t1okyae8txn8hys3utpit8osw4');
            $media_id = (int)$media_data->last()->media_id;

            $result = $twitch->getVideosById($media_id, $parameters = array (), $paginator = NULL);
            // Check, if the query was successfull
            if (!$result->success()) {
                die('Ooops: ' . $result->error());
            }
            if(empty($result->data)){
                $media_id = 604037253; //hardcode bob ross
                $media_type = 'video';
                $media_title = 'Stream currenty offline, but here is Bob Ross';
                $viewer_count = '';
            }else {
                $viewer_count = $result->data[0]->view_count;
                $media_title = $result->data[0]->title;
                $media_id = $media_data->last()->media_id;
                $media_type = $media_data->last()->type;
            }
        }
        else{ //if everything fails play bob ross
            $media_id = 604037253; //hardcode bob ross
            $media_type = 'video';
            $media_title = 'Stream currently offline, but here is Bob Ross';
            $viewer_count = '';
        }

         //get lastest img
            $files_artist = scandir('images/artist', SCANDIR_SORT_DESCENDING);
            $newest_artist_img = $files_artist[0];

            $files_foundation = scandir('images/foundation', SCANDIR_SORT_DESCENDING);
            $newest_foundation_img = $files_foundation[0];

            ?>

        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .bs-example {
            margin: 10px;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        #panel1, #flip1 {
            padding: 5px;
            text-align: center;
        }

        #panel2, #flip2 {
            padding: 5px;
            text-align: center;
        }

        #panel1 {
            display: none;
            border-radius: 50px 50px 50px 50px;
            height: 170px;
            width: 800px;
            background: rgba(23, 21, 61, 0.56);
        }

        #panel2 {
            display: none;
            border-radius: 50px 50px 50px 50px;
            height: 170px;
            width: 800px;
            background: rgba(23, 21, 61, 0.56);
        }

    </style>
</head>
<body>


<div class="modal-backdrop" style="background-color: rgb(37,37,37)">

    <a class="navbar-brand d-flex top-left pl-3" href="{{ url('/') }}">
        <div>
            <img src="/svg/freecodecamp.svg" class="pr-1" style="-webkit-filter: invert(1);
   filter: invert(1);">
        </div>
        <div class="pl-2 pt-1 text-white-50"><strong>bandAid</strong></div>
    </a>


    @if (Route::has('login'))
        <div class="top-right links text-black-50">
            @auth
                <a href="{{ url('/artist/submit') }}">Edit Artist</a>
                <a href="{{ url('/media/submit') }}">Edit Media</a>
                <a href="{{ url('/foundation/submit') }}">Edit Info</a>
            <!--<a href="{{ url('/home') }}">Home</a>-->
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="container-fluid float-left pt-4 d-flex">
        <div class="backdrop" style="
        border-radius: 0 0 100px 100px;
        height: 700px;
        width: 1000px;
        background: rgba(5,10,19,0.82);">
            <div class="row">
                <div class="col-4">
                    <div id="twitch-embed"
                         style="height: 600px; width:1000px;">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="pl-5 pt-4 float-left">
                        <div class="flex-center">
                            <h5>{{$media_title}}</h5>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="backdrop" style="
                        border-radius: 0 0 200px 100px;
                        height: 100px;
                        width: 150px;
                        background: rgba(20,115,238,0.56);">
                            <div class="flex-center pt-4" style="color: rgba(255,251,255,0.96);">
                                <h5>{{$viewer_count}}</h5>
                                <h7>viewers</h7>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 pt-4">
                    <div class="flex-center pt-1" style="color: rgba(255,251,255,0.96);">
                        <h4>69</h4> <h4>/</h4> <h4>420</h4>
                    </div>
                    <div class="progress" style="height: 20px">
                        <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                             aria-valuemax="100" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid float-right d-flex">
            <div class="row">
                <div class="col-7">
                    <div class="backdrop" style="
                    border-radius: 100px 100px 100px 100px;
                    height: 800px;
                    width: 800px;
                    background: rgba(5,10,19,0.82);">
                        <div class="backdrop" style="
                            border-radius: 200px 200px 100px 100px;
                            height: 150px;
                            width: 800px;
                            background: rgba(20,115,238,0.56);">
                            <div class="flex-center pt-4">
                                <a href="{{$artist_data->last()->webpage}}">
                                    <img src="{{ asset('images/artist/'.$newest_artist_img) }}" alt="Image"
                                         class="rounded-circle tm-img-timeline animated"
                                         style="height: 100px; width: 100px">
                                </a>
                                <div class="pl-3" id="flip1">
                                    <button type="button" class="btn btn-lg" style="color: seashell"
                                            data-toggle="modal">
                                        <h3>{{$artist_data->last()->name}}</h3>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="pt-0 " id="panel1">
                            <div class="flex-center">
                                <div class="pt-4 pl-3 pr-3 text-center" style="color: #fff; font-size: 16px">
                                    <text>{{$artist_data->last()->text}}
                                    </text>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <div class="backdrop" style="
                            border-radius: 50px 50px 50px 50px;
                            height: 150px;
                            width: 800px;
                            background: rgba(20,115,238,0.56);">
                                <div class="flex-center pt-4">
                                    <a href="{{$foundation_data->last()->webpage}}">
                                        <img src="{{ asset('images/foundation/'.$newest_foundation_img) }}" alt="Image"
                                             class="rounded-circle tm-img-timeline"
                                             style="height: 100px; width: 100px">
                                    </a>
                                    <div class="pl-3" id="flip2">
                                        <button type="button" class="btn btn-lg" style="color: seashell"
                                                data-toggle="modal">
                                            <h3>{{$foundation_data->last()->name}}</h3>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-0 " id="panel2">
                                <div class="flex-center">
                                    <div class="pt-4 pl-3 pr-3 text-center" style="color: #fff; font-size: 16px">
                                        <text>{{$foundation_data->last()->text}}
                                        </text>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-center pt-5">
                            <a class="dbox-donation-button text-center" style="
                            background: rgba(20,115,238,0.56) url(https://d1iczxrky3cnb2.cloudfront.net/red_logo.png)
                            no-repeat 37px;
                            color: #fff;
                            text-decoration: none;
                            font-family: Verdana,sans-serif;
                            display: inline-block;
                            font-size: 14px;
                            padding: 5px 15px 15px 15px;
                            -webkit-border-radius: 2px;
                            -moz-border-radius: 2px;
                            border-radius: 50px 50px 50px 50px;
                            height: 40px;
                            width: 570px;
                        }" href="https://pages.donately.com/bandaid/form/frm_a4dd29054afc">Donate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- Create a Twitch.Embed object that will render within the "twitch-embed" root element. -->
<script type="text/javascript">

    var id = "{{ $media_id}}";
    var type = "{{ $media_type}}";

    if (type === 'stream') {
        new Twitch.Embed("twitch-embed", {
            width: "100%",
            height: "100%",
            channel: id,
            theme: "dark",
            allowfullscreen: "true",
            layout: "video"
        });
    } else if (type === 'video') {
        new Twitch.Embed("twitch-embed", {
            width: "100%",
            height: "100%",
            video: id,
            theme: "dark",
            allowfullscreen: "true",
            layout: "video"
        });
    }
    embed.addEventListener(Twitch.Embed.VIDEO_READY, () => {
        var player = embed.getPlayer();
        player.play();
        player.setVolume(0.5);

    });
</script>

</html>
