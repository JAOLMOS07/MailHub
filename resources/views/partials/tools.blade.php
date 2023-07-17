<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item ">
            <a class="nav-link " href="#">
            <input id="check-tool" class="  form-check-input" type="checkbox">
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link " href="#">
              <select id="select-tool" class="  form-select form-select-sm " id="Select- selector">
                <option value="1" selected>Todos</option>
                @if(Route::currentRouteName() !== "enviados")
                <option value="2">Importantes</option>
                <option value="3">Leidos</option>
                <option value="3">Ninguno</option>
                @endif
                
              </select>
            </a>
          </li>   
          <li class="nav-item tool-item tools-display-none ">
            <a class="nav-link" href="#"><img src="/img/trash.png" alt="trash"></a>
          </li>
          <li class="nav-item tool-item tools-display-none ">
            <a class="nav-link" href="#"><img src="/img/archivar.png" alt="archive"></a>
          </li>
          
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="@lang("Search")" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">@lang("Search")</button>
        </form>
      </div>
    </div>
  </nav>