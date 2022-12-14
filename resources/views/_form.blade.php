<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items:center">
            <h3>
                {{ __('Registro de nuevo usuario ') }}
            </h3>
        </div>
    </div>

    <div class="card-body">
        <div class="container-fluid">
            <div class="form-group">
                <label for="name">Nombre completo</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Capture su nombre" required>
            </div>
            <div class="form-group">
                <label for="ap_paterno">Apellido paterno</label>
                <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" placeholder="Capture su apellido paterno" required>
            </div>
            <div class="form-group">
                <label for="ap_materno">Apellido materno</label>
                <input type="text" class="form-control" id="ap_materno" name="ap_materno" placeholder="Capture su apellido materno" required>
            </div>

            <div class="form-group">
                <label for="numero_telefonico">Número telefonico</label>
                <input type="tel" maxlength="10" minlength="10" class="form-control" id="numero_telefonico" name="numero_telefonico" placeholder="Capture su número telefonico" required>
            </div>

            <div class="form-group">
                <label for="telefonias">Compañía telefónica</label>
                    <select name="telefonias" id="telefonias" required class="custom-select" autocomplete="off">
                        <option value="">Seleccione una telefonia</option>
                        @foreach ($telephones as $telephone)
                                    <option value="{{ $telephone->id }}">{{ $telephone->name_telefonia }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items:center">
            <h3>
                {{ __('Tus 5 números frecuentes') }}
            </h3>
            <div class="float-right">
                <a class="btn btn-primary btn-sm float-right" data-placement="left" href="#" id="agregarNumeroFrecuente" role="button"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="container-fluid">
            <div id="newRow_1" class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="numero_telefonico_frecuente">Número telefonico</label>
                        <input type="tel" maxlength="10" minlength="10" class="form-control" name="numero_telefonico_frecuente[]" placeholder="Capture un número frecuente" required>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="telefonia_frecuente">Compañia telefonica</label>
                        <select name="telefonia_frecuente[]" id="telefonia_frecuente" class="custom-select" autocomplete="off" required>
                            <option value="">Seleccione una telefonia</option>
                            @foreach ($telephones as $telephone)
                                        <option value="{{ $telephone->id }}">{{ $telephone->name_telefonia }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">

                </div>
            </div>

            <div class="newData"></div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-danger" href="{{route('usuarios.index')}}" role="button">Cancelar</a>
        </div>
    </div>
</div>
