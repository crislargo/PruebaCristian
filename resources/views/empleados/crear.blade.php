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
        <a class="btn btn-success fa-pull-right" href="{{ url('/')}}"></i> Regresar a Listado</a>
        <h3>Crear Empleado</h3><br>
        <div class="alert alert-primary" role="alert">
            Los campos con (*) son obligatorios
        </div>

        <form action="{{ url('/crear')}}" id="formulario" method="post">
@csrf
            <div class="form-group row">
                <label for="inputfullname" class="col-sm-2 col-form-label"><strong>Nombre Completo*</strong></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre Completo">
                </div>
            </div>
            </p>
            <p>

            <div class="form-group row">
                <label for="inputemail" class="col-sm-2 col-form-label text-black"><strong>Correo Electronico*</strong></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Correo Electronico">
                </div>
            </div>


            <div class="form-group row">
                <label for="checksexo" class="col-sm-2 col-form-label text-black"><strong>Sexo*</strong></label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="sexo" checked value="M">
                        <label class="form-check-label" for="exampleRadios1">
                            Masculino
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="sexo" value="F">
                        <label class="form-check-label" for="exampleRadios2">
                            Femenino
                        </label>
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <label for="selectarea" class="col-sm-2 col-form-label text-black"><strong>Área*</strong></label>
                <div class="col-sm-10">
                    <select class="form-control" id="area" name="area">
                        @foreach($areas as $ar)
                            <option value="{{$ar->id}}">{{$ar->nombre}}</option> @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="textareadescripcion"
                       class="col-sm-2 col-form-label text-black"><strong>Descripción*</strong></label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="descripcion" name="descripcion"
                              placeholder="Descripción de la experiencia del empleado" rows="3"></textarea>
                </div>
            </div>


            <div class="form-group row">
                <label for="checkinput" class="col-sm-2 col-form-label text-black"><strong></strong></label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="boletin" name="boletin">
                        <label class="form-check-label" for="boletincheck">
                            Deseo recibir boletin informativo
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="checkinput" class="col-sm-2 col-form-label text-black"><strong>Roles*</strong></label>
                <div class="col-sm-10">
                    @foreach($roles as $rol)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$rol->id}}" id="rol" name="rol[]">
                            <label class="form-check-label" for="rol">
                                {{$rol->nombre}}
                            </label>
                        </div>
                    @endforeach


                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
        </form>
    </div>
</div>


</body>
</html>
