<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>
    <body>
        <div class="panel-body">
            @include('common.errors')

            <form action="" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="product" class="col-sm-3 control-label">Product Name</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="product-name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="product" class="col-sm-3 control-label">Qty</label>

                    <div class="col-sm-6">
                        <input type="number" name="qty" id="product-qty" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="product" class="col-sm-3 control-label">Price</label>

                    <div class="col-sm-6">
                        <input type="number" name="price" id="product-price" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Add Product
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Current Products
            </div>

            <div class="panel-body">
                <table class="table table-striped product-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Datetime</th>
                        <th>Total</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @if (!empty($products))
                            @foreach ($products as $product)
                                <tr class="product">
                                    <!-- Product Name -->
                                    <td class="table-text name">
                                        <div>{{ $product['name'] }}</div>
                                    </td>
                                    <td class="table-text qty">
                                        <div>{{ $product['qty'] }}</div>
                                    </td>
                                    <td class="table-text price">
                                        <div>{{ $product['price'] }}</div>
                                    </td>
                                    <td class="table-text date">
                                        <div>{{ $product['date'] }}</div>
                                    </td>
                                    <td class="table-text total">
                                        <div>{{ $product['qty'] * $product['price'] }}</div>
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </body>

    <script>
$(document).ready(function() {
    $('form').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/product',
            data: $('form').serialize(),
            success: function(data) {
                var cloner = $('.product').first().clone();
                $('.name div', cloner).text(data.name);
                $('.qty div', cloner).text(data.qty);
                $('.price div', cloner).text(data.price);
                $('.date div', cloner).text(data.date);
                $('.total div', cloner).text(data.qty * data.price);
                $('tbody').append(cloner);
            }
        });
    });
});
    </script>
</html>
