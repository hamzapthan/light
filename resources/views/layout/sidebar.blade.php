<nav class="sidebar">
  <div class="sidebar-header">
    <a href="/home" class="sidebar-brand">
      E-Commerce<span></span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['/']) }}">
        <a href="/home" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Category Section</li>
      <li class="nav-item {{ active_class(['email/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#email" role="button" aria-expanded="{{ is_active_route(['email/*']) }}" aria-controls="email">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Category</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['email/*']) }}" id="email">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ route('/add_cat') }}" class="nav-link {{ active_class(['email/inbox']) }}">Add Category</a>
            </li>
            <li class="nav-item">
              <a href="/allCat" class="nav-link {{ active_class(['email/read']) }}">Show Category</a>
            </li>
           
            <li class="nav-item">
              <a href="{{ url('/email/compose') }}" class="nav-link {{ active_class(['email/compose']) }}">Change Status</a>
            </li>
          </ul>
        </div>
      </li>
      
     
     
      <li class="nav-item nav-category">Products</li>
      <li class="nav-item {{ active_class(['ui-components/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#uiComponents" role="button" aria-expanded="{{ is_active_route(['ui-components/*']) }}" aria-controls="uiComponents">
          <i class="link-icon" data-feather="feather"></i>
          <span class="link-title">Products</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['ui-components/*']) }}" id="uiComponents">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="/addPro" class="nav-link {{ active_class(['ui-components/alerts']) }}">Add Products</a>
            </li>
           
            <li class="nav-item">
              <a href="/showPro" class="nav-link {{ active_class(['ui-components/tooltips']) }}">Show Products</a>
            </li>
           
         </ul>
        </div>
      </li>
    
      <li class="nav-item {{ active_class(['forms/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#forms" role="button" aria-expanded="{{ is_active_route(['forms/*']) }}" aria-controls="forms">
          <i class="link-icon" data-feather="inbox"></i>
          <span class="link-title">Date Setting</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['forms/*']) }}" id="forms">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="showDate" class="nav-link {{ active_class(['forms/basic-elements']) }}">Add Date</a>
            </li>
            
            <li class="nav-item">
              <a href="{{ url('/forms/wizard') }}" class="nav-link {{ active_class(['forms/wizard']) }}">Wizard</a>
            </li>
          </ul>
        </div>
      </li>
    
      </li>
    
    
     </nav>
