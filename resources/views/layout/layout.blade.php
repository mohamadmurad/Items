<!DOCTYPE html>
<html lang="ar">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Items') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">


    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body dir="rtl">
<div class="wrapper">

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            الاصناف
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto float-right">
                <li class="nav-item">
                    <a class="nav-link float-right" href="{{route('item')}}">الصفحة الرئيسة </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link float-right" href="#">رابط</a>--}}
{{--                </li>--}}

            </ul>

        </div>
    </nav>
    <!-- Page Content  -->
    <div id="content">

        <div class="container">

            @yield('content')


        </div>


    </div>

    <!-- Footer -->
    <footer class="page-footer font-small bg-dark">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 ">© {{ now()->year }} Copyright:
            <a href="#"> Homsi</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>

    $(document).ready(function () {
        $('#itemsSearch').on('submit', function(e) {
          //  e.preventDefault();
            var computerNo = $("#ComputerNo").val();
            var BarCode = $("#BarCode").val();
            var ModelNo =  $("#ModelNo").val();
            if(computerNo || BarCode || ModelNo){
                $("#itemsSearch").attr('action', '/items');

            }else {
                $("#itemsSearch").attr('action', '/itemsTable');
                $("#itemsSearch").attr('method', 'get');

            }
            return true;

        });

    });


    function resetForm(form) {
        // clearing inputs
        var inputs = form.getElementsByTagName('input');
        for (var i = 0; i<inputs.length; i++) {
            switch (inputs[i].type) {
                // case 'hidden':
                case 'text':
                    inputs[i].value = '';
                    break;
                case 'radio':
                case 'checkbox':
                    inputs[i].checked = false;
            }
        }

        // clearing selects
        var selects = form.getElementsByTagName('select');
        for (var i = 0; i<selects.length; i++)
            selects[i].selectedIndex = 0;

        // clearing textarea
        var text= form.getElementsByTagName('textarea');
        for (var i = 0; i<text.length; i++)
            text[i].innerHTML= '';
        var tabel= document.getElementsByTagName('tabel');
        $("table").remove();

        $("img").remove();
        return false;
    }




</script>
</body>
</html>
