<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    Illuminate\Support\Facades\DB;
    
use App\Models\User;
use App\Models\Producto;
use App\Models\Contacto;
use App\Models\Deseados;
use App\Models\Categoria;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['']);
        $this->middleware('verified')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $idUser = $request->session()->get('id');
        $idUser = auth()->user()->id;
        $productos = Producto::all();
        $categorias = Categoria::all();
        $users = User::all();
        $deseados = Deseados::all();
        $count=DB::select( "SELECT COUNT(*) as count FROM deseados
                            where iduser = $idUser
                            ");  
        
        $order=DB::select("SELECT producto.*, categoria.categoria
                            FROM producto,categoria
                            WHERE producto.idcategoria=categoria.id
                            ORDER BY categoria.categoria DESC LIMIT 5");
        
        return view('home', ['productos' => $productos, 'categorias' => $categorias, 'users' => $users, 'deseados'=>$deseados, 'count'=>$count, 'order'=>$order]);
        
        
    }
    
    public function product(Request $request, $id)
    {
        $deseados = Deseados::all();
        // $idUser = $request->session()->get('id');
        $idUser = auth()->user()->id;
        
        $producto = DB::select("SELECT producto.*, users.name as name
                                FROM producto, users
                                WHERE producto.iduser = users.id
                                AND producto.id = $id");
        
        $contactos = null;                   
        if($producto[0]->iduser != $idUser) {
             $contactos = DB::select("SELECT producto.*, users.name, contacto.*
                                FROM producto, users, contacto
                                WHERE producto.iduser = users.id
                                AND producto.id = $id
                                AND contacto.idproducto = $id
                                AND contacto.iduser1 = $idUser
                                ");
            if(empty($contactos)) {
                $contacto = ['iduser1' => $idUser, 'iduser2' => $producto[0]->iduser, 'idproducto' => $producto[0]->id, 'is_vendedor' => 0, 'noComment' => true];
                $contactos = [];
                $contactos[] = (object) $contacto;
            }
        }                        

        $count=DB::select("SELECT COUNT(*) as count FROM deseados where iduser = $idUser");  
        return view('product', ['producto' => $producto, 'contactos' => $contactos, 'deseados'=>$deseados, 'count'=>$count]);
    }
    
    
    public function store(Request $request)
    {
        $contacto = new Contacto($request->all());
        try {
            $result = $contacto->save();
        } catch(\Exception $e) {
            $result = 0;
        }
        if($contacto->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $contacto->id];
            return back()->withInput()->with(['success' => 'Se ha creado un usuario']);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }
    
    public function addproduct() {
        $categorias = Categoria::all();
        $productos = Producto::all();
        return view('addproduct', ['categorias' => $categorias, 'productos'=>$productos]);
    }
    
    private function generateBase64Image($producto, $isEditing = false){
        if($_FILES['foto']['error'] == 0) {
            $foto = file_get_contents($_FILES['foto']['tmp_name']);
            
            $base64 = base64_encode($foto);
            if(!$isEditing){
                $producto->foto = $base64;
            }else{
                $producto["foto"] = $base64;
            }
        
        }else {
            $producto->image = '';
        }
        return $producto;
    }   
    
    public function storeproduct(Request $request)
    {
        $producto = new Producto($request->all());
        $producto = $this->generateBase64Image($producto);
        
        try {
            $result = $producto->save();
            return redirect("home");
        } catch(\Exception $e) {
            $result = 0;

        }
        if($producto->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $producto->id];
            return back()->withInput()->with(['success' => 'Se ha creado un producto']);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }
    
    public function deseados(Producto $producto, Request $request){
        // $idUser = $request->session()->get('id');
        $idUser = auth()->user()->id;
        $producto = Producto::all();
        $deseados = Deseados::all();
        
        $wanteds = DB::select("select deseados.id, users.name, producto.id as idproduct, producto.nombre as pname, producto.foto as photo, producto.precio as price, producto.estado as state, deseados.id as wantid
                                from producto, deseados, users where deseados.iduser = $idUser
                                AND deseados.idproducto = producto.id and deseados.iduser = users.id");
        
        
        $deseados = DB::select("SELECT deseados.*, producto.nombre, producto.precio
                                FROM deseados, producto
                                WHERE deseados.idproducto = producto.id
                                AND deseados.iduser = $idUser
                                ");
                                
        $count=DB::select(     "SELECT COUNT(*) as count FROM deseados
                                where iduser = $idUser
                                ");     
        
        
        
        return view('deseados', ['deseados'=> $deseados, 'count'=>$count, 'producto'=>$producto, 'wanteds'=>$wanteds]);
    }
    
    public function adddeseados(Request $request) {
        $deseado = new Deseados($request->all());
       
        try {
            $result = $deseado->save();
            
        } catch(\Exception $e) {
            $result = 0;

        }
        if($deseado->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $deseado->id];
            return back()->withInput()->with(['success' => 'Se ha creado un usuario']);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }
    
    public function comprar(Request $request, $id, $idwanted) {
        $producto = Producto::find($id);
        try {
            $result = $producto->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $producto->id];
             //return redirect('/')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'Algo ha fallado']);
        }
        $deseados = Deseados::find($idwanted);
        //$idwanted = $idwanted;
        try {
            $result = $deseados->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $idwanted];
        //return back();
        return redirect('home')->with($response);
    }
    
    public function mensajes(Request $request) {
        $idUser = auth()->user()->id;
        $deseados = Deseados::all();
        $deseados = DB::select("SELECT deseados.*, producto.nombre, producto.precio, users.id
                                FROM deseados, producto, users
                                WHERE deseados.idproducto = producto.id
                                AND deseados.iduser = $idUser
                                AND producto.id = deseados.idproducto");
                                
        $count=DB::select("SELECT COUNT(*) as count FROM deseados
                            where iduser = $idUser");     
        
        return view ('mensajes',['deseados' => $deseados, 'count' => $count]);
    }
}