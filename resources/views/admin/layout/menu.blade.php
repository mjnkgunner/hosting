 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Tìm kiếm..">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="admin/layout/home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        @if(Auth::user()->position->department->name == "Product")
                            <li>
                                <a href="amdin/loaisanpham/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> Loại sản phẩm <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/loaisanpham/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/loaisanpham/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/sanpham/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> Sản phẩm <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/sanpham/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/sanpham/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/slide/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> Slide  <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/slide/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/slide/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        @elseif(Auth::user()->position->department->name == "Sale")
                            <li>
                                <a href="admin/dathang/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> Đặt hàng <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/dathang/danhsach">Danh sách </a>
                                    </li>
                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/khachhang/danhsach"><i class="fa fa-users fa-fw"></i> Khách hàng <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/khachhang/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/khachhang/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/khuyenmai/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>Khuyến mãi <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/khuyenmai/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/khuyenmai/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/comment/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>Comment <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/comment/danhsach">Danh sách </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/polls/index"><i class="fa fa-bar-chart-o fa-fw"></i>Khảo sát <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/polls/_list">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/polls/create">Thêm</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/giohang/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>Giỏ hàng <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/giohang/danhsach">Danh sách </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                        @elseif(Auth::user()->position->department->name == "Inventory")
                            <li>
                                <a href="admin/loainguyenlieu/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>Loại nguyên liệu  <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/loainguyenlieu/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/loainguyenlieu/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/nguyenlieu/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>Nguyên liệu  <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/nguyenlieu/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/nguyenlieu/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/nguyenlieu/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>Xuất - Nhập  <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/xuatnhap/danhsachxuat">Danh sách xuất </a>
                                    </li>
                                    <li>
                                        <a href="admin/xuatnhap/danhsachnhap">Danh sách nhập </a>
                                    </li>
                                    <li>
                                        <a href="admin/xuatnhap/xuat">Xuất hàng</a>
                                    </li>
                                    <li>
                                        <a href="admin/xuatnhap/nhap">Nhập hàng</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/nhacungcap/danhsach"><i class="fa fa-users fa-fw"></i> Nhà cung cấp <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/nhacungcap/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/nhacungcap/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                        @elseif(Auth::user()->position->department->name == "HRS")
                            <li>
                                <a href="admin/nguoidung/danhsach"><i class="fa fa-users fa-fw"></i> Người dùng <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/nguoidung/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/nguoidung/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/bophan/danhsach"><i class="fa fa-users fa-fw"></i> Bộ phận <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/bophan/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/bophan/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                            <li>
                                <a href="admin/vitri/danhsach"><i class="fa fa-users fa-fw"></i> Vị trí<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/vitri/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/vitri/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/nhanvien/danhsach"><i class="fa fa-users fa-fw"></i> Nhân viên<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/nhanvien/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/nhanvien/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        @elseif(Auth::user()->position->department->name == "Admin")
                              <li>
                                <a href="amdin/loaisanpham/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> Loại sản phẩm <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/loaisanpham/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/loaisanpham/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/sanpham/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> Sản phẩm <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/sanpham/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/sanpham/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/slide/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> Slide  <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/slide/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/slide/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="admin/dathang/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> Đặt hàng <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/dathang/danhsach">Danh sách </a>
                                    </li>
                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/khachhang/danhsach"><i class="fa fa-users fa-fw"></i> Khách hàng <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/khachhang/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/khachhang/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/khuyenmai/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>Khuyến mãi <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/khuyenmai/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/khuyenmai/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/comment/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>Comment <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/comment/danhsach">Danh sách </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/polls/index"><i class="fa fa-bar-chart-o fa-fw"></i>Khảo sát <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/polls/_list">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/polls/create">Thêm</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/giohang/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>Giỏ hàng <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/giohang/danhsach">Danh sách </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                             <li>
                                <a href="admin/loainguyenlieu/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>Loại nguyên liệu  <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/loainguyenlieu/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/loainguyenlieu/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/nguyenlieu/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>Nguyên liệu  <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/nguyenlieu/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/nguyenlieu/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/nguyenlieu/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>Xuất - Nhập  <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/xuatnhap/danhsachxuat">Danh sách xuất </a>
                                    </li>
                                    <li>
                                        <a href="admin/xuatnhap/danhsachnhap">Danh sách nhập </a>
                                    </li>
                                    <li>
                                        <a href="admin/xuatnhap/xuat">Xuất hàng</a>
                                    </li>
                                    <li>
                                        <a href="admin/xuatnhap/nhap">Nhập hàng</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/nhacungcap/danhsach"><i class="fa fa-users fa-fw"></i> Nhà cung cấp <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/nhacungcap/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/nhacungcap/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/nguoidung/danhsach"><i class="fa fa-users fa-fw"></i> Người dùng <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/nguoidung/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/nguoidung/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/bophan/danhsach"><i class="fa fa-users fa-fw"></i> Bộ phận <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/bophan/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/bophan/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                            <li>
                                <a href="admin/vitri/danhsach"><i class="fa fa-users fa-fw"></i> Vị trí<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/vitri/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/vitri/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="admin/nhanvien/danhsach"><i class="fa fa-users fa-fw"></i> Nhân viên<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/nhanvien/danhsach">Danh sách </a>
                                    </li>
                                    <li>
                                        <a href="admin/nhanvien/them">Thêm </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>