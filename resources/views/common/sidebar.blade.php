@if (Auth::check())
<!-- #section:basics/sidebar -->
<div id="sidebar" class="sidebar responsive">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <a class="btn btn-success" href="{{ url('/users') }}">
                <i class="ace-icon fa fa-user"></i>
            </a>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->


    <ul class="nav nav-list">
        <li class="{{ (Request::is('dashboard') || Request::is('dashboard/*')) ? 'active' : '' }}">
            <a href="{{ url('/dashboard') }}"><i class="menu-icon fa fa-tachometer"></i> <span class="menu-text"> Dashboard </span></a>
        </li>

        <li class="{{ (Request::is('categories') || Request::is('categories/*')) ? 'active' : '' }}">
            <a href="{{ url('/categories') }}"><i class="menu-icon fa fa-folder"></i> <span class="menu-text"> Danh mục bài viết </span></a>
        </li>

        <li class="{{ (Request::is('posts') || Request::is('posts/*')) ? 'active' : '' }}">
            <a href="{{ url('/posts') }}"><i class="menu-icon fa fa-cubes"></i> <span class="menu-text"> Bài viết </span></a>
        </li>

        <li class="{{ (Request::is('images') || Request::is('images/*')) ? 'active' : '' }}">
            <a href="{{ url('/images') }}"><i class="menu-icon fa fa-picture-o"></i> <span class="menu-text"> Ảnh slide </span></a>
        </li>


    </ul><!-- /.nav-list -->

    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <!-- /section:basics/sidebar.layout.minimize -->
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>
<!-- /section:basics/sidebar -->
@endif
