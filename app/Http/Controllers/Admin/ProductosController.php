<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Producto;

use DataTables;

class ProductosController extends Controller {

    /**
     * Devuelve la vista donde se encuentra la lista de los productos
     *
     * @return View
     */
    function view() {
        return view('admin.product_list');
    }
    
    
    /* =====================================================================================================================
    ================================================= MÉTODOS DATATABLE ====================================================
    ===================================================================================================================== */

    /**
     * Devuelve los productos en el formato de datatable
     */
    function getDatatable() {
        return Datatables::eloquent(Producto::query())
            ->toJson();
    }
    
    /* =====================================================================================================================
    ==================================================== MÉTODOS POST ======================================================
    ===================================================================================================================== */
    
    /**
	 * Crea un nuevo producto
	 *
	 * @access public
	 * @method POST
	 * @param Illuminate\Http\Request $request
     *        Int     $idProducto
     *        Int     $idcategoria
     *        String  $nombre
     *        String  $descripcion
     *        String  $uso
     *        Double  $precio
     *        String  $date
     *        String  $estado
     *        File    $foto
	 *
	 * @return JSON
	 */
    function post(Request $request) {
        //Se cogen asi porque vienen como JSON
        $attributes = $request -> all();
        
        $producto = $this -> createProductoByRequest($attributes);

        if(!is_null($producto))
            return json_encode([true, $producto]);

        return json_encode([false, "No se ha podido crear el producto"]);
    }
    
    /* =====================================================================================================================
    ==================================================== MÉTODOS PUT =======================================================
    ===================================================================================================================== */
    
    /**
	 * Actualiza la información de un producto
	 *
	 * @access public
	 * @method PUT
	 * @param Illuminate\Http\Request $request
     *        Int     $id
     *        Int     $idProducto
     *        Int     $idcategoria
     *        String  $nombre
     *        String  $descripcion
     *        String  $uso
     *        Double  $precio
     *        String  $date
     *        String  $estado
     *        File    $foto
	 *
	 * @return JSON
	 */
    function put(Request $request) {
        //Se cogen asi porque vienen como JSON
        $attributes = $request -> all();
        
        $producto = Producto::find($attributes["id"], "id");
        
        if(!is_null($producto)){
            $producto = $this -> editProductoByRequest($attributes, $producto);

            if(!is_null($producto))
                return json_encode([true, $producto]);
        }

        return json_encode([false, "No se ha podido crear el producto"]);
    }
    
    /* =====================================================================================================================
    ================================================== PRIVATE FUNCTIONS ===================================================
    ===================================================================================================================== */
    
    /**
     * Crea un producto por los parámetros que le llegan dede el Request
     *
     * @param Array   $attributes
     *        Int     $idProducto
     *        Int     $idcategoria
     *        String  $nombre
     *        String  $descripcion
     *        String  $uso
     *        Double  $precio
     *        String  $date
     *        String  $estado
     *        File    $foto
     *
     * @return Producto|Null
     */
    private function createProductoByRequest($attributes) {
        $producto = new Producto();
        $producto -> iduser      = $attributes["iduser"];
        $producto -> idcategoria = $attributes["idcategoria"];
        $producto -> nombre      = $attributes["nombre"];
        $producto -> descripcion = $attributes["descripcion"];
        $producto -> uso         = $attributes["uso"];
        $producto -> precio      = $attributes["precio"];
        $producto -> fecha       = $attributes["fecha"];
        $producto -> estado      = $attributes["estado"];
        $producto -> foto        = $this -> generateBase64Image($attributes["foto"]);
        
        if($producto -> save()) {
            return $producto;
        } 
        
        return null;
    }
    

    /**
     * Edita un producto por los parámetros que le llegan dede el Request
     *
     * @param Array   $attributes
     *        Int     $idProducto
     *        Int     $idcategoria
     *        String  $nombre
     *        String  $descripcion
     *        String  $uso
     *        Double  $precio
     *        String  $date
     *        String  $estado
     *        File    $foto
     * @param Producto $producto
     *
     * @return Producto|Null
     */
    private function editProductoByRequest($attributes, $producto) {
        $producto -> iduser      = $attributes["iduser"];
        $producto -> idcategoria = $attributes["idcategoria"];
        $producto -> nombre      = $attributes["nombre"];
        $producto -> descripcion = $attributes["descripcion"];
        $producto -> uso         = $attributes["uso"];
        $producto -> precio      = $attributes["precio"];
        $producto -> estado      = $attributes["estado"];
        $producto -> foto        = $this -> generateBase64Image($attributes["foto"]);
        
        if($producto -> save()) {
            return $producto;
        } 
        
        return null;

    }
    
    private function generateBase64Image($image){
        if($image != null && !is_string($image)) {
            $foto = file_get_contents($image);
            
            $base64 = base64_encode($foto);
            
            return $base64;
        }else if($image != null) {
            return $image;
        }
        
        return "";
    }   
}