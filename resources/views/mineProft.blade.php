<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/miningStyle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/mediaMining.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/fontiran.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
        rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="row  right-left dir_rtl">
        <div class="col-sm-3 right mt-3 ">
            <div class="right-header text-center">

                <select class=" selectpicker mt-3 " id="firstSelect" data-live-search="true"
                    onchange="change()">
                    @foreach($currencies as $currency)
                    <option {{ $currency->symbol == 'BTC'?'selected':'' }}>{{ $currency->symbol }}</option>
                    @endforeach
                </select>
            </div>
            <div class="right-header-2"></div>
            <div class="right-body">
                <div class="font-weight-bold">

                    <div class="hashRateEng ">
                        Hash Rate
                    </div>
                    <div class="hashRate">
                        نرخ هش
                    </div>
                </div>
                <div class="input-group width-90 margin-auto">
                    <input type="text" class="form-control" placeholder=""
                        aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon2"></span>
                </div>

                <div class="font-10">

                    <div class="powerEng text-left">
                        power consumption(w)
                    </div>
                    <div class="powerFa text-right">
                        برق مصرفی
                    </div>
                </div>
                <div class="input-group width-90 margin-auto">
                    <input type="text" class="form-control"
                        aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon2"></span>
                </div>

                <div class="margin-36">
                    <div class="font-10">
                        <p class="costEng text-left">Cost Per KWh</p>
                        <p class="costFa text-right">هزینه هر کیلووات ساعت برق</p>
                    </div>

                    <input type="text" class="form-control input-group-width width-90 pos" />
                </div>
                <div class="margin-36">
                    <div class="font-10">
                        <p class="poolEng text-left">Pool fee(%)</p>
                        <p class="poolFa text-right">کارمزد استخر استخراج</p>
                    </div>
                    <input type="text" class=" form-control input-group-width width-90 pos-1" />
                </div>
            </div>
        </div>
        <div class="left col-sm-8 ">
            <div class="text-right secondHeader">
                <h4> سود خالص ماهانه</h4>
            </div>
            <div class="text-right">
                <p>محاسبات ماهانه</p>
            </div>
            <div class="left-1 row">
                <div class="first">
                </div>
                <div class="second"></div>
                <div class="third text-center pt-2">هزینه برق مصرفی</div>
            </div>
            <div class="left-1 row">
                <div class="first">
                </div>
                <div class="second"></div>
                <div class="third text-center pt-2">کارمزد استخر</div>
            </div>
            <div class="left-1 row">
                <div class="first">
                </div>
                <div class="second"></div>
                <div class="third text-center pt-2">درآمد اصلی</div>
            </div>
            <div class="left-1 row">
                <div class="first"></div>
                <div class="second"></div>
                <div class="third text-center pt-2">درآمد به تومان</div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row dir-rtl">
        <div class="col-sm-3 bottom">
            <div class=" text-center ">
                <p>قیمت دلار سامانه سنا</p>
                <p>111</p>
                <p>قیمت فعلی BTC</p>
                <p class="price_color">$8807.82</p>
                <p class="price dir_rtl">987876980تومان</p>
            </div>
        </div>
        <div class="col-sm-3 bottom">
            <div class="myText">
                <p class=" colorLightGray font-small">الگوریتم</p>
                <p class=" font-small">SHA-256</p>
            </div>
            <div class="myText">
                <p class="colorLightGray font-small">حجم بازار</p>
                <p class=" font-small dir_rtl">159میلیارد دلار</p>
            </div>
            <div class="myText">
                <p class=" colorLightGray font-small">درآمد روزانه شبکه</p>
                <p class=" font-small">$14678987654</p>
            </div>
        </div>
        <div class="col-sm-3 bottom">
            <div class="myText">
                <p class=" colorLightGray font-small">سختی شبکه</p>
                <p class=" font-small">12987654M</p>
            </div>
            <div class="myText">
                <p class=" colorLightGray font-small">زمان بلاک</p>
                <p class=" font-small">11m 3s</p>
            </div>
            <div class="myText">
                <p class=" colorLightGray font-small">درآمد ماهانه شبکه</p>
                <p class=" font-small">$14678987654</p>
            </div>
        </div>
        <div class="col-sm-3 lastBottom">
            <div class="myText">
                <p class=" colorLightGray font-small">نرخ هش کل شبکه</p>
                <p class=" font-small">pH/s 802401</p>
            </div>
            <div class="myText">
                <p class=" colorLightGray font-small">پاداش بلاک</p>
                <p class="font-small dir_rtl">12.78واحد</p>
            </div>
            <div class="myText">
                <p class="colorLightGray font-small">درآمد سالانه شبکه</p>
                <p class="font-small">$1888884678987654</p>
            </div>
        </div>

    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script>
    $(function() {
            $('.selectpicker').selectpicker();
     });
</script>

</html>
