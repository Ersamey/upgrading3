<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messaging Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Wendy+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        html {
            scroll-behavior: auto !important;
        }

        .wendy-one-regular {
            font-family: "Wendy One", serif;
            font-weight: 400;
            font-style: normal;
        }

        .titan-font {
            font-family: 'Titan One', cursive;
        }
    </style>

</head>

<body class="font-sans">
    <?= $this->include('layout/navbar') ?>

    <?= $this->renderSection('content') ?>

    <?= $this->include('layout/footer') ?>

    <script>
        // Smooth scroll for navigation
        $(document).ready(function() {
            $('a[href^="#"]').on('click', function(e) {
                e.preventDefault();
                var target = $(this.hash);
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800);
            });
        });
    </script>
</body>

</html>