	<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href="lienhe"><i class="fa fa-home"></i> Ngoc Lam, Long Bien, Ha Noi</a></li>
						<li><a href="lienhe"><i class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						
						@if(Auth::check())
						<li><a href="nguoidung">Chao ban {{Auth::user()->full_name}}</a></li>
						<li><a href="dangxuat">Đăng xuất </a></li>
						@else
						<li><a href="dangki">Đăng kí</a></li>
						<li><a href="dangnhap">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="trangchu" id="logo"><img src="source/assets/dest/images/logoo.jpg" width="200px" height="120" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="timkiem">
					        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')) {{Session('cart')->totalQty}} @else Trống @endif ) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@if(Session::has('cart'))
								@foreach($product_cart as $product)
								<div class="cart-item">
									<a class="cart-item-delete" href="xoagiohang/{{$product['item']['id']}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="chitietsanpham/{{$product['item']['id']}}"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>
											
											<span class="cart-item-amount">{{$product['qty']}}*<span> @if($product['item']['promotion_price']==0) {{number_format($product['item']['unit_price'])}} @else {{number_format($product['item']['promotion_price'])}} @endif</span></span>
										</div>
									</div>
								</div>
								@endforeach
								

								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}}</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="dathang" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
								@endif
							</div>
						</div> <!-- .cart -->
					</div>
					<h6 style="color: #007bff">Khuyến mãi</h6>
					@foreach($promotions as $promotion)
					<h6 style="color: #007bff"><marquee>{{$promotion->name}}: {{$promotion->code}}</marquee>
					@endforeach
				</div>

				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="trangchu">Trang chủ</a></li>
						<li><a href="loaisanpham/1">Loại Sản phẩm</a>
							<ul class="sub-menu">
								@foreach($loai_sp as $loai)
								<li><a href="loaisanpham/{{$loai->id}}">{{$loai->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="gioithieu">Giới thiệu</a></li>
						<li><a href="lienhe">Liên hệ</a></li>
						<li><a href="khaosat">Khảo sát</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->