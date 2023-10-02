<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="{{ route('Form_especialistaw') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_evaluador" value="{{ $id_sigui }}">

            <input type="checkbox" id="" name="estado_registro" value="A">
            <label>activo</label>
            <br>
            <input type="text" name="apellidos" value="" id="" placeholder="apellidos" /><br>
            <input type="text" name="nombres" value="" id="" placeholder="nombres" /><br>
            <input type="text" name="direccion" value="" id="" placeholder="direccion" /><br>
            <input type="text" name="telefono" value="" id="" placeholder="telefono" /><br>
            <input type="text" name="email" value="" id="" placeholder="email" /><br>
            <input type="file" name="imagen_firma" value="" id="" placeholder="imagen_firma"
                accept=".png, .jpeg, .jpg" />
            <br>
            <select name="Tipo_Especialista_id">

                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach


            </select>
            <br> <p>---------------------------------------------</p>
            <p>Medico ocupacional </p>
            <input type="text" name="MO_RNM" value="" id="" placeholder="MO_RNM" />
                <br>
                <input type="text" name="MO_CMP" value="" id="" placeholder="MO_CMP" />
                <br>
                <input type="text" name="MO_RNE" value="" id="" placeholder="MO_RNE" />
                <br>
            <br> <p>---------------------------------------------</p>
            <p>Medico auditor </p>
            <input type="text" name="MA_RNA" value="" id="" placeholder="MA_RNA" />
                <br>
                <input type="text" name="MA_CMP" value="" id="" placeholder="MA_CMP" />
                <br>
                <input type="text" name="MA_RNM" value="" id="" placeholder="MA_RNM" />
                <br>
                <input type="text" name="MA_RNE" value="" id="" placeholder="MA_RNE" />
                <br>
                <p>---------------------------------------------</p>
            <p>tecnico especialista</p>
            
            <div>
                
                <input type="text" name="ME_RNE" value="" id="" placeholder="ME_RNE" />
                <br>
                <input type="text" name="ME_CMP" value="" id="" placeholder="ME_CMP" /><br>
                <select name="categorias_me">


                    @foreach ($categorias_me as $categoria_me)
                        <option value="{{ $categoria_me->id }}">{{ $categoria_me->nombre }}</option>
                    @endforeach


                </select>
            </div>

            <br> <p>---------------------------------------------</p>
            <p>Odontologia </p>
            <input type="text" name="OD_COP" value="" id="" placeholder="OD_COP" />
                <br>
                <br> <p>---------------------------------------------</p>
            <p>Licenciado en psicologia</p>
            <input type="text" name="PS_CPsP" value="" id="" placeholder="PS_CPsP" />
                <br>
            <br> <p>---------------------------------------------</p>
            <p>laboratorio</p>
            
            <select name="categorias_lo">

                @foreach ($categorias_lo as $categoria_lo)
                    <option value="{{ $categoria_lo->id }}">{{ $categoria_lo->nombre }}</option>
                @endforeach


            </select>

            <p>laboratorio biologo</p>
            <input type="text" name="lo_CBP" value="" id="" placeholder="lo_CBP" />
                <br>

            <p>laboratorio lo_tecnico_medico</p>
            <input type="text" name="tm_lo_CMP" value="" id="" placeholder="lo_CMP" />
                

            <p>laboratorio lo_tecnico_cirujano</p>
            <input type="text" name="tc_lo_CMP" value="" id="" placeholder="lo_CMP" />
                            <br>
            <input type="text" name="lo_RNE" value="" id="" placeholder="lo_RNE" />
                            <br>
            <br>
            <textarea id="descripcion" name="pos_firma" rows="4" cols="50"placeholder="pos_firma"></textarea>
            <br>

            <button type="submit">crear </button>


        </form>
    </div>
</body>

</html>
