<style>
table { font-family: Georgia,serif;  font-size: 16px;  text-align:left;  }
h1 { font-size: 36px;  font-family: sans-serif;	}
p {  line-height: 25px;	}
</style>
<center style="padding-bottom: 20px;">
<table style="width:600px;border: 1px solid #e9e9e9;background:#ffffff;">
	<tr>
		<td style="padding:20px 20px 20px 20px;color: #565656">
			Chào bạn!
			<p>Cảm ơn bạn đã đặt hàng website {{ url('/') }}</p>
			<table>
				<thead>
					<th>Mã đơn hàng</th>
					<th>Tên đơn hàng</th>
					<th>Số lượng</th>
					<th>Đơn giá sản phẩm</th>
				</thead>
				<tbody>
					@foreach($product as $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->name }}</td>
						<td>{{ $value->qty }}</td>
						<td>{{ number_format($value->price) }} đồng</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<p>Tổng tiền: {{$total}} đồng</p>
			<p><b>Trân trọng !</b></p>
		</td>
	</tr>
</table>
</center>