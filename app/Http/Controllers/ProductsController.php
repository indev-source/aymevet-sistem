<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\ProductRepository;
use App\models\CategoryRepository;
use App\models\BrandRepository;
use App\models\ProviderRepository;
use App\models\BusinessRepository;
use App\Http\Requests\ProductRequestStore;
class ProductsController extends Controller{

    public function __construct(ProductRepository $products){
        $this->products = $products;
        $this->select = ['id','nombre','existencia','costo','categoria_id','marca_id','proveedor_id','bussine_id'];
        $this->activos = 'activos';
        $this->middleware('userRol');
    }
    public function products(){
        return $this->products->getProducts($this->activos)->select($this->select);
    }
    public function getProductById($productId){
        return $this->products->findOrFail($productId);
    }

    //metodo que obtiene todos los productos generales activos
    public function index(Request $request){
        $products  = $this->products()->get();
        return view('products.index',['products'=>$products,'msg'=>'Inventario general']);
    }
    //metodo que obtiene todos los productos por la categoria seleccionada
    public function category(Request $request, CategoryRepository $categoryObj){
        $products  = $this->products()->category($request->categoria)->get();
        return view('products.index',['products'=>$products,'msg'=>'Productos por categoria']);
    }
    //metodo que obtiene todos los productos por la marca seleccionada
    public function brand(Request $request, BrandRepository $brandObj){
        $products  = $this->products()->brand($request->marca)->get();
        return view('products.index',['products'=>$products,'msg'=>'Productos por marca']);
    }
    //metodo que obtiene todos los productos por el proveedor seleccionado
    public function provider(Request $request){
        $products  = $this->products()->provider($request->proveedor)->get();
        return view('products.index',['products'=>$products,'msg'=>'Productos por proveedor']);
    }
    //metodo que obtiene todos los productos por ruta
    public function business(Request $request){
        $products  = $this->products()->business($request->sucursal)->get();
        return view('products.index',['products'=>$products,'msg'=>'Productos por sucursal']);
    }
    public function search(Request $request){
        $products = $this->products()->search($request)->get();
        alert()->success($products->count().'Producto(s) encontrados');
        return view('products.index',['products'=>$products,'msg'=>'Inventario general']);
    }

    //metodo que agrega productos a la base de datos
    public function store(ProductRequestStore $request, ProductRepository $product){
        try{
            $response = $product->createProduct($request->all());
            alert()->success('El producto fue agregado exitosamente');
            return redirect('administrador/productos');
        }catch(\Exception $e){
            alert()->error('Error Message', 'Error en el servidor: '.$e->getMessage());
            return back();
        }
    }
    //metodo para actualizar productos
    public function update(Request $request, $productId){
        try{
            $this->getProductById($productId)->editProduct($request->all());
            alert()->success('El producto fue actualizado correctamente');
            return redirect('/administrador/productos');
        }catch(\Exception $e){
            alert()->error('Error Message', 'Error en el servidor: '.$e->getMessage());
            return back();
        }
    }
    //metodo para dar de baja productos
    public function destroy($productId){
        try{
            $this->getProductById($productId)->changeStatus('inactivo');
            alert()->success('El producto fue dado de baja correctamente');
            return redirect('/administrador/productos');
        }catch(\Exception $e){
            alert()->error('Error Message', 'Error en el servidor: '.$e->getMessage());
            return back();
        }
    } 
    //metodo para mostrar la vista de registro de un nuevo producto
    public function create(){
        return view('products.create',[
            'business'=>BusinessRepository::all(), 
            'categories'=>CategoryRepository::all(),
            'brands'=> BrandRepository::all(), 
            'providers'=> ProviderRepository::all()
        ]);
    }
     //metodo para mostrar la vista de actualizacion de un nuevo producto
    public function edit($productId){
        $product = $this->getProductById($productId);

        if($product->existencia <= 5)
            alert()->warning('la cantidad de producto llego al limite minimo en existencia');

        return view('products.edit',[
            'product'=>$product,
            'business'=>BusinessRepository::all(),
            'categories'=>CategoryRepository::all(), 
            'brands'=> BrandRepository::all(),
            'providers'=> ProviderRepository::all()
        ]);
    }
}
