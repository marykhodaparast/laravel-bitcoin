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

<body style="font-family: IRANSans;">
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
                <th scope="row">{{ $currency->id-1 }}</th>
                <td>{{ str_limit($currency->name, $limit = 12, $end = '...') }}</td>
                <td>${{ number_format($currency->price,2,'.','') }}</td>
                <td>{{ number_format($currency->price*$toman,2,'.','') }}</td>
                <td>{{ number_format($currency->market_cap/1000000000,3,'.','') }}</td>
                <td>{{ number_format($currency->volume_24h/1000000000,3,'.','') }}</td>
                <td>{{ number_format($currency->percent_change_24h,2,'.','') }}</td>
                <td>{{ number_format($currency->percent_change_7d,2,'.','') }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {!! $currencies->render() !!}
</body>
<script type="text/javascript" src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>

</html>
