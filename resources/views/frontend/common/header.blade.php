<header>
    <style scope>
        @media (max-width: 500px){
            .navigation{
                margin: 24px 0;
            }
            .logo img{
               height: 40px;
                width: auto;
            }
        }
    </style>
    <div class="container">
        <div class="navigation clearfix">
            <div class="logo"><a href="{{ url('/') }}"><img src="{{ url('files/'. \App\Components\Functions::getLogo()->image) }}" alt="#" /> </a></div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar first"></span> <span class="icon-bar middle"></span> <span class="icon-bar last"></span> </button>
            </div>
            <div class="menu">
                <nav class="navbar navbar-default">
                    <div id="navbar" class="navbar-collapse collapse pull-right">
                        <ul class="nav navbar-nav">
                            <li class="{{ Request::is('/') ? 'active' : '' }}" style="padding-right: 45px"><a href="{{ url('/') }}">Trang chủ</a></li>
                            <?php $categories = \App\Components\Functions::getCategories() ?>
                            @foreach($categories as $category)
                                @if($category->children()->count() > 0)
                                    <li class="" style="padding-right: 45px"><a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">{{ $category->name }}</a>
                                        <ul class="dropdown-menu" role="menu">
                                            @foreach($category->children as $child)
                                                <li><a href="{{ url('/'.$child->slug) }}">{{ $child->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="{{ (Request::path() == $category->slug) ? 'active' : '' }}" style="padding-right: 45px"><a href="{{ url('/'.$category->slug) }}">{{ $category->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>