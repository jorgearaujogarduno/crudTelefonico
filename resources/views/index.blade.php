<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.8/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    {{--  <link rel="stylesheet" href="{{ public_path('css/font-awesome.min.css') }}" type="text/css">  --}}
    <title>Sistema telefónico</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items:center">
                    <h3>
                        {{ __('Listado de usuarios telefónicos') }}
                    </h3>

                    <div class="float-right">
                        <a class="btn btn-primary btn-sm float-right" data-placement="left" href="{{route('usuarios.create')}}" role="button"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-info" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="container-fluid">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Nombre usuario</th>
                                <th scope="col" class="text-center">Número telefonico</th>
                                <th scope="col" class="text-center">Telefonia</th>
                                <th scope="col" class="text-center">Números frecuentes</th>
                                <th scope="col" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($telephone_customers as $telephone_customer)
                                <tr>
                                    <td scope="row" class="text-center">{{ $telephone_customer->name }} {{ $telephone_customer->ap_paterno }} {{ $telephone_customer->ap_materno }}</td>
                                    <td class="text-center">{{ $telephone_customer->numero_telefonico }}</td>

                                    @foreach ($telephones as $telephone)
                                        @if($telephone->id == $telephone_customer->telephone_id)
                                            <td class="text-center">{{ $telephone->name_telefonia }}</td>
                                        @endif
                                    @endforeach
                                    <td class="text-center">
                                        <button class="btn btn-info btn-sm" onClick="JavaScript:showFrequentNumbers('{{ $telephone_customer->id }}');"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('usuarios.destroy',$telephone_customer->id) }}" method="POST">
                                            <a  class="btn btn-success btn-sm" href="{{ route('usuarios.edit', $telephone_customer->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col" class="text-center">Nombre usuario</th>
                                <th scope="col" class="text-center">Número telefonico</th>
                                <th scope="col" class="text-center">Telefonia</th>
                                <th scope="col" class="text-center">Números frecuentes</th>
                                <th scope="col" class="text-center">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#miModal">Abrir Modal</button>  --}}
    <!-- Modal -->
    <div id="miModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Contenido del modal -->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tus 5 números frecuentes</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="cotainer">
                <div id="newData"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>



</body>
{{--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>  --}}
{{--  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>  --}}
{{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
{{--  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>  --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.8/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready( function () {
        $('#example').DataTable();
    } );

    function showFrequentNumbers(telephone_customer_id){
        $.ajax({
            url: 'usuarios/'+telephone_customer_id,
            // type: 'DELETE',
            type: 'GET',
            dataType: 'json',
            success: function(Response) {
                console.log(Response);
                var html = '';

                html += '<div class="form-group">'
                            +'<label for="name">Nombre completo: </label> '
                            +' <label for="name"> '+Response.telephone_customers.name+' '+Response.telephone_customers.ap_paterno+' '+Response.telephone_customers.ap_materno+'</label>'
                       +'</div>';

                if(Response.numeros_frecuentes > 0){
                    $(Response.favorite_numbers).each(function(_key, value) {
                        html += '<div class="row">'
                                    +'<div class="col-md-5">'
                                        +'<div class="form-group">'
                                            +'<label for="numero_telefonico_frecuente">Número telefonico</label>'
                                            +'<label for="numero_telefonico_frecuente">'+ value.numero_telefonico +'</label>'
                                        +'</div>'
                                    +'</div>'

                                    +'<div class="col-md-5">'
                                        +'<div class="form-group">'
                                            +'<label for="telefonia_frecuente">Compañia telefonica</label>'
                                            +'<label for="telefonia_frecuente">'+value.name_telefonia+'</label>'
                                        +'</div>'
                                    +'</div>'
                                +'</div>';
                    });
                } else {
                    html += '<div class="alert alert-danger" role="alert">'
                                +'No tiene asignados números frecuentes'
                            +' </div>';
                }

                $('#newData').html(html);
                $('#miModal').modal('show');

            }
        });
    }

</script>
</html>
