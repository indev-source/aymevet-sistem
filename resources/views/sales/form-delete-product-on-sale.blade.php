<form action="{{asset('dashboard/orden/productos_orden/delete/')}}" method="post">
    @csrf
    <input type="hidden" required="" name="producto_id" value="{{$producto->product_id}}">
    <td class="text-center">
        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
    </td>
</form>