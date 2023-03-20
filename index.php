<!doctype html>
<html lang="cs">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XLWE1FTFHS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-XLWE1FTFHS');
    </script>

    <title>caffey.cz - zkracovač URL adres</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="title" content="caffey.cz - zkracovač URL adres - URL Café">
    <meta name="description" content="Zkracovač URL adres, který vám umožní zkracovat URL adresy a sdílet je s ostatními. Služba je poskytována zdarma.">
    <meta name="keywords" content="url, shortener, zkracovac, adres, zkratit, pekna, adresa">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="skerik.me - Filip Skerik">
    <link rel=“canonical” href="https://caffey.cz" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://caffey.cz">
    <meta property="og:title" content="Zkracovač URL adresy - caffey.cz">
    <meta property="og:description" content="Zkracovač URL adres, který vám umožní zkracovat URL adresy a sdílet je s ostatními.">
    <meta property="og:image" content="https://caffey.cz/url_cafe_full_sized_logo.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://caffey.cz">
    <meta property="twitter:title" content="Zkracovač URL adresy - caffey.cz">
    <meta property="twitter:description" content="Zkracovač URL adres, který vám umožní zkracovat URL adresy a sdílet je s ostatními.">
    <meta property="twitter:image" content="https://caffey.cz/url_cafe_full_sized_logo.png">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
    <meta name="apple-mobile-web-app-title" content="URL Caf&eacute;">
    <meta name="application-name" content="URL Caf&eacute;">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">

	<style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>

	<script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/service-worker.js');
            });
        }
	</script>
</head>


<body>
    <div class="container mt-5 pl-lg-5 pt-lg-5">
        <a href="/"><img src="/logo.png" alt="" class="img-fluid" style="max-width:200px"></a>
        <?php
        require 'app.php';
        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        // Get the text field
        var copyText = document.getElementById("myInput");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        function myFunction() {
            // Get the text field
            var copyText = document.getElementById("myInput");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);
        }
    </script>
</body>

</html>
