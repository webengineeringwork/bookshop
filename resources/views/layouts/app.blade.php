<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>book shop</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    @if(Request::getPathInfo() != '/cart')
        <link href="//cdn.shopify.com/s/files/1/0880/2454/t/2/assets/timber.scss.css?10061947258110571957" rel="stylesheet" type="text/css" media="all" />
        <link href="//cdn.shopify.com/s/files/1/0880/2454/t/2/assets/theme.scss.css?10061947258110571957" rel="stylesheet" type="text/css" media="all" />
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
            font-size: 1.5em;
            font-weight: 400;
        }

        .fa-btn {
            margin-right: 6px;
        }

        .searchform {
            width: 50%;
            margin: auto;
            margin-top: 4%;
            text-align: center;
        }

        .search-query {
            width: 70%;
            margin: auto;
            border-color: #c0c0c0;
            background: #ffffff;
        }

        #cart {
            margin-bottom: 10%;
        }

        hr {
            border-top: solid #1c1d1d;
        }

        #AddToCart {
            border-radius: 0px;
        }
        #refresh {
            width: 10%;
            margin-left: 90%;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Book Shop
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/home') }}"><i class="fa fa-btn fa-home"></i>Home</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div>
        @yield('content')
    </div>

    <!-- 尾部 -->
    <nav class="navbar navbar-default navbar-static-top">
        @section('footer')
            <div class="jumbotron" style="margin:0;" align="center">
                <blockquote class="blockquote">
                    <p class="mb-0">
                        <span>  @2018 github.com/webengineeringwork  </span>
                        <span> <a href="https://github.com/webengineeringwork">Github</a></span>
                    </p>
                    <footer class="blockquote-footer">
                        <span> Project Developer </span>
                        <span> <a href="https://github.com/fenlan">fenlan</a> </span>
                        <span> <a href="https://github.com/fanzhonghao">fanzhonghao</a> </span>
			 <span> <a href="https://github.com/Bosssheep">Bosssheep</a> </span>
			<span> <a href="https://github.com/FollowPledge">FollowPledge</a> </span>
			<span> <a href="https://github.com/LazuriteMoon">LazuriteMoon</a> </span>
			<span> <a href="https://github.com/ShaneHolmes">ShaneHolmes</a> </span>
			<span> <a href="https://github.com/wumingGH">wumingGH</a> </span>
			<span> <a href="https://github.com/YOYO0126">YOYO0126</a> </span>
                        <cite title="Source Title"><span> Reference </span>
                            <span> <a href="https://www.shopbookshop.com/collections/books"> bookshop </a> </span>
                        </cite>
                    </footer>
                </blockquote>
            </div>
        @show
    </nav>

    <!-- JavaScripts -->
    <script type="text/javascript">
        function amountChange(cartID) {

            var amount = document.getElementById('amount' + cartID);
            var price = document.getElementById('price' + cartID);
            var Subtotal = document.getElementById('Subtotal' + cartID);
            var total = document.getElementById('total');
            total.innerText = parseInt(total.innerText) - parseInt(Subtotal.innerText);
            Subtotal.innerText = parseInt(amount.value) * parseInt(price.innerText);
            total.innerText = parseInt(total.innerText) + parseInt(Subtotal.innerText);
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
