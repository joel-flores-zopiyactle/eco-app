
@if ($param)
<a  href="{{ route($routeUrl, $param) }}" class="btn btn-outline-secondary back-btn">
    <img src="{{asset('assets/svg/back.svg')}}" width="20" alt="back">
    Regresar
</a>
@else
<a  href="{{ route($routeUrl) }}" class="btn btn-outline-secondary back-btn">
    <img src="{{asset('assets/svg/back.svg')}}" width="20" alt="back">
    Regresar
</a>
@endif
