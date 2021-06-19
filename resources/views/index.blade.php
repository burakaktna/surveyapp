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
        <h1 class="df-title">SurveyApp</h1>
        <div class="row mb-2">
            <div class="col-12" id="survey-desc">
                <p class="df-lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consectetur
                    corporis
                    deleniti eius error exercitationem facere, hic maxime modi molestias neque nesciunt nisi obcaecati
                    provident
                    quasi recusandae tenetur vel voluptatum?</p>
                <span class="badge badge-warning tx-20 mt-0">Tüm sorular yanıtlanmazsa hata ekranı görürsünüz.</span>
            </div>
            <div class="col-6" id="adDiv" style="display: none">
                <img class="img-fluid float-right" style="max-width: 600px; max-height: 400px; display: none" id="adImg"
                     alt="Reklam" src="">
            </div>
        </div>


        <div class="mg-b-25">
            <form id="surveyForm" action="{{ route('store_survey') }}" method="post">
                <input type="hidden" name="seen_ad" id="seenAd">
                <div id="survey-wizard">
                    <h3>{{ \App\Models\Survey::whereType('semantic')->firstOrFail()->question }}</h3>
                    <section>
                        <p class="mg-b-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur
                            corporis
                            cum cumque distinctio doloribus esse, eum excepturi id impedit maxime obcaecati porro quasi
                            reiciendis repellat reprehenderit repudiandae suscipit vero voluptatibus.</p>

                        <x-semantic-survey-component/>
                    </section>
                    <h3>{{ \App\Models\Survey::whereType('likert')->firstOrFail()->question }}</h3>
                    <section>
                        <p class="mg-b-20">Wonderful transition effects.</p>
                        <x-likert-survey-component/>
                    </section>
                    <h3>{{ \App\Models\Survey::whereType('advertisement')->firstOrFail()->question }}</h3>
                    <section>
                        <p class="mg-b-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur
                            corporis
                            cum cumque distinctio doloribus esse, eum excepturi id impedit maxime obcaecati porro quasi
                            reiciendis repellat reprehenderit repudiandae suscipit vero voluptatibus.</p>

                        <x-advertisement-survey-component/>
                    </section>
                </div>
            </form>
        </div><!-- df-example -->

        <footer class="content-footer">
            <div>
                <span>&copy; {{ date('Y') }} Ümit SARIGÖL Anket Programı </span>
            </div>
            <div>
                <span><a href="https://www.leafletsoft.com.tr">LeafletSoft</a> Yazılım Teknolojileri ile Güçlendirildi!</span>
            </div>
        </footer><!-- content-footer -->

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
