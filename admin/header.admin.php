<?php require 'db.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Web</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            padding: 20px 0;
            color: #333;
        }

        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #555;
        }

        .animation {
            width: 100%;
            height: 10px;
            position: relative;
            overflow: hidden;
        }

        .start-home {
            background: #4CAF50;
            animation: home 4s linear infinite;
        }

        @keyframes home {
            0% {
                left: -100%;
            }

            50% {
                left: 100%;
            }

            100% {
                left: 100%;
            }
        }

        table {
            border-collapse: collapse;
            width: 100%;
            color: #333;
            font-size: 14px;
            background-color: white;
        }

        th,
        td,
        h2 {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        button {
            padding: 5px 10px;
            background-color: #337ab7;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #286090;
        }
    </style>
</head>

<body>
    <h1>ADMIN WEB</h1>

    <nav>
        <a href="#">ALL ORDERS</a>
        <a href="#">PRODUCT</a>
        <a href="#">USER</a>
        <a href="#">ABOUT US</a>
        <a href="#">Contact</a>
        <div class="animation start-home"></div>
    </nav>