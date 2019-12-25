<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
        <div class="col-lg-3  right mt-3 ">
            <div class="right-header text-center">

                <select class=" selectpicker mt-3 " id="firstSelect" data-live-search="true">
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
                {{--  <form method="POST">  --}}
                <div class="input-group width-90 margin-auto">
                    <input type="text" class="form-control" id="hash" placeholder="" aria-describedby="basic-addon2"
                        value="16">
                    <span class="input-group-addon p-0" id="basic-addon2">
                        <select name="hash_rates" id="hash_rates">
                            @foreach($hash_rates as $hash_rate)
                            <option {{ $hash_rate->name == 'Th/s'?'selected':'' }}>{{ $hash_rate->name }}</option>
                            @endforeach
                        </select>
                    </span>
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
                    <input type="text" class="form-control" id="power" aria-describedby="basic-addon2" value="1400"
                        onkeyup="powerCost()">
                    <span class="input-group-addon" id="basic-addon2">
                        W
                    </span>
                </div>

                <div class="margin-36">
                    <div class="font-10">
                        <p class="costEng text-left">Cost Per KWh</p>
                        <p class="costFa text-right">هزینه هر کیلووات ساعت برق</p>
                    </div>
                </div>
                <div class="input-group width-90 margin-auto x">
                    <input type="text" class="form-control" id="cost" name="cost" aria-describedby="basic-addon2"
                        value="90" onkeyup="powerCost()">
                    <span class="input-group-addon p-0" id="basic-addon2">
                        <select name="costPer" id="costPer" onchange="test()">
                            @foreach($costs as $cost)
                            <option {{ $cost->name == 'صنعتی'?'selected':'' }}>{{ $cost->name }}</option>
                            @endforeach
                        </select>
                    </span>
                </div>
                <div class="margin-36">
                    <div class="font-10">
                        <p class="poolEng text-left">Pool fee(%)</p>
                        <p class="poolFa text-right">کارمزد استخر استخراج</p>
                    </div>
                </div>
                <div class="input-group width-90 margin-auto x">
                    <input type="text" class="form-control" id="wage" aria-describedby="basic-addon2" value="1">
                    <span class="input-group-addon" id="basic-addon2">
                        %
                    </span>
                </div>
            </div>
        </div>
        {{--  </form>  --}}
        <div class="left col-lg-8  ">
            <div class="text-right secondHeader">
                <h4> سود خالص ماهانه</h4>
                <p class="price_color font-weight-bold">$75.30</p>
                <p class="dir_rtl">865,967 تومان</p>
            </div>
            <div class="text-right">
                <p>محاسبات ماهانه</p>
            </div>
            <div class="left-1 row">
                <div class="first dir_rtl text-right" id="computePowerCost">90,720 تومان</div>
                <div class="third text-center pt-2">هزینه برق مصرفی</div>
            </div>
            <div class="left-1 row">
                <div class="first text-right">$0.840304 </div>
                <div class="third text-center pt-2">کارمزد استخر</div>
            </div>
            <div class="left-1 row">
                <div class="first text-right">0.009648 BTC</div>
                <div class="third text-center pt-2">درآمد اصلی</div>
            </div>
            <div class="left-1 row">
                <div class="first text-right dir_rtl">966,350 تومان</div>
                <div class="third text-center pt-2">درآمد به تومان</div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row dir-rtl secondFoot">
        <div class="col-sm-3 bottom">
            <div class=" text-center ">
                <p>قیمت دلار سامانه سنا</p>
                <p class="dir_rtl">11,500تومان</p>
                <p>قیمت فعلی BTC</p>
                <p class="price_color font-weight-bold">$8709.30</p>
                <p class="price dir_rtl">100,156,967تومان</p>
            </div>
        </div>
        <div class="col-sm-3 bottom">
            <div class="myText">
                <p class=" colorLightGray font-small">الگوریتم</p>
                <p class=" font-small">SHA-256</p>
            </div>
            <div class="myText">
                <p class="colorLightGray font-small">حجم بازار</p>
                <p class=" font-small dir_rtl">157میلیارد دلار</p>
            </div>
            <div class="myText">
                <p class=" colorLightGray font-small">درآمد روزانه شبکه</p>
                <p class=" font-small">$17,109,243.67</p>
            </div>
        </div>
        <div class="col-sm-3 bottom">
            <div class="myText">
                <p class=" colorLightGray font-small">سختی شبکه</p>
                <p class=" font-small">12,720,005M</p>
            </div>
            <div class="myText">
                <p class=" colorLightGray font-small">زمان بلاک</p>
                <p class=" font-small">9m 19s</p>
            </div>
            <div class="myText">
                <p class=" colorLightGray font-small">درآمد ماهانه شبکه</p>
                <p class=" font-small">$1513,277,309.96</p>
            </div>
        </div>
        <div class="col-sm-3 lastBottom">
            <div class="myText">
                <p class=" colorLightGray font-small">نرخ هش کل شبکه</p>
                <p class=" font-small">pH/s 97,731.68</p>
            </div>
            <div class="myText">
                <p class=" colorLightGray font-small">پاداش بلاک</p>
                <p class="font-small dir_rtl">12.71واحد</p>
            </div>
            <div class="myText">
                <p class="colorLightGray font-small">درآمد سالانه شبکه</p>
                <p class="font-small">$6,244,873,937.90</p>
            </div>
        </div>

    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript">
    {{--  function change() {
        //if ($('#first').val()) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('ajaxResponse') }}",
                data: {
                    first: $('#hash').val(),
                    second: $('#hash_rates').val(),
                    third: $('#power').val(),
                    forth:$('#cost').val(),
                   // fifth:$('#costPer').val(),
                    sixth:$('#wage').val()
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
        //}  --}}
   // }
</script>
<script>
    $(function() {
            $('.selectpicker').selectpicker();
     });
</script>
<script>
    function changeCost(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "{{ route('changeCost') }}",
            data: {
                costPer: $('#costPer').val(),
            },
            async:false,
            success:function(data){
               $('#cost').val(data);
            },
            error:function(data){
            }
        });
    }

</script>


<script>
    function powerCost(){
       $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: "{{ route('computePowerCost') }}",
        data:{
            cost:$('#cost').val(),
            power:$('#power').val()
        },
        success:function(data){
          $('#computePowerCost').text(data+" تومان");
        },
        error:function(data){

        }
       });
    }
</script>
<script>
    function test(){
       changeCost();
       powerCost();
        }
</script>

</html>
