<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/fontiran.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/miningStyle.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="left">
            <div class="left-1 row">
                <div class="first">
                    <div class="first-main"></div>
                </div>
                <div class="second"></div>
                <div class="third"></div>
            </div>
            <div class="left-1 row">
                <div class="first">
                    <div class="first-main"></div>
                </div>
                <div class="second"></div>
                <div class="third"></div>
            </div>
            <div class="left-1 row">
                <div class="first">
                    <div class="first-main"></div>
                </div>
                <div class="second"></div>
                <div class="third"></div>
            </div>
            <div class="left-1 row">
                <div class="first">
                    <div class="first-main"></div>
                </div>
                <div class="second"></div>
                <div class="third"></div>
            </div>
        </div>
        <div class="col-3 right mt-3">
            <div class="right-header"></div>
            <div class="right-header-2"></div>
            <div class="right-body">
                <input type="text" class="mt-5" />
                <input type="text" class="mt-5" />
                <input type="text" class="mt-5" />
                <input type="text" class="mt-5" />
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
