<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/fontiran.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>

    <div style="width:70%;margin:auto;background-color:white">
        <p class="text-center mt-3">ماشین حساب محاسبه میزان سودآوری ماینینگ</p>
        <div style="background-color:lightgrey;" class="text-center pt-3">
            <select class="js-example-tags" id="firstSelect" name="firstSelect" style="border-radius:10%">
                @foreach($currencies as $currency)
                <option {{ $currency->symbol == 'BTC'?'selected':'' }}>
                    <span
                        style="background-color:#3f3f94;color:white;padding-left:1%;padding-right:1%;">{{ $currency->symbol }}
                        {{-- <a href="#" style="color:white;text-decoration:none"><i class="fa fa-angle-down"></i></a> --}}
                    </span>
                </option>
                @endforeach
            </select>
            <div style="background-color:white;margin:auto;width:70%" class="text-center mt-3 ">
                <div style="background-color: white;float:right;width:50%;border-left:solid 2px lightgrey">
                    <p class="text-right mr-1">نرخ هش</p>
                    <div class="input-group row">
                        <span class="input-group-addon col-sm-8">
                            <input id="email" type="text" class="form-control" name="email">
                        </span>
                        <select class="col-sm-4">
                            <option>H/s</option>
                            <option>G/s</option>
                            <option>Sol/s</option>
                            <option>Kh/s</option>
                            <option>KSol/s</option>
                            <option>Mh/s</option>
                            <option>Gh/s</option>
                            <option selected>Th/s</option>


                        </select>
                    </div>
                    <p class="text-right mr-1 mt-2">برق مصرفی به وات</p>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input id="email" type="text" class="form-control" name="email">
                        </span>
                        <p class="text-center mt-1 ml-3">W</p>
                    </div>
                    <p class="text-right mr-1 mt-2">هزینه هر کیلووات ساعت برق</p>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input id="email" type="text" class="form-control" name="email">
                        </span>
                        <select>
                            <option selected>صادراتی</option>
                            <option>حرارتی</option>
                            <option>پراکنده</option>
                            <option>خورشیدی</option>
                            <option>صنعتی</option>
                            <option>سایر</option>
                        </select>
                    </div>
                    <p class="text-right mr-1 mt-2">کارمزد استخر استخراج</p>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input id="email" type="text" class="form-control" name="email">
                        </span>
                        <p class="text-center mt-1 ml-3">%</p>
                    </div>
                </div>
                <div style="background-color: white;width:50%">
                    <p class="pt-2"> سود خالص ماهانه</p>
                    <p> 1.45$</p>
                    <p> 16273تومان</p>
                    <p class="mt-2 text-right">محاسبات ماهانه</p>
                    <ul style="list-style-type: none">
                        <li>
                            <p class="float-right">هزینه برق مصرفی</p>
                            <p>677777tooman</p>
                        </li>
                        <li>
                            <p class="float-right">کارمزد استخر</p>
                            <p>677777$</p>
                        </li>
                        <li>
                            <p class="float-right">درآمد اصلی</p>
                            <p>6777BTC</p>
                        </li>
                        <li>
                            <p class="float-right">درآمد به تومان</p>
                            <p>6777تومان</p>
                        </li>
                        <li>
                            <p class="float-right">درآمد به دلار</p>
                            <p>6777$</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div style="background-color:white;margin: auto;width:70%;border-top:solid 2px lightgrey"
                class="text-center">
                <div style="background-color: white;float:right;width:30%;border-left:solid 2px lightgrey">
                    <p class="mt-3">قیمت فعلی BTC</p>
                    <p>77777$</p>
                    <p>44444tooman</p>
                </div>
                <div style="background-color: white;width:70%">
                    <div style="float:right;background:pink;width:33.3%">
                        <p>الگوریتم</p>
                        <p>SHA-256</p>
                        <p>حجم بازار</p>
                        <p>۱۶۷ میلیارد دلار</p>
                        <p>درآمد روزانه شبکه</p>
                        <p>۱۲۲دلار</p>
                    </div>

                    <div style="float:right;background:purple;width:33.3%">
                            <p>سختی شبکه</p>
                            <p>13456789M</p>
                            <p>زمان بلاک</p>
                            <p>9 m 36s</p>
                            <p>درآمد ماهانه شبکه</p>
                            <p>54678888888$</p>
                    </div>
                    <div style="float:right;background:plum;width:33.3%">
                            <p>نرخ هش کل شبکه</p>
                            <p>1023333ph/s</p>
                            <p>پاداش بلاک</p>
                            <p>12.72واحد</p>
                            <p>درآمد سالانه شبکه</p>
                            <p>788888888888$</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script>
    $(".js-example-tags").select2({
            tags: true
        });
</script>

</html>
