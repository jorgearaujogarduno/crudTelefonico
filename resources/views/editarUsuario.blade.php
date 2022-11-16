<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.8/dist/sweetalert2.min.css">

    <title>Sistema telefónico</title>
</head>
<body>
    <div class="container">
        <form action="{{ route('usuarios.update', $id) }}" method="POST">
            @method('PATCH')
            @csrf
            @include('formEdit')
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.8/dist/sweetalert2.all.min.js"></script>

<script>
    $(document).ready( function () {
        var numRow = $('#numRow').val();
        console.log(numRow);
       $('#agregarNumeroFrecuente').click(function(event){
            event.preventDefault();

            if(numRow < 5){
                numRow++;
                $('.newData').append(
                    '<div id="newRow_'+numRow+'" class="row">'
                        +'<div class="col-md-5">'
                            +'<div class="form-group">'
                                +'<label for="numero_telefonico_frecuente">Número telefonico</label>'
                                +'<input type="tel" maxlength="10" minlength="10" class="form-control" name="numero_telefonico_frecuente[]" placeholder="Capture un número frecuente" required>'
                            +'</div>'
                        +'</div>'

                        +'<div class="col-md-5">'
                            +'<div class="form-group">'
                                +'<label for="telefonia_frecuente">Compañia telefonica</label>'
                                +'<select name="telefonia_frecuente[]" id="telefonia_frecuente" class="custom-select" autocomplete="off" required>'
                                    +'<option value="">Seleccione una telefonia</option>'
                                    @foreach ($telephones as $telephone)
                                                +'<option value="{{ $telephone->id }}">' + '{{ $telephone->name_telefonia }}' +'</option>'
                                    @endforeach
                                +'</select>'
                            +'</div>'
                        +'</div>'
                        +'<div class="col-md-2">'
                            +'<div class="form-group">'
                                +'<center><label>Eliminar número</label> <br>'
                                +'<a id="' + numRow + '" class="btn btn-danger btn-sm remove-link" href="#" role="button"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></center>'
                            +'</div>'
                        +'</div>'
                    +'</div>'
                );
                $('#numRow').val(numRow);
            } else {
                Swal.fire({
                    icon: 'info',
                    title: 'Oops...',
                    text: '¡No puedes agregar mas de 5 números frecuentes!'
                    // ,footer: '<a href="">Why do I have this issue?</a>'
                  })
            }
       });

        $(document).on('click', '.remove-link', function(e){
            e.preventDefault();
            var id = $(this).attr("id");
            $('#newRow_' + id).remove();
            numRow--;
           $('#numRow').val(numRow);
        })
    });


</script>
</html>

