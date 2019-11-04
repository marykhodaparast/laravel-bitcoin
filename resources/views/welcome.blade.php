<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div style="text-align:center;margin-top:100px;">
        <div style="padding-left:5%;padding-right:5%;">
            <input type="number" name="first" id="first" onkeyup="change()" />
            <select class="js-example-tags" id="firstSelect" name="firstSelect">
                @foreach($currencies as $currency)
                <option>
                    <span style="background-color:#3f3f94;color:white;padding-left:1%;padding-right:1%;">{{ $currency->asset_id }}
                        {{-- <a href="#" style="color:white;text-decoration:none"><i class="fa fa-angle-down"></i></a> --}}
                    </span>
                </option>
                @endforeach

            </select>
            <div style="width:10%;height:auto;background-color:pink;margin-left:auto;margin-right:216px;">

            </div>
        </div>
        <a href="#"><i class="fa fa-exchange" style="transform:rotate(90deg);margin-top:20px"></i></a>
        <div style="margin-top:20px;">
            <input type="number" name="second" id="second" />
            <select class="js-example-tags" id="secondSelect" name="selectSelect">
                @foreach($currencies as $currency)
                <option>
                    <span style="background-color:#3f3f94;color:white;padding-left:1%;padding-right:1%;">{{ $currency->asset_id }}
                        {{-- <a href="#" style="color:white;text-decoration:none"><i class="fa fa-angle-down"></i></a> --}}
                    </span>
                </option>
                @endforeach
            </select>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
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
                //data: [$('#first').val(),$('#firstSelect').val(),$('secondSelect').val()],
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

</html>