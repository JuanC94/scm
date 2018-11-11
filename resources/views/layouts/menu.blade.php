@guest
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i>
                    <p>Inicio</p>
                </a>
            </li>
        </ul>
    </div>
@else
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="">
                <a href="{{ url('/home') }}">
                    <i class="fa fa-home"></i>
                    <p>Inicio</p>
                </a>
            </li>
            <li>
                <a href="{{ route('citaIndex') }}">
                    <i class="fa fa-calendar"></i>
                    <p>Citas</p>
                </a>
            </li>
            <li>
                <a href="{{ route('pacienteIndex') }}">
                    <i class="fa fa-male"></i>
                    <p>Pacientes</p>
                </a>
            </li>
            <li>
                <a href="{{ route('medicoIndex') }}">
                    <i class="fa fa-support"></i>
                    <p>Medicos</p>
                </a>
            </li>
            <li>
                <a href="{{ route('userIndex') }}">
                    <i class="fa fa-users"></i>
                    <p>Usuarios</p>
                </a>
            </li>
        </ul>
    </div>
@endguest