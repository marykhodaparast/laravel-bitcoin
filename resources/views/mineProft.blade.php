<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/fontiran.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/miningStyle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/mediaMining.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <div class="row">

        <div class="left">
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
        <div class="col-3 right mt-3">
            <div class="right-header text-center">
                <h1>نوع ارز</h1>
            </div>
            <div class="right-header-2"></div>
            <div class="right-body">
                <div class="row font-weight-bold">

                    <div class="col-8 hashRateEng ">
                        Hash Rate
                    </div>
                    <div class="col-4 hashRate">
                        نرخ هش
                    </div>
                </div>
                <div class="input-group mb-3 pt-2 input-group-width ">
                    <input type="text" class="form-control" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text inpGroupTxt" id="basic-addon2"></span>
                    </div>
                </div>
                <div class="row font-10">

                    <div class="col-8">
                        power consumption(w)
                    </div>
                    <div class="col-4">
                        برق مصرفی
                    </div>
                </div>
                <div class="input-group mb-3 input-group-width">
                    <input type="text" class="form-control" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text inpGroupTxt" id="basic-addon2"></span>
                    </div>
                </div>

                <div>
                    <div class="row font-10">
                        <p class="col-7">Cost Per KWh</p>
                        <p class="col-5">هزینه هر کیلووات ساعت برق</p>
                    </div>

                    <input type="text" class="form-control input-group-width" />
                </div>
                <div>
                    <div class="row font-10 mt-2">
                        <p class="col-7">Pool fee(%)</p>
                        <p class="col-5">کارمزد استخر استخراج</p>
                    </div>
                    <input type="text" class=" form-control input-group-width" />
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="row">
        <div class="col-3 bottom">
            <div>
                <p class="text-right colorLightGray font-small">نرخ هش کل شبکه</p>
                <p class="text-right font-small">pH/s 802401</p>
            </div>
            <div>
                <p class="text-right colorLightGray font-small">پاداش بلاک</p>
                <p class="text-right font-small dir_rtl">12.78واحد</p>
            </div>
            <div>
                <p class="text-right colorLightGray font-small">درآمد سالانه شبکه</p>
                <p class="text-right font-small">$1888884678987654</p>
            </div>
        </div>
        <div class="col-3 bottom">
            <div>
                <p class="text-right colorLightGray font-small">سختی شبکه</p>
                <p class="text-right font-small">12987654M</p>
            </div>
            <div>
                <p class="text-right colorLightGray font-small">زمان بلاک</p>
                <p class="text-right font-small">11m 3s</p>
            </div>
            <div>
                <p class="text-right colorLightGray font-small">درآمد ماهانه شبکه</p>
                <p class="text-right font-small">$14678987654</p>
            </div>
        </div>
        <div class="col-3 bottom">
            <div>
                <p class="text-right colorLightGray font-small">الگوریتم</p>
                <p class="text-right font-small">SHA-256</p>
            </div>
            <div>
                <p class="text-right colorLightGray font-small">حجم بازار</p>
                <p class="text-right font-small dir_rtl">159میلیارد دلار</p>
            </div>
            <div>
                <p class="text-right colorLightGray font-small">درآمد روزانه شبکه</p>
                <p class="text-right font-small">$14678987654</p>
            </div>
        </div>
        <div class="col-3 bottom">
            <div class=" text-center ">
                <p>قیمت دلار سامانه سنا</p>
                <p>111</p>
                <p>BTCقیمت فعلی</p>
                <p class="price_color">$8807.82</p>
                <p class="price dir_rtl">987876980تومان</p>
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
