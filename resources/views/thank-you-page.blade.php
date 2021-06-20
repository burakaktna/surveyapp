<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Ümit SARIGÖL Anket Çalışması">
    <meta name="author" content="LeafletSoft">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <title>Ümit SARIGÖL Anket Çalışması</title>

    <!-- vendor css -->
    <link href="{{ asset('lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/typicons.font/typicons.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/prismjs/themes/prism-vs.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ion-rangeslider/css/ion.rangeSlider.min.css') }}" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashforge.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashforge.demo.css') }}">

</head>
<body class="pos-relative" data-spy="scroll" data-offset="120">

<div class="content mt-1">
    <div class="container">
        <div class="container ht-100p">
            <div class="ht-100p d-flex flex-column align-items-center justify-content-center">
                <h4 class="tx-20 tx-sm-24">Katılımınız İçin Teşekkür Ederiz!</h4>
            </div>
        </div><!-- container -->

        @include('includes.footer')

    </div><!-- container -->
</div><!-- content -->

<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lib/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('lib/prismjs/prism.js') }}"></script>
<script src="{{ asset('lib/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ asset('lib/parsleyjs/parsley.min.js') }}"></script>


<script src="{{ asset('assets/js/dashforge.js') }}"></script>
<script>
    $(function () {
        'use strict'
        $('#survey-wizard').steps({
            headerTag: 'h3',
            bodyTag: 'section',
            autoFocus: true,
            titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
            onStepChanging: function (event, currentIndex, newIndex) {
                if (newIndex === 2) {
                    $.get('api/get-random-advertisement', function (data) {
                        data = JSON.parse(data);
                        $('#seenAd').val(data.id);
                        $('#adImg').attr('src', data.url)
                    }).done(function () {
                        $('#survey-desc').removeClass('col-12');
                        $('#survey-desc').addClass('col-6');
                        $('#adDiv').show();
                        $('#adImg').show();
                    });
                }
                return true;
            },
            onFinished: function () {
                $('#surveyForm').submit()
            }
        });

    });
</script>
</body>
</html>
