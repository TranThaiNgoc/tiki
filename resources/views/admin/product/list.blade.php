@extends('admin.layout.index')
@section('title', 'Tin tức')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách thể loại
                </h1>
            </div>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
			@foreach($errors->all() as $err)
				{{$err}}<br>
			@endforeach
			</div>
            @endif
            @if(session('thongbao'))
			<div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            @if(session('thongbaoloi'))
			<div class="alert alert-danger">
				{{ session('thongbaoloi') }}
			</div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th width="10%">Tên thể loại</th>
                        <th width="10%">Tên loại tin</th>
                        <th width="10%">Tên bài viết</th>
                        <th width="10%">hình ảnh</th>
                        <th width="10%">Trạng thái</th>
                        <th width="10%">Thời gian</th>
                        <th width="10%">Sửa</th>
                        <th width="10%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($product as $value)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $value->product_type->categories->name }}</td>
                        <td>{{ $value->product_type->name }}</td>
                        <td>{{ str_limit($value->name, 100) }}</td>
                        <td><img width="30%" src="{{ $value->image1 }}"></td>
                        <td>{!! ($value->status == 1) ? '<span class="label label-success">Kích hoạt</span>' : '<span class="label label-danger">Không kích hoạt</span>' !!}</td>
                        <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                        <td class="center"><i class="fas fa-edit"></i><a href="{{ route('admin.product.edit', ['id'=>$value->id])}}"> Sửa</a></td>
                        <td class="center"><i class="fas fa-trash-alt"></i> <a href="{{ route('admin.product.delete', ['id'=>$value->id])}}" onclick="return confirm('Bạn muốn xóa sản phẩm này ?')">Xóa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop