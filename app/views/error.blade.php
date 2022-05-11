<html lang="en">

<head>
    <title>{{ $code }}: {{ $message }}!</title>

    <style>
        .body {
            background: #240046 !important;
        }

        .centeredText {
            left: 0;
            line-height: 200px;
            margin-top: -100px;
            position: absolute;
            text-align: center;
            top: 50%;
            width: 100%;
            color: #5a189a !important;
        }
    </style>
</head>

<body class="body">
<h1 class="centeredText">{{ $code }} | {{ $message }}</h1>
</body>

</html>