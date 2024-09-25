<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{--    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #c20808;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .logo-title {
            font-family: Trebuchet MS;
            font-size: 36px;
            font-weight: normal;
            display: flex;
            align-items: center;
        }

        .logo-title span {
            font-family: Trebuchet MS;
            font-size: 36px;
            font-weight: bolder; /* Aumenta a espessura da fonte VDD */
            margin-left: 5px;
        }

        .logo-title i {
            margin-left: 0;
            font-size: 36px;
        }

        .ads {
            display: flex;
            align-items: center;
        }

        .ads img {
            max-height: 50px;
            margin-right: 20px;
        }

        .search-box {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 25px;
            padding: 5px 10px;
        }

        .search-box input {
            border: none;
            outline: none;
            font-size: 16px;
            margin-right: 10px;
        }

        .search-box button {
            background-color: #c20808;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 5px 10px;
            cursor: pointer;
        }

        nav {
            background-color: #990000;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
        }

        .container {
            padding: 20px;
            flex: 1;
        }

        .container h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        footer {
            background-color: #333333;
            color: white;
            padding: 10px;
            text-align: left;
            font-size: 14px;
            display: flex;
            flex-direction: column;
        }

        footer p {
            margin: 5px 0;
        }

        .footer-links {
            text-align: left;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .footer-links a::after {
            content: "|";
            margin: 0 10px;
        }

        .footer-links a:last-child::after {
            content: "";
        }

        .social-links {
            text-align: center;
            margin-top: 10px;
        }

        .social-links a {
            color: white;
            margin-right: 10px;
            text-decoration: none;
            font-size: 18px;
        }

        .social-links a:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>
@include('zscrud::cms.header')

<main class="container">
    @yield('content')
</main>

@include('zscrud::cms.footer')
</body>
</html>
