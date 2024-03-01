<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5 m-auto" style="width:500px;">
        <div class="text-center">
            <img src="..\images\shoe.webp" alt="Shoe" width="200" height="250" class="img-fluid">
        </div>
        <div>
            <form action="/payment" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your name"
                    name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="exampleFormControlInput2" placeholder="Enter price"
                    name="amount">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary">Pay</button>
                </div>
        </form>
        </div>
        <!-- paymentgateway -->
        @if(Session::has('amount'))
        <div class="container text-center">
        <form action="/pay" method="POST">
            @csrf
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_test_Q93LhRP0E4s5Ta" 
    data-amount="{{Session::get('amount')}}"
    data-currency="INR"
    data-order_id="{{Session::get('order_id')}}"
    data-buttontext="Pay with Razorpay"
    data-name="{{Session::get('name')}}"
    data-description="A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden"/>
</form>
</div>
@endif

    </div>
</body>
</html>