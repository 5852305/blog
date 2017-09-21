
<header class="navbar navbar-fixed-top navbar-inverse">
 <div class="container">
      <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
       <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
        <a href="/" class="navbar-brand">Potato </a>
   </div>
      <nav class="hidden-xs">
        <ul class="nav navbar-nav navbar-right nav-font">
        @if (Auth::check())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="glyphicon glyphicon-list-alt"></span>
            文章管理 <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('articles.create') }}"><span class="glyphicon glyphicon-pencil"></span> 写文章</a></li>
              <li class="divider"></li>
              <li><a href="{{ route('articles.index') }}"><span class='glyphicon glyphicon-th-list'></span> 文章列表</a></li>
              <li><a href="{{ route('categorys.index') }}"><span class='glyphicon glyphicon-th-list'></span> 分类列表</a></li>
            </ul>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-tags"></span>
                标签管理 <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('tags.create') }}" data-toggle="modal"><span class="glyphicon glyphicon-tag"></span> 添加标签</a>  </li>
                <li class="divider"></li>
                <li><a href="{{ route('tags.index') }}"><span class='glyphicon glyphicon-th-list'></span> 标签列表</a></li>

              </ul>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user"></span>
              {{ Auth::user()->name }} <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('users.show', Auth::user()->id) }}"><span class="glyphicon glyphicon-leaf"></span> 个人中心</a></li>
                <li class="divider"></li>
              <li><a href="{{ route('users.edit', Auth::user()->id) }}"><span class="glyphicon glyphicon-asterisk"></span> 编辑资料</a></li>
              <li class="divider"></li>
              <li>
                <a id="logout" href="#">
                  <form action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-block btn-danger" type="submit" name="button">  <span  class="glyphicon glyphicon-log-out"></span> 退出</button>
                  </form>
                </a>
              </li>
            </ul>
          </li>
          @else
            <li class="active"><a href="{{ route('auth.github') }}" ><i class="fa fa-github fa-5" aria-hidden="true"></i> 登录</a></li>
          @endif

        </ul>
      </nav>
   </div>

</header>
