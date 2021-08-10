@extends('master')
@section('content')


<div class="container mt-5">
	<div class="row">
		<table class="table table-bordered">
			
			@forelse ($cartList as $list)
				<tr>
					<td>{{$list->ProductName}}</td>
					<td>{{$list->Description}}</td>
					<td><img src="{{$list->Gallery}}" height="100px"></td>
					<td>{{$list->Price}}</td>
					<td><a class="btn btn-danger" href="/removeCart/{{$list->cart_id}}">Remove</a></td>
				</tr>
			 @empty
			 <td class="text-center">Your Cart Is Empty</td>
			@endforelse
		</table>
		<div class="text-center"><a href="order" class="btn btn-primary">Buy</a></div>
	</div>
</div>



@endsection



