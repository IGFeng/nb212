<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>留言板-心系武汉</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link type="text/css" href="./materialize.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js">
        </script>
        <script type="text/javascript" src="materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="./css.css" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
            body{
                background-image:url("pictures/大桥.png");
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                  武汉加油
                </div>

                <div class="links">
                    <a href="{{url('index')}}">浏览留言</a>
                    <a href="{{url('add')}}">签写留言</a>
                    <a href="{{url('login')}}">登陆</a>
                    <a href="{{url('trans')}}">注册</a>
                </div>
                <hr>
                <p style="color:ghostwhite;">Design by 212</p>
            </div>
            <div id="typeword">
                <h3>坚持才是胜利，武汉加油，奥利给!!</h3>
            </div>
        </div>
        <div class="hiddendiv common"></div>
    </body>
</html>
