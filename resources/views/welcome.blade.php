<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/mediaWelcome.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/fontiran.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
        rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>

<body>
    <div class="main mt-3 h-75 ">
        <div class="header"> </div>
        <div class="secondHeader"> </div>

        <div class="row mt-5 mainInp">
            <input type="number" name="first" id="first" onkeyup="change()" class="col-xs-5 col-sm-6 border beside" />
            <select class=" selectpicker col-xs-7 col-sm-6 " id="firstSelect" data-live-search="true" onchange="change()">
                <option data-tokens="BTC">BTC</option>
                <option data-tokens="LTC">LTC</option>
                <option data-tokens="USD">USD</option>
                @foreach($currencies as $currency)
                <option {{ $currency->symbol == 'BTC'?'selected':'' }}>{{ $currency->symbol }}</option>
                @endforeach

            </select>

        </div>
        <div class="row  mainInp div2">
            <input type="number" name="second" id="second" onkeyup="change()" class="col-xs-5 col-sm-6 input2 beside" />
            <select class=" selectpicker col-xs-7 col-sm-6" id="secondSelect" data-live-search="true" onchange="change()">
                <option data-tokens="BTC">BTC</option>
                <option data-tokens="LTC">LTC</option>
                <option data-tokens="USD">USD</option>
                @foreach($currencies as $currency)
                <option {{ $currency->symbol == 'ETH'?'selected':'' }}>{{ $currency->symbol }}</option>
                @endforeach

            </select>

        </div>
    </div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script>
    $(".js-example-tags").select2({
        tags: true
    });
</script>
<script type="text/javascript">
    function change() {
        if ($('#first').val()) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('ajaxResponse') }}",
                data: {
                    first: $('#first').val(),
                    second: $('#firstSelect').val(),
                    third: $('#secondSelect').val()
                },
                async: false,
                success: function(data) {
                    console.log("success ", data);
                    $('#second').val(data);
                },
                error: function(data) {
                    console.log("error ", data.responseText);

                }
            });
        }
    }
</script>
<script>
    $(function() {
            $('.selectpicker').selectpicker();
     });
</script>

</html>
