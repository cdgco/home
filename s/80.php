<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
<link rel="manifest" href="../favicon/manifest.json">
<link rel="mask-icon" href="../favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="../favicon/favicon.ico">
<meta name="msapplication-config" content="../favicon/browserconfig.xml">
<meta name="theme-color" content="#f5f5f5">
<title>CDG Home</title>
<style>
    #frame {
        position: fixed;
        top: 0px;
        left: 0px;
        bottom: 0px;
        right: 0px;
        width: 125%;
        height: 125%;
        border: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        z-index: 999999;
    }
    
    #frame {
        -ms-zoom: 0.8;
        -moz-transform: scale(0.8);
        -moz-transform-origin: 0 0;
        -o-transform: scale(0.8);
        -o-transform-origin: 0 0;
        -webkit-transform: scale(0.8);
        -webkit-transform-origin: 0 0;
    }

</style>
</style>
    <script>
    function checkScale() {
    if (window.outerWidth > 1000) {
            if (window.innerHeight > 840 && window.innerHeight <= 920) {
                window.location = "90.php";
            }
            if (window.innerHeight > 700 && window.innerHeight <= 750) {
                window.location = "75.php";
            }
            if (window.innerHeight > 620 && window.innerHeight <= 700) {
                window.location = "67.php";
            }
            if (window.innerHeight > 560 && window.innerHeight <= 620) {
                window.location = "60.php";
            }
            if (window.innerHeight > 920 || window.outerWidth > 1650) {
                window.location = "../index.php";
            }
            }
            if (window.innerHeight <= 560 || window.outerWidth < 1000) {
                window.location = "../mobile";
            
            }
        }
    window.onload = checkScale;
    window.onresize = checkScale;
        
    </script>
<iframe src="../index.php" id="frame">
    Your browser doesn't support iframes
</iframe>