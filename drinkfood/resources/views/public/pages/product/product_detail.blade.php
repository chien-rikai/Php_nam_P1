@extends('public/layouts/master_layout')
@section('title', 'Trang chủ')

@section('content')
<div class="box_content">

    {{-- Begin: Thanh tiêu đề --}}
    <div class="content_bar">
        <div class="title_content">
            <span class="title_bar">Thông tin sản phẩm</span>
        </div>
    </div>

    {{-- Begin: Phần thông tin sản phẩm --}}
    <div class="image_panel"><img src="{{asset('images/sp1.jpg')}}" alt="CSS Template" width="100" height="150" /></div>
    <h2>Cafe đen - Tcafe</h2>
    <ul>
        <li>Loại sản phẩm: <a href="#">Đồ uống</a></li>
        <li>Danh mục: <a href="#">Cà phê</a></li>
        <li>Nhãn hiệu: <a href="#">Tcafe</a></li>
        <li>Giá: <a href="javascript:void(0)">10.000 VNĐ</a></li>
        <li>Giảm: <a href="javascript:void(0)">0</a></li>
        <li>Ngày đăng: 22/05/2021</li>
    </ul>
    {{-- End: Phần thông tin sản phẩm --}}

    <div class="buy_now_button"><a href="#">Đặt hàng</a></div>

    {{-- Phần mô tả sản phẩm --}}
    <p>
        Cafe đen của cửa hàng Tcafe là loại cafe được nhiều khách hàng mua
    </p>

    {{-- Nút chia sẽ sản phẩm lên mạng xã hội --}}
    <span>Chia sẽ tới: </span>
    <div class="addthis_inline_share_toolbox_xmo4"></div>

    @include('public/layouts/elements/rating')

    <div class="cleaner_with_height">&nbsp;</div>
</div>

@endsection
