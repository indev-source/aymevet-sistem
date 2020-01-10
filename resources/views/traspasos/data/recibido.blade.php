<table id="data" class="table">
    <thead>
    <th class="text-center">#</th>
    <th class="text-center">Envia</th>
    <th class="text-center">Usuario</th>
    <th class="text-center">Fecha</th>
    <th class="text-center">Estatus</th>
    <th class="text-center">Detalle</th>
    </thead>
    <tbody>
    @foreach($traspasos as $traspaso)
        <tr>
            <td class="text-center">{{$traspaso->id}}</td>
            <td class="text-center">{{$traspaso->senvia->nombre}}</td>
            <td class="text-center">{{$traspaso->usuario->name}}</td>
            <td class="text-center">{{$traspaso->created_at}}</td>
            <td class="text-center">{{$traspaso->estatus}}</td>
            <td class="text-center">
                <a href="{{asset('/administrador/traspasos/'.$traspaso->id)}}" class="btn btn-success btn-sm">Detalle</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="content">

</div>
