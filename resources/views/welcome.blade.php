<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exchange Rates App</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">


</head>
<body>
<div class="container">
    <h2>Exchange Rates App</h2><br/>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif

    @if (\Session::has('failure'))
        <div class="alert alert-warning">
            <ul>

               <li>{!! \Session::get('failure') !!}</li>

            </ul>
        </div><br />
    @endif

    <form method="post" action="{{url('rate')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Base Currency:</label>
                <select class="form-control" name ="base" id="base">
                    <option value="">Select One</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="GBP">GBP</option>
                    <option value="AUD">AUD</option>
                    <option value="CAD">CAD</option>
                    <option value="CHF">CHF</option>
                    <option value="CNY">CNY</option>
                    <option value="JPY">JPY</option>

                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="amount">Amount:</label>
                <input type="text" class="form-control" name="amount">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="target">Target Currency:</label>
                <select class="form-control" name ="target" id="target">
                    <option value="">Select One</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="GBP">GBP</option>
                    <option value="AUD">AUD</option>
                    <option value="CAD">CAD</option>
                    <option value="CHF">CHF</option>
                    <option value="CNY">CNY</option>
                    <option value="JPY">JPY</option>

                </select>
            </div>
        </div>
</div>
<div class="row">
    <div class="col-md-4"></div>
    <div class="form-group col-md-4">
        <button type="submit" class="btn btn-success" style="margin-left:38px">Submit</button>
    </div>
</div>
</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">


    $(document).ready(function() {


        var allOptions = $('#target option').clone();


        $('#base').change(function() {
            $('#target').html(allOptions);
            var val = $(this).val();
            console.log('Value1:' + val);
            $('#target option[value=' + val + ']').remove();

            $('#target option[selected="selected"]').each(
                function() {
                    $(this).removeAttr('selected');
                }
            );


            // mark the first option as selected
            $("#target option:first").attr('selected','selected');

            //$('#to_warehouse_id').html(allOptions.filter('.option-' + val));
        });



    });
</script>


</body>

</html>
