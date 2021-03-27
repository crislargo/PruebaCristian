<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Empleados</title>
    <!--Style-->
    <link rel="stylesheet" href="{{ url('/css/fontawesome.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Script-->
    <script src="https://kit.fontawesome.com/2e428e79f6.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ url('/js/empleados.js')}}"></script>


</head>
<body>
<div class="container ">
    <div class="col-lg-12 mx-auto pt-5">
        <h3>Lista de Empleados</h3>

    </div>

    <a class="btn btn-primary fa-pull-right" href="{{ url('/crear')}}"><i class="fas fa-user-plus"></i> Crear</a>
    <br><br>
    <div class="pt-2">
        <table class="table table-bordered table-active ">
            <thead>
            <tr>
                <th><i class="fas fa-user"></i> Nombre</th>
                <th><i class="fas fa-at"></i> Email </th>
                <th><i class="fas fa-venus-mars"></i> Sexo</th>
                <th><i class="fas fa-briefcase"></i> Área</th>
                <th><i class="fas fa-envelope"></i> Boletín</th>
                <th> Modificar</th>
                <th> Eliminar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($empleados as $vl)
                <tr>
                    <td>{{$vl->nombre}}</td>
                    <td>{{$vl->email}}</td>
                    <td>@if($vl->sexo=='M') Masculino @else Femenino @endif</td>
                    <td>{{$vl->area->nombre}}</td>
                    <td>@if($vl->boletin==0)No @else Si @endif</td>
                    <td align="center"><a class="text-dark" href="{{ url('/editar/'.$vl->id) }}"
                                          title="Editar Empleado"><i class="fas fa-edit"></i></a></td>
                    <td align="center"><a class="text-dark" href="#"
                                          onclick="javascript:eliminar({{$vl->id}},'{{ url('/eliminar/'.$vl->id)}}')"
                                          title="Eliminar Empleado"><i class="fas fa-trash"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
