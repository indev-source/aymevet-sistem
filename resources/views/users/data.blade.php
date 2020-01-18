<table id="data" class="table table-striped">
    <thead>
        <th class="text-center">Nombre</th>
        <th class="text-center">Email</th>
        <th class="text-center">Ruta</th>
        <th class="text-center">Rol</th>
        <th class="text-center">Acciones</th>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td class="text-center">
                    {{$user->name}}
                </td>
                <td class="text-center">{{$user->email}}</td>
                <td class="text-center text-uppercase">{{$user->business->nombre}}</td>
                <td class="text-center text-uppercase">{{$user->rol}}</td>
                <td class="text-center ">
                    <a href="{{asset('perfil?empleado='.$user->id)}}" class="btn btn-primary"><span class="fa fa-user"></span> Pefil</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>