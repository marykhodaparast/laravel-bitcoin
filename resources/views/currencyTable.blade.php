<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <link href="{{ asset('css/fontiran.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>

<body style="font-family: IRANSans;font-size:13px">
    <table class="myTable table">
        {{--  <thead>  --}}
        <tr class="trHeader">
            <th scope="col">#</th>
            <th scope="col" class="light_font">ارز دیجیتال</th>
            <th scope="col" class="light_font">قیمت</th>
            <th scope="col" class="light_font">قیمت ریالی</th>
            <th scope="col" class="light_font">حجم بازار</th>
            <th scope="col" class="light_font">معاملات روزانه </th>
            <th scope="col" class="light_font">روزانه </th>
            <th scope="col" class="light_font">هفتگی </th>

        </tr>
        {{--  </thead>  --}}
        <tbody>
            @foreach($currencies as $currency)
            <tr>
                <th scope="row">{{ $currency->id }}</th>
                <td>{{ str_limit($currency->name, $limit = 12, $end = '...') }}</td>
                <td>${{ number_format($currency->price,2,'.','') }}</td>
                <td class="rial">{{ number_format($currency->price*$toman,2,'.',',') }}
                    <p class="riz">تومان</p>
                </td>
                <td>{{ number_format($currency->market_cap/1000000000,3,'.','') }}
                    <p class="riz">میلیارد دلار</p>
                </td>
                <td>{{ number_format($currency->volume_24h/1000000000,3,'.','') }}
                    <p class="riz">میلیارد دلار</p>
                </td>
                <td class={{ $currency->percent_change_24h>0?"green":"red" }}>
                    {{ number_format($currency->percent_change_24h,2,'.','') }}</td>
                <td class={{ $currency->percent_change_7d>0?"green":"red" }}>
                    {{ number_format($currency->percent_change_7d,2,'.','') }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="text-center">
        {!! $currencies->render() !!}
    </div>
</body>
<script type="text/javascript" src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous">
</script>
<script src="{{ asset('js/persianNum.jquery.js') }}"></script>
<script type="text/javascript">
    $('body').persianNum();
</script>

</html>
