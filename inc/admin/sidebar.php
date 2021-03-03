
        <div id="sidebar" class="sidebar  responsive ace-save-state">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('sidebar')
                } catch (e) {}
            </script>


            <!-- /.sidebar-shortcuts -->

            <ul class="nav nav-list">
                <li class="active">
                    <a href="index.php">
                        <i class="menu-icon fa fa-tachometer"></i>
                        <span class="menu-text"> Dashboard </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-desktop"></i>
                        <span class="menu-text">
								Menu
							</span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-caret-right"></i><span class="menu-text">
							Quản lý bài viết
							</span> 
                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            <b class="arrow"></b>

                           <ul class="submenu">
                                <li class="">
                                    <a href="crudview.php?page=1&limit=4">
                                        <i class="menu-icon fa fa-caret-right"></i> <span class="menu-text">
						                	Thêm sữa xóa bài viết
							</span> 
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                                <li class="">
                                    <a href="toppostview.php?page=1&limit=4">
                                        <i class="menu-icon fa fa-caret-right"></i><span class="menu-text">
						                	Bài viết hàng đầu
							</span> 
                                    </a>

                                    <b class="arrow"></b>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </li>



            </ul>
            <!-- /.nav-list -->

            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>
        </div>