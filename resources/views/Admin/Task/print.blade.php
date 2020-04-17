<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('Admin/paper_dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <title>Print QR COde</title>
</head>
<body>
<div class="content">
    <div class="row">
        <div class="col-md-8 offset-2 text-center">
            <img src="{{ asset('image/QRCode/'.$img) }}" alt="" width="200" height="auto">
        </div>
    </div>
</div>
</body>
</html>
