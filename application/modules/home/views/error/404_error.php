<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-22447399-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Không tìm thấy dữ liệu Error 404</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAPXgAKW6DmooahkxPmKGWLhTcAWu5A4Db0_f4DEEtXyFOIQeKbhTwYcNS9G8T3HI92P7tX1ne3ZyIow"></script>
        <script type="text/javascript">
    google.load('mootools', '1.3.2');
        </script>
        <script>
            window.addEvent('domready', function() {
                var target = $('icon');
                var imgdrop = new Fx.Morph(target, {
                    transition: Fx.Transitions.Bounce.easeOut,
                    duration: 1000,
                    fps: 120
                });
                target.setStyles({
                    top: -128,
                    left: 100
                });
                imgdrop.start({
                    top: 180
                });
            });
        </script>
        <style>
            body {font-size:18px;font-family:Verdana, Arial, Helvetica, sans-serif;}
            .error {
                float:left;
                margin:300px 0 0 120px;
                font-family:"Myriad Web Pro", Arial, Helvetica, sans-serif;
                font-size:42px;
                letter-spacing:-3px;
                font-weight:bold;
            }
            .text {
                float:left;
                margin:100px 0 0 50px;
                font-size:24px;
                font-family:Georgia, "Times New Roman", Times, serif;
                letter-spacing:-1px;
                color:#333;
            }
            .quaylai{
                cursor: pointer;
            }
            .home{
                text-decoration: none;
            }
            .quaylai:hover, .home:hover{
                text-decoration: underline;
            }
        </style>
    </head>
    <body>

        <img id="icon" src="https://lh4.googleusercontent.com/-Y9IKNqPexsg/T6T0EYky18I/AAAAAAAAAqo/hVIkuqE0iwo/s128/404_128.png" style="position:absolute" />
        <div class="error">
            Opp~  404
        </div>
        <div class="text">
            Không tìm thấy dữ liệu,vui lòng thử lại...
            <p><a class="quaylai" title="Trở lại" onclick="window.history.back()" >Quay lại</a></p>
            <p><a class="home" title="Trang chủ" href="<?php echo base_url(); ?>">Trang chủ</a></p>
        </div>
    </body>
</html>