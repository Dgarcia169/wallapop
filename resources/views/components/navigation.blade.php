    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
        </a>
        <a href="{{ url('/backend')}}" class="simple-text logo-normal">
          ADMIN
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="">
            <a href="{{ url('backend/usuarios') }}">
              <i class="nc-icon nc-single-02"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li class="">
            <a href="{{ url('backend/productos') }}">
              <i class="nc-icon nc-briefcase-24"></i>
              <p>Productos</p>
            </a>
          </li>
          <li class="">
            <a href="{{ url('backend/categorias') }}">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Categorias</p>
            </a>
          </li>
        </ul>
      </div>
    </div>