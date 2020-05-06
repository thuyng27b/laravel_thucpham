<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
</head>
<style type="text/css" media="">
	#bill{
		/*width: 600px;*/
		/*text-align: center;*/
	}
	#bill .table td{
		border-right:1px solid #444;
		border-bottom:1px solid #444;
		padding: 3px;
	}
	#bill .table {
		border-left:1px solid #444;
		border-top:1px solid #444;
		padding:0px;
		width: 500px;
		border-spacing: 0px;
	}
	.table tr{
		margin-left:15px;
	}
	.td
	{
		text-align: center;
		font-weight: bold;
	}
</style>
<body>
	<div style="text-align: center">
			<h3>RECEIPT</h3>
	</div>

	<div id="bill">
		<table>
				<tr>
					<td>Name custormer:</td>
					<td>{{ $khachhang->ten_kh }}</td>
				</tr>
				<tr>
					<td>Address:</td>
					<td>{{$khachhang->dia_chi  }}</td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>{{$khachhang->sdt  }}</td>
				</tr>
		</table>
		
		<h4>List of Product</h4>
		<table class="table">
			<thead>
				<tr>
					<td  class="td">Name product</td>
					<td class="td">Amount</td>
					<td class="td">Conut into money</td>
				</tr>
			</thead>
			<tbody>
				@foreach($CtHoaDon as $hd)
				<tr>
				  @foreach($sanpham as $sp) @if($hd->id_sp==$sp->id)
	               <td>{{ $sp->name }}</td>  
	               <td>{{ $hd->sl }}</td>  
	               <td>{{ number_format($sp->unit_price*$hd->sl,0,',','.' )}}</td>
	               @endif @endforeach  
				</tr>
			@endforeach
			</tbody>
		</table>
		<h4>Total:&nbsp;{{ number_format($HoaDonBan->tong_tien),0,',','.' }}</h4>
		<h4>Thank you for your purchase.</h4>
		</div>
</body>
</html>
