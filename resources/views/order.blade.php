@extends('master')
@section('content')

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    

<!-- <div class="container mt-5 mb-5">
	<div class="row">
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th>Products</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($orderList as $list)
				<tr>
					<td>{{$list->ProductName}}</td>
					<td>{{$list->Price}}</td>
				</tr>
			</tbody>
			 @empty
			 <h2>No Data</h2>
			@endforelse
			<tfoot>
				<tr>
					<td><bold>Total:</bold></td>
					<td>{{$totalprice}}</td>
				</tr>
			</tfoot>
		</table>
	</div>

		<div class="text-center"><a href="#" class="btnSelect btn btn-primary">Buy</a></div>
</div> -->

<div class="container wrapper">
    <div class="row cart-head">
        <div class="container">
            <div class="row">
               <p></p>
            </div>
            <div class="row">
                <div style="display: table; margin: auto;">
                    <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                    <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                    <span class="step_thankyou check-bc step_complete">Thank you</span>
                </div>
            </div> 
            <div class="row">
                <p></p>
            </div>
        </div>
    </div>
    <div class="row cart-body">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
            <div class="panel panel-info">
                <div class="panel-heading">Review Order
                    <div class="pull-right">
                        <small><a class="afix-1" href="#">Edit Cart</a></small>
                    </div>
                </div>
                <div class="panel-body">
                    @foreach ($orderList as $list)
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-3">
                                <img class="img-responsive img" src="{{$list->Gallery}}" height="10px" />
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="col-xs-12">{{$list->ProductName}}</div>
                                <div class="col-xs-12"><small>Quantity:<span>1</span></small></div>
                            </div>
                            <div class="col-sm-3 col-xs-3 text-right">
                                <h6><span>Rs.</span>{{$list->Price}}</h6>
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group"><hr /></div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <strong>Order Total</strong>
                            <div class="pull-right"><span>$</span>
                                <span>{{$totalprice}}</span>
                                <input type="hidden" value="{{$totalprice}}" name="total_price">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
            <form action="checkout" method="POST" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                @csrf
                <input type="hidden" value="{{$totalprice}}" name="total_price">
                <div class="panel panel-info">
                    <div class="panel-heading">Address</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <h4>Shipping Address</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-xs-12">
                                <strong>First Name:</strong>
                                <input type="text" name="first_name" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Address:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="address" class="form-control"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Email Address:</strong></div>
                            <div class="col-md-12"><input type="email" name="email_address" class="form-control"  /></div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12"><strong>Card Type:</strong></div>
                            <div class="col-md-12">
                                <select id="CreditCardType" name="CreditCardType" class="form-control">
                                    <option value="Visa">Visa</option>
                                    <option value="MasterCard">MasterCard</option>
                                    <option value="American Express">American Express</option>
                                    <option value="Discover">Discover</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                            <div class="col-md-12"><input type="text" class="form-control card-number" name="car_number" value="" /></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12"><strong>Card CVV:</strong></div>
                            <div class="col-md-12"><input type="text" class="form-control card-cvc" name="car_code" value="" /></div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class='control-label'>Expiration Year</label>
                                     <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span>Pay secure using your credit card.</span>
                            </div>
                            <div class="col-md-12">
                                <ul class="cards">
                                    <li class="visa hand">Visa</li>
                                    <li class="mastercard hand">MasterCard</li>
                                    <li class="amex hand">Amex</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <div class="col-md-6 col-sm-6 col-xs-12 mt-2">
                                <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    
   
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>

@endsection



