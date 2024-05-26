<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Response</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #478ac9;
            color: #ffffff;
            padding: 5px;
            text-align: center;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .content {
            padding: 20px;
            text-align: left;
        }

        .footer {
            background-color: #478ac9;
            color: #ffffff;
            padding: 10px 20px;
            text-align: left;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div style="border: solid 1px rgba(0, 0, 0, 0.1);">
            <div class="header">
                <h2>Xin chào, {{ $post->author->name }}</h2>
            </div>
            <div class="content">
                @yield('content')
            </div>
            <div class="footer">
                <p>Trân trọng,</p>
                <p>Đội ngũ hỗ trợ, nhachothue.online</p>
            </div>
        </div>
    </div>
</body>

</html>
