<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('resources/css/admin/style.css')}}">
    <base href="http://localhost:8080/TheCodeholic/">
    <script src="{{asset('resources/js/jquery-3.5.1.min.js')}}"></script>
    <script src="public/js/app.js"></script>

    <!-- ------Carousel----- -->
    <link rel="stylesheet" href="slider/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="slider/owlcarousel/assets/owl.theme.default.min.css">
    <script src="slider/jquery.min.js"></script>
    <script src="slider/owlcarousel/owl.carousel.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Sansita+Swashed:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
    <script src="{{url('resources/plugins/ckeditor/ckeditor.js')}}"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">



</head>

<body>
    <script>

    </script>
    <div id="wrapper">
        <div id="header">
            <div class="container">
                <div id="logo">
                    <h1><a href="" class="font-family-logo">CODEADDICT</a></h1>
                </div>


                <div id="menu">
                    <div class="item"><a href="?controller=Post&action=List_Post">Home</a> </div>
                    <div class="item"><a href="">About</a></div>
                    <div class="item"><a href="">Services</a></div>
                    <!-- <div class="item">
                        <a href=""><i class="fas fa-angle-down"></i> </a>
                        <div id="info_user">
                            <a href="1" class="font-black">Dashboard</a>
                            <a href="?controller=Logout&action=Logout" class="font-red">Logout</a>
                        </div>

                    </div> -->
                    <div class="item"><a href="{{url('admin/logout')}}">Logout</a></div>

                </div>
                <a href="" class="d-block font-white" id="menu_icon"><i class="fas fa-bars"></i>
                </a>


                <div id="menu_respon">
                    <div class="item"><a href="?controller=Home&action=Index">Home</a> </div>
                    <div class="item"><a href="">About</a></div>
                    <div class="item"><a href="">Services</a></div>
                    <div class="item">
                        <a href="">Thanh Luan <i class="fas fa-angle-down"></i> </a>
                        <div id="info_user" class="d-none">
                            <a href="https://htmlcolorcodes.com/" class="font-black">Dashboard</a>
                            <a href="{{route('logout')}}" class="font-red">Logout</a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div id="content">
            <div id="sidebar">
                <a href="{{route('admin.post.index')}}" class="item">Manage Posts</a>
                <a href="?controller=User&action=List_User" class="item">Manage Users</a>
                <a href="{{route('admin.category.index')}}" class="item">Manage Topics</a>

            </div>
            <div id="body">
                <div class="container">
                    @yield('body')

                </div>
            </div>
        </div>
        <!-- </div>

<body> -->
        <div id="footer">
            <div class="container">
                <i class="far fa-copyright"></i> CODEADDICT NGUYEN THANH LUAN

            </div>
        </div>
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>