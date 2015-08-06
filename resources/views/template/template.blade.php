<!DOCTYPE html>
<html>
    <head lang="en">
        <base href="{{asset('')}}">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

        <link href="assets/css/custom.css" rel="stylesheet">

        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>

    <!-- Begin page content -->
    <div class="container">
    <h5>Branch:MASTER</h5>
        @yield('mainContent')
    </div>

    <footer class="footer">
        <div class="container">
            {{Session::get('company_code')}}

        </div>
    </footer>

    </body>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="assets/js/custom.js"></script>

</html>