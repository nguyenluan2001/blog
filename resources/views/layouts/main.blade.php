<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="https://thecodeholic.herokuapp.com/">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('resources/css/main/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="{{asset('resources/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('resources/js/app.js')}}"></script>
    <script src="{{asset('resources/js/main.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


    <!-- ------Carousel----- -->
    <link rel="stylesheet" href="{{url('resources/slider/owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('resources/slider/owlcarousel/assets/owl.theme.default.min.css')}}">
    <script src="{{url('resources/slider/jquery.min.js')}}"></script>
    <script src="{{url('resources/slider/owlcarousel/owl.carousel.min.js')}}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Sansita+Swashed:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
    <script>
        $(document).ready(function() {

            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                autoplayTimeout: 500,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }

            });

        });
    </script>



</head>

<body>


    </style>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="A0kp7fyD"></script>
    <div id="wrapper">
        <div id="header">
            <div class="container">
                <div class="wp_menu">
                    <div id="logo">
                        <h1><a href="{{url('/')}}" class="font-family-logo">CODEADDICT</a></h1>
                    </div>
                    <div id="menu">
                        <div class="item"><a href="Home">Home</a> </div>
                        <div class="item"><a href="">About</a></div>
                        <div class="item"><a href="">Services</a></div>
                        <div class="item">
                            <a href="">Thanh Luan <i class="fas fa-angle-down"></i> </a>
                            <div id="info_user">
                                <a href="1" class="font-black">Dashboard</a>
                                <a href="2" class="font-red">Logout</a>
                            </div>

                        </div>
                    </div>
                    <span class="font-white" id="menu_icon"><i class="fas fa-bars"></i>
                    </span>
                </div>

                <div id="menu_respon">
                    <div class="item"><a href="?controller=Home&action=Index">Home</a> </div>
                    <div class="item"><a href="">About</a></div>
                    <div class="item"><a href="">Services</a></div>
                    <div class="item" id="topic">
                        <span class="text-white" id="topic_section">Topics <i class="fas fa-angle-down"></i> </span>
                        <div id="list_topic" class="d-none">
                            <span class="d-block"></span>
                        </div>
                        <div id="category">
                            @foreach($categories as $item)
                            <div class="post_cat_item pl-3">
                                <span class="post_cat_title">{{$item->post_cat_title}}</span>
                                <div class="post_sub_cat">
                                    @foreach($item->post_sub_cats as $value)
                                    <div class="post_sub_cat_item pl-3">
                                        <a href="{{route('post_by_category',[$item->post_cat_slug,$value->post_sub_cat_slug])}}">{{$value->post_sub_cat_title}}</a>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="item">
                        <a href="">Thanh Luan <i class="fas fa-angle-down"></i> </a>
                        <div id="info_user" class="d-none">
                            <a href="https://htmlcolorcodes.com/" class="font-black">Dashboard</a>
                            <a href="Logout" class="font-red">Logout</a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        @section('trendy_post')
        <div id="trending_post">
            <div class="container">
                <!-- Set up your HTML -->
                <h1 class="font-black">TRENDING POST</h1>
                <div class="owl-carousel owl-theme">
                    @foreach($trending_posts as $item)
                    <div class="item">
                        <a href="{{route('post.show',$item->slug)}}"><img src="{{asset('public/uploads/posts/'.$item->post_img)}}" alt=""></a>
                        <a href="{{route('post.show',$item->slug)}}">{{$item->post_title}}</a>
                    </div>
                    @endforeach



                </div>
            </div>
        </div>

        @show

        <div id="content">
            <div class="container">
                @yield('content')
                <div id="sidebar">
                    @section('sidebar')
                    @section('top_sidebar')
                    <div id="search">
                        <form action="{{route('search')}}" method="post" class="d-flex">
                            @csrf
                            <input type="text" placeholder="Search..." name="key_word">
                            <button class="btn btn-success">Search</button>
                        </form>
                    </div>
                    @show
                    <div id="topic">
                        <h1 class="font-black">TOPICS</h1>
                        <div id="list_topic">
                            @foreach($categories as $item)
                            <div class="topic_item">
                                <p class="post_cat" data-id="{{$item->id}}">{{$item->post_cat_title}}</p>
                                <div class="item post_sub_cat_{{$item->id}} pl-3">
                                    <ul class="list-unstyled">
                                        @foreach($item->post_sub_cats as $value)

                                        <li class="border-bottom"> <a href="{{route('post_by_category',[$item->post_cat_slug,$value->post_sub_cat_slug])}}">{{$value->post_sub_cat_title}}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>


                            @endforeach
                        </div>
                    </div>
                    @show

                </div>
            </div>

        </div>




        <div id="footer">
            <div class="container">
                <div id="info">
                    <h1 class="logo"><a href="" class="font-family-logo">CODEADDICT</a></h1>
                    <p class="mt-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quasi possimus dicta porro fugiat ab voluptas quas temporibus consequuntur debitis!</p>
                    <p id="phone"><i class="fas fa-phone-alt"></i> 0916225150</p>
                    <p id="email"><i class="fas fa-envelope"></i> support@gmail.com</p>
                    <div id="social_network">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-instagram-square"></i></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                        <span><i class="fab fa-youtube-square"></i></i></span>
                    </div>


                </div>
                <div id="quick_link">
                    <h1>QUICK LINK</h1>
                    <ul class="font-white">
                        <li>
                            <a href="">Events</a>
                        </li>
                        <li>
                            <a href="">Contact</a>
                        </li>
                        <li>
                            <a href="">Galleries</a>
                        </li>
                        <li>
                            <a href="">Write for us</a>
                        </li>
                        <li>
                            <a href="">Terms and conditions</a>
                        </li>
                    </ul>
                </div>
                <div id="contact">
                    <h1>CONTACT US</h1>
                    <form action="">
                        <input type="text" placeholder="Your email address">
                        <textarea name="" id="" cols="30" rows="5" placeholder="Message"></textarea>
                        <input type="submit" class="font-white">
                    </form>
                </div>

            </div>

        </div>
    </div>
</body>

</html>