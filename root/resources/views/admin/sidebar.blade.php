<nav id="sidebarMenu" class="col-md-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link{{ request()->route()->named('admin.index') ? ' active' : '' }}" href="{{ route('admin.index') }}"><span data-feather="home"></span> ホーム</a>
      </li>
      <li class="nav-item">
        <a class="nav-link{{ request()->route()->named('admin.blogs.*') ? ' active' : '' }}" href="{{ route('admin.blogs.index') }}"><span data-feather="file-text"></span> ブログ記事</a>
      </li>
    </ul>
  </div>
</nav>