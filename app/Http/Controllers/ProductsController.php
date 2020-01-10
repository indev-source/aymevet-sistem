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
        $this->middleware('userRol')->except(['index']);
    }
    public function products(){
        return $this->products->getProducts('activos')->select($this->select);
    }
    public function getProductById($productId){
        return ProductRepository::findOrFail($productId);
    }
    public function index(){
        $products  = $this->products()->get();
        return view('products.index',['products'=>$products,'msg'=>'Productos generales del inventario']);
    }
    public function category(Request $request, CategoryRepository $categoryObj){
        $products  = $this->products()->category($request->categoria)->get();
        return view('products.index',['products'=>$products,'msg'=>'Productos por categoria']);
    }
    public function brand(Request $request, BrandRepository $brandObj){
        $products  =   $this->products()->brand($request->marca)->get();
        return view('products.index',['products'=>$products,'msg'=>'Productos por marca']);
    }
    public function provider(Request $request){
        $products  = $this->products()->provider($request->proveedor)->get();
        return view('products.index',['products'=>$products,'msg'=>'Productos por proveedor']);
    }
    public function business(Request $request){
        $products  = $this->products()->business($request->sucursal)->get();
        return view('products.index',['products'=>$products,'msg'=>'Productos por sucursal']);
    }
    public function store(ProductRequestStore $request, ProductRepository $product){
        try{
            $response = $product->createProduct($request->all());
            return redirect('administrador/productos')->with('status_success','El producto fue agregado exitosamente');
        }catch(\Exception $e){
            return back()->with('status_warning',$e->getMessage());
        }
    }
    public function update(Request $request, $productId){
        try{
            $this->getProductById($productId)->editProduct($request->all());
            return redirect('/administrador/productos')->with('status_success','El producto fue actualizado correctamente');
        }catch(\Exception $e){
            return back()->with('status_warning',$e->getMessage());
        }
    }
    public function destroy($productId){
        try{
            $this->getProductById($productId)->changeStatus('inactivo');
            return redirect('/dashboard/v/admin/productos')->with('status_success','El producto fue dado de baja correctamente');
        }catch(\Exception $e){
            return back()->with('status_warning',$e->getMessage());
        }
    }
    public function create(){
        return view('products.create',[
            'business'=>BusinessRepository::all(), 
            'categories'=>CategoryRepository::all(),
            'brands'=> BrandRepository::all(), 
            'providers'=> ProviderRepository::all()
        ]);
    }
    public function edit($productId){
        return view('products.edit',[
            'product'=>$this->getProductById($productId),
            'business'=>BusinessRepository::all(),
            'categories'=>CategoryRepository::all(), 
            'brands'=> BrandRepository::all(),
            'providers'=> ProviderRepository::all()
        ]);
    }
}
