<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p>Hi {{auth()->user()->name}},</p><br>
    <p>Thank you for shopping with Divisima. Here are your order details.</p>
    <div class="cart-table-warp">
        <table class="table table-borderd table-striped"> 
        <thead>
            <tr>
                <th class="product-th">Product</th>
                <th class="quy-th">Quantity</th>
                <th class="size-th">Size</th>
                <th class="total-th">Price</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td class="product-col">
                        <img src="{{asset('storage/'.$item->model->image)}}" alt="" width="100">
                        <div class="pc-title">
                            <h4>{{ $item->name }}</h4>
                            <p>${{ $item->model->price }}</p>
                        </div>
                    </td>
                    <td class="quy-col">
                        <div class="quantity">
                            <h4>{{$item->quantity}}</h4>
    
                        </div>
                    </td>
                    <td class="size-col"><h4>{{ $item->attributes->size }}</h4></td>
                    <td class="total-col"><h4>${{ $item->model->price * $item->quantity}}</h4></td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
        <h5>Total: {{Cart::getTotal()}}</h5>
    </div>

    <p>Team</p>
    <h4>PaintSky Pvt. Ltd.</h4>
</body>
</html>