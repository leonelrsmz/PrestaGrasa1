<div class="sidebar shadow">
    
    <div class="section-top">
        <div class="logo">
            <a href="{{url('/')}}">
                <img src="{{url('/static/images/logo_1.png')}}" alt="" class="img-fluid">
            </a>
        </div>
        <div class="user">
            <span class="subtitle"> Correo: </span>
            <div class="name"> 
                
            </div>
            <div class="email">
                {{Auth::user()->email}}
            </div>
        </div>
    </div>

    <div class="main">
        <ul>
            <li>
                <a href="{{url('/admin')}}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{url('/admin/products/a')}}"> 
                    <i class="fas fa-box"></i>Gestion de Productos
                </a>
            </li>
            <li>
                <a href="{{url('/admin/categories/0')}}"> {{-- Se indica cero ya que correxponde al modulo por defecto Streetwear , de getModules() de functions.php --}}
                    <i class="fas fa-shoe-prints"></i>Modelos y categorias
                </a>
            </li>
            <li>
                <a href="{{url('/admin/users')}}"> 
                    <i class="fas fa-users"></i>Gestion de usuarios
                </a>
            </li>
        </ul>
    </div>

</div>