@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản Phẩm {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="trangchu">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$sanpham->name}}</h2></p>
								<p class="single-item-price">
									@if($sanpham->promotion_price==0)
												<span class="flash-sale">{{number_format($sanpham->unit_price)}}</span>
												@else
												<span class="flash-del">{{number_format($sanpham->unit_price)}}</span>
												<span class="flash-sale">{{number_format($sanpham->promotion_price)}}</span>
												@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<h5>Điểm đánh giá</h5>
								<p>{{round($avg_point,2)}}</p>
							</div>
							<div class="space20">&nbsp;</div>

						<!-- 	<p>Số lượng </p> -->
							<div class="single-item-options">
				
								<!-- <select class="wc-select" name="soluong">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select> -->

								<a class="add-to-cart" href="themgiohang/{{$sanpham->id}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả </a></li>
						
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->description}}</p>
						</div>
					</div>
				 <!-- Comments Form -->
				 @if(Auth::check())
		                <div class="well">
		                	<form action="comment/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
		                    	<input type="hidden" name="_token" value="{{csrf_token()}}">
			                	<div class="form-group">
			                		<label>	<h4>Đánh giá</h4></label>
				                	<select class="form-control" name="points">
						                <option value="10">10</option>
						                <option value="9">9</option>
						                <option value="8">8</option>
						                <option value="7">7</option>
						                <option value="6">6</option>
						                <option value="5">5</option>
						                <option value="4">4</option>
						                <option value="3">3</option>
						                <option value="2">2</option>
						                <option value="1">1</option>
					              	</select>
					             </div>
			                    
			                        <div class="form-group">
			                        	<label><h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4></label>
			                            <textarea class="form-control" name="content" rows="3"></textarea>
			                        </div>
		                        <button type="submit" class="btn btn-primary">Gửi</button>
		                    </form>
		                </div>

		                <hr>
		          @endif 

		          <!-- Comment -->
                @foreach($sanpham->comment as $cm)
                @if($cm->is_active==1)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cm->user->full_name}}
                            <small>{{$cm->updated_at}}</small>
                        </h4>
                       {{$cm->content}}
                       @if(Auth::check())
                       @if(Auth::user()->id == $cm->user->id)
                       <a href="notactivecomment/{{$cm->id}}">  Delete </a>
                       @endif
                       @endif
                       <p>{{$cm->points}} điểm</p>
                    </div>
                </div>
                @endif
                @endforeach
                  

                <!-- Posted Comments -->
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự </h4>

						<div class="row">
							@foreach($sp_tuongtu as $sptt )
							<div class="col-sm-4">
								<div class="single-item">
									@if($sptt->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
									<div class="single-item-header">
										<a href="chitietsanpham/{{$sptt->id}}"><img src="source/image/product/{{$sptt->image}}" alt="" height="150px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->name}}</p>
										<p class="single-item-price">
											@if($sptt->promotion_price==0)
												<span class="flash-sale">{{number_format($sptt->unit_price)}}</span>
												@else
												<span class="flash-del">{{number_format($sptt->unit_price)}}</span>
												<span class="flash-sale">{{number_format($sptt->promotion_price)}}</span>
												@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="themgiohang/{{$sptt->id}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="chitietsanpham/{{$sptt->id}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$sp_tuongtu->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm bán chạy</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								
								@foreach($new_product as $new)
								<div class="media beta-sales-item">

									<a class="pull-left" href="chitietsanpham/{{$new->id}}"><img src="source/image/product/{{$new->image}}" alt=""></a>

									<div class="media-body">
										{{$new->name}}
										<p class="single-item-price">
												@if($new->promotion_price==0)
												<span class="flash-sale">{{number_format($new->unit_price)}}</span>
												@else
												<span class="flash-del">{{number_format($new->unit_price)}}</span>
												<span class="flash-sale">{{number_format($new->promotion_price)}}</span>
												@endif
											</p>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								
								@foreach($new_product as $new)
								<div class="media beta-sales-item">

									<a class="pull-left" href="chitietsanpham/{{$new->id}}"><img src="source/image/product/{{$new->image}}" alt=""></a>

									<div class="media-body">
										{{$new->name}}
										<p class="single-item-price">
												@if($new->promotion_price==0)
												<span class="flash-sale">{{number_format($new->unit_price)}}</span>
												@else
												<span class="flash-del">{{number_format($new->unit_price)}}</span>
												<span class="flash-sale">{{number_format($new->promotion_price)}}</span>
												@endif
											</p>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection