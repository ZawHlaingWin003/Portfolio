<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 | Page Not Found</title>
    <style>
        /*===== GOOGLE FONTS =====*/
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500&family=Playfair+Display:wght@400;500&family=Poppins:wght@200;300;400;500;600&display=swap');

        @import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700");

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            overflow:hidden;
            background-color: #2f2f2f;
        }

        .go-to-back{
            position: absolute;
            top: 30px;
            left: 50px;
        }
        .line-btn{
            position: relative;
            color: #fff;
            text-decoration: none;
            transition: all .3s;
        }
        .line-btn:hover{
            color: #00C896;
        }
        .line-btn::after{
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 1px;
            background: #00C896;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 250ms ease-in;
        }
        .line-btn:hover::after{
            transform: scaleX(1);
            transform-origin: left;
        }

        .container{
            height:100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .sec{
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Playfair Display', serif;
            text-align: center;
        }

        .cog-wheel1 {
            transform:scale(0.5);
        }

        .cog1 {
            width:40vmin;
            height:40vmin;
            border-radius:50%;
            border:6vmin solid #00C896;
            position: relative;
        }

        .top, .down, .left, .right, .left-top, .left-down, .right-top, .right-down{
            width:10vmin;
            height:10vmin;
            background-color: #00C896;
            position: absolute;
        }

        .top{
            top:-14vmin;
            left:9vmin;
        }

        .down{
            bottom:-14vmin;
            left:9vmin;
        }

        .left{
            left:-14vmin;
            top:9vmin;
        }

        .right{
            right:-14vmin;
            top:9vmin;
        }

        .left-top{
            transform:rotateZ(-45deg);
            left:-8vmin;
            top:-8vmin;
        }

        .left-down{
            transform:rotateZ(45deg);
            left:-8vmin;
            top:25vmin;
        }

        .right-top{
            transform:rotateZ(45deg);
            right:-8vmin;
            top:-8vmin;
        }

        .right-down{
            transform:rotateZ(-45deg);
            right:-8vmin;
            top:25vmin;
        }

        .first-four, .second-four{
            font-size:40vmin;
            color: transparent;
            -webkit-text-stroke: 1px rgba(255, 255, 255, .8);
            font-weight: 400;
        }

        .wrong-para{
            font-family: "Montserrat", sans-serif;
            font-weight:600;
            color: #fff;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="sec">
            <h1 class="first-four">4</h1>
            <div class="cog-wheel1">
                <div class="cog1">
                    <div class="top"></div>
                    <div class="down"></div>
                    <div class="left-top"></div>
                    <div class="left-down"></div>
                    <div class="right-top"></div>
                    <div class="right-down"></div>
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>
            <h1 class="second-four">4</h1>
        </div>
        <p class="wrong-para">Uh Oh! Page not found!</p>
    </div>
    <div class="go-to-back">
        <a href="{{ url()->previous() }}" class="line-btn">&larr; Go to Back</a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.1/gsap.min.js"></script>
    <script>
        let t1 = gsap.timeline();
        let t2 = gsap.timeline();
        let t3 = gsap.timeline();

        t1.to(".cog1",
        {
            transformOrigin:"50% 50%",
            rotation:"+=360",
            repeat:-1,
            ease:Linear.easeNone,
            duration:8
        });

        t3.fromTo(".wrong-para",
            {
                opacity:0
            },
            {
                opacity:1,
                duration:1,
                stagger:{
                    repeat:-1,
                    yoyo:true
                }
        });
    </script>
</body>
</html>

