<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? "active" : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? "active" : '' }}" href="/dashboard/posts">
            <span data-feather="file" class="align-text-bottom"></span>
            Posts
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/bookmark*') ? "active" : '' }}" href="/dashboard/bookmark">
            <span data-feather="bookmark" class="align-text-bottom"></span>
            Bookmark
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/account*') ? "active" : '' }}" href="/dashboard/account">
            <span data-feather="user" class="align-text-bottom"></span>
            My Account
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/">
            <span data-feather="arrow-left" class="align-text-bottom"></span>
            Back to home
          </a>
        </li>

      </ul>
    </div>
  </nav>