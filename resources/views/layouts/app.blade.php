<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Open Market Charity') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <style>

        .photo-gallery {
            color:#313437;
            background-color:#f8fafc;
        }

        .photo-gallery p {
            color:#7d8285;      
        }

        .photo-gallery h2 {
            font-weight:bold;
            margin-bottom:40px;
            padding-top:40px;
            color:inherit;
        }

        @media (max-width:767px) {
            .photo-gallery h2 {
                margin-bottom:25px;
                padding-top:25px;
                font-size:24px;
            }
        }

        .photo-gallery .intro {
            font-size:16px;
            max-width:500px;
            margin:0 auto 40px;
        }

        .photo-gallery .intro p {
            margin-bottom:0;
        }

        .photo-gallery .photos {
            padding-bottom:20px;
        }

        .photo-gallery .item {
            padding-bottom:30px;
        }


        #cards_landscape_wrap-2{
            text-align: center;
            /* background: #F7F7F7; */
        }
        #cards_landscape_wrap-2 .container{
            padding-top: 0px; 
            padding-bottom: 0px;
        }
        #cards_landscape_wrap-2 a{
            text-decoration: none;
            outline: none;
        }
        #cards_landscape_wrap-2 .card-flyer {
            border-radius: 5px;
        }
        #cards_landscape_wrap-2 .card-flyer .image-box{
            background: #ffffff;
            overflow: hidden;
            box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.50);
            border-radius: 5px;
        }
        #cards_landscape_wrap-2 .card-flyer .image-box img{
            -webkit-transition:all .9s ease; 
            -moz-transition:all .9s ease; 
            -o-transition:all .9s ease;
            -ms-transition:all .9s ease; 
            width: 100%;
            height: 100px;
        }
        #cards_landscape_wrap-2 .card-flyer:hover .image-box img{
            opacity: 0.7;
            -webkit-transform:scale(1.15);
            -moz-transform:scale(1.15);
            -ms-transform:scale(1.15);
            -o-transform:scale(1.15);
            transform:scale(1.15);
        }
        #cards_landscape_wrap-2 .card-flyer .text-box{
            text-align: center;
        }
        #cards_landscape_wrap-2 .card-flyer .text-box .text-container{
            padding: 30px 18px;
        }
        #cards_landscape_wrap-2 .card-flyer{
            background: #FFFFFF;
            margin-top: 50px;
            -webkit-transition: all 0.2s ease-in;
            -moz-transition: all 0.2s ease-in;
            -ms-transition: all 0.2s ease-in;
            -o-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
            box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.40);
        }
        #cards_landscape_wrap-2 .card-flyer:hover{
            background: #fff;
            box-shadow: 0px 15px 26px rgba(0, 0, 0, 0.50);
            -webkit-transition: all 0.2s ease-in;
            -moz-transition: all 0.2s ease-in;
            -ms-transition: all 0.2s ease-in;
            -o-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
            margin-top: 50px;
        }
        #cards_landscape_wrap-2 .card-flyer .text-box p{
            margin-top: 10px;
            margin-bottom: 0px;
            padding-bottom: 0px; 
            font-size: 14px;
            letter-spacing: 1px;
            color: #000000;
        }
        #cards_landscape_wrap-2 .card-flyer .text-box h6{
            margin-top: 0px;
            margin-bottom: 4px; 
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            font-family: 'Roboto Black', sans-serif;
            letter-spacing: 1px;
            color: #00acc1;
        }
        .modal.modal-fullscreen .modal-dialog {
            width: 80vw;
            height: 100vh;
            margin: 0;
            padding: 0;
            max-width: none;
            margin-left:10%;
            }

            .modal.modal-fullscreen .modal-content {
            height: auto;
            height: 100vh;
            border-radius: 0;
            border: none; 
            }

            .modal.modal-fullscreen .modal-body {
            overflow-y: auto; 
        }
        .carousel-item {
            height: 20vh;
            min-height: 350px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    <div id="app">
        <div class="container">
            @include('layouts.navigation')
            @include('layouts.hero')
        </div>
       

        <main class="py-4">
            @yield('content')
        </main>

    </div>
    <div class="modal fade modal-fullscreen" id="myModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true" onclick="$('.lightbox').hide();">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('.lightbox').hide();$('#myModal').modal('hide');">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-image" style="text-align:center;">
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <!-- <a class="btn btn-success" onclick="load_modal('{{ route('product.create') }}', 'Add New Product')" href="#1"> Add New Product</a> -->
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<script>

    function load_modal(route, title, size=''){
        $('.lightbox').hide();
        $.get(route, function (data) {


            $('.modal-title').html(title)
            $('.modal-body').html(data)
            $('#myModal').modal('show');
            if(size!=''){
                $('#myModal').removeClass('modal-fullscreen');
            } else {
                $('#myModal').addClass('modal-fullscreen');
            }
            $('.lightbox').hide();
        })

    };

    function delete_account(url){
        if (confirm('Some message')) {
            window.location.replace(url)
        } else {
            
        }
    }
    
</script>
</html>
