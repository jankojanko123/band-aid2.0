<?php include_once "php/get_img.php" ?>
<?php include_once "php/get_twich.php" ?>
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

    <!--soc media buttons -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>

<body>
<div class="area">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li><img src="{{ asset('images/artist/'.$newest_artist_img) }}" alt="Image"
                 class="rounded-circle tm-img-timeline animated"
                 style="height: 50px; width: 50px"></li>
        <li><img src="https://image.flaticon.com/icons/svg/768/768464.svg" class="pr-1" style=" width: 100px; height: 100px; -webkit-filter: invert(1);
   filter: invert(1);"></li>
        <li><img src="https://image.flaticon.com/icons/svg/478/478543.svg" class="pr-1" style=" width: 50px; height: 50px; -webkit-filter: invert(1);
   filter: invert(1);"></li>
        <li><img src="https://image.flaticon.com/icons/svg/1034/1034151.svg" class="pr-1" style=" width: 100px; height: 100px; -webkit-filter: invert(1);
   filter: invert(1);"></li>
        <li><img src="https://image.flaticon.com/icons/png/512/2543/2543729.png" class="pr-1" style=" width: 50px; height: 50px; -webkit-filter: invert(1);
   filter: invert(1);"></li>
    </ul>


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
            <!-- <a href="{{ route('register') }}">Register</a>-->
            @endauth
        </div>
    @endif


    <div class="container-fluid float-left pt-4 d-flex">

        <div class="backdrop" style="
    box-shadow: 10px 10px 5px #000000;
        /*border-radius: 0 0 100px 100px;*/
        height: 700px;
        width: 1000px;
        background: rgba(9,9,9,0.82);">
            <div class="row">
                <div class="col-4">
                    <div id="twitch-embed"
                         style="height: 600px; width:1000px;">
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12">
                    <div class="pl-5 float-left">
                        <div class="flex-center">
                            <div class="backdrop pt-3" style="

                            /**/
                            height: 70px;
                            width: auto;
                            background: rgba(48,48,48,0.56);">
                                <h5 class="pt-2 pl-5 pr-5" style="color: seashell">{{$media_title}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="pr-5 float-right">
                        <div class="flex-center">
                            <div class="flex-center pt-0" style="color: rgba(255,251,255,0.96);">
                                <div class="backdrop pt-3" style="
                            /**/
                            height: 70px;
                            width: auto;
                            background: rgba(48,48,48,0.56);">
                                    <div>
                                        <h5 class="pt-2 pl-5 pr-5" style="color: seashell">{{$viewer_count}}
                                            viewers</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5 pl-3">
                <div class="backdrop" style="
            box-shadow: 10px 10px 5px #000000;
                    /**/
                    height: 100px;
                    width: 1000px;
                    background: rgba(9,9,9,0.82);">
                    <div class="col-12 pt-4">
                        <div class="flex-center pt-1" style="color: rgba(255,251,255,0.96);">
                            <h4>300</h4> <h4>/</h4> <h4>400</h4>
                        </div>
                        <div class="progress" style="height: 20px;">
                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 75%; background-color: #1d2124"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid float-right d-flex pl-4">
            <div class="row">
                <div class="col-7">
                    <div class="backdrop" style="
                box-shadow: 10px 10px 5px #000000;
                    /**/
                    height: 830px;
                    width: 800px;
                    background: rgba(9,9,9,0.82);">
                        <div class="backdrop" style="
                            /*border-radius: 200px 200px 100px 100px;*/
                            height: 150px;
                            width: 800px;
                            background: rgba(48,48,48,0.56);">
                            <div class="flex-center pt-4">
                                <a href="{{$artist_data->last()->webpage}}">
                                    <img src="{{ asset('images/artist/'.$newest_artist_img) }}" alt="Image"
                                         class="rounded-circle tm-img-timeline animated"
                                         style="height: 100px; width: 100px">
                                </a>
                                <div class="pl-3" id="flip1">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn" data-toggle="modal"
                                            data-target="#exampleModalCenter">
                                        <div class="d-flex" style="color: seashell">
                                            <h3>{{$artist_data->last()->name}}</h3>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="width: 1000px">
                                    <div class="modal-content" style="background: rgba(18, 18, 18, 1);">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Artist links</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <a href="{{$artist_data->last()->spotify_id}}" class="fa fa-spotify"></a>
                                            <a href="{{$artist_data->last()->apple_music}}" class="fa fa-apple"></a>
                                            <a href="{{$artist_data->last()->youtube_id}}" class="fa fa-youtube"></a>
                                            <a href="{{$artist_data->last()->webpage}}" class="fa fa-instagram"></a>
                                            <a href="{{$artist_data->last()->soundcloud_id}}"
                                               class="fa fa-soundcloud"></a>
                                            <a href="{{$artist_data->last()->band_camp_id}}" class="fa fa-bandcamp"></a>
                                            <a href="{{$artist_data->last()->webpage}}"
                                               class="fa fa-external-link-square"></a>
                                        </div>

                                        <div class="modal-footer">
                                        </div>
                                    </div>
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
                        <div class="pt-0">
                            <div class="backdrop" style="
                            /*border-radius: 50px 50px 50px 50px;*/
                            height: 150px;
                            width: 800px;
                            background: rgba(48,48,48,0.56);">
                                <div class="flex-center pt-4">
                                    <a href="{{$foundation_data->last()->webpage}}">
                                        <img src="{{ asset('images/foundation/'.$newest_foundation_img) }}"
                                             alt="Image"
                                             class="rounded-circle tm-img-timeline"
                                             style="height: 100px; width: 100px">
                                    </a>
                                    <div class="pl-3" id="flip2">
                                        <a href="{{$foundation_data->last()->webpage}}">
                                            <button type="button" class="btn btn-lg" style="color: seashell"
                                                    data-toggle="modal">
                                                <h3>{{$foundation_data->last()->name}}</h3>
                                            </button>
                                        </a>
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
                            <a class="dbox-donation-button text-center pt-3" style="
                            background: rgba(48,48,48,0.56) url(https://d1iczxrky3cnb2.cloudfront.net/red_logo.png)
                            no-repeat 37px;
                            color: #fff;
                            text-decoration: none;
                            font-family: Verdana,sans-serif;
                            display: inline-block;
                            font-size: 14px;
                            padding: 5px 15px 15px 15px;
                            -webkit-border-radius: 2px;
                            -moz-border-radius: 2px;
                            /*border-radius: 50px 50px 50px 50px;*/
                            height:50px;
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
