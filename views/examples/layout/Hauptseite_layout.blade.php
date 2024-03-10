<?php
?>

        <!DOCTYPE html>
<html lang="de">
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/Style_Header.css" type="text/css">
    <link rel="stylesheet" href="css/Style_Footer.css" type="text/css">
    <link rel="stylesheet" href="css/Style_Body.css" type="text/css">
    <link rel="stylesheet" href="css/Style_Meal.css" type="text/css">

</head>
<body>

@yield('header')
@endsection

@yield('main')
@endsection

@yield('main1')
@endsection

@yield('footer')
@endsection

</body>
</html>