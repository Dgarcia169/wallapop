<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Categoria;

use DataTables;

class CategoriasController extends Controller {

    /**
     * Devuelve la vista donde se encuentra la lista de los usuarios
     *
     * @return View
     */
    function view() {
        return view('admin.categories_list');
    }
    
    
    /* =====================================================================================================================
    ================================================= MÉTODOS DATATABLE ====================================================
    ===================================================================================================================== */

    /**
     * Devuelve los usuarios en el formato de datatable
     */
    function getDatatable() {
        return Datatables::eloquent(Categoria::query())
            ->toJson();
    }
    
    /* =====================================================================================================================
    ==================================================== MÉTODOS GET ======================================================
    ===================================================================================================================== */
      
    /**
	 * Devuelve una cantidad de categorias dependiendo de los parametros
	 *
	 * @access public
	 * @method GET
     * @param Int $id_categoria
	 *
	 * @return JSON
	 */
	function get($id_categoria = null) {
        $categorias = Categoria::all() -> toArray();

        if(!is_null($id_categoria) && $id_categoria != 0){
            $categorias = Categoria::find($id_categoria);

            if($categorias != null)
                $categorias = $categorias -> toArray();
            else
                $categorias = Categoria::all() -> toArray();
        }
        
		return json_encode([true, $categorias]);
    }
    
    /* =====================================================================================================================
    ==================================================== MÉTODOS POST ======================================================
    ===================================================================================================================== */
    
    /**
	 * Crea una nueva categoria
	 *
	 * @access public
	 * @method POST
	 * @param Illuminate\Http\Request $request
	 * 		  String  $categoria
	 *
	 * @return JSON
	 */
    function post(Request $request) {
        //Se cogen asi porque vienen como JSON
        $attributes = $request -> all();

        $categoriaWithSameName = Categoria::where('categoria', $attributes["categoria"]) -> first();

        if(!is_null($categoriaWithSameName)) {
            return json_encode([false, "Ya existe una categoria con ese nombre"]);
        }

        $categoria = $this -> createCategoriaByRequest($attributes);

        if(!is_null($categoria))
            return json_encode([true, $categoria]);

        return json_encode([false, "No se ha podido crear la categoria"]);
    }
    
    /* =====================================================================================================================
    ==================================================== MÉTODOS PUT =======================================================
    ===================================================================================================================== */
    
    /**
	 * Actualiza la información de una categoria
	 *
	 * @access public
	 * @method PUT
	 * @param Illuminate\Http\Request $request
     *        Int     $id
	 * 		  String  $categoria
	 *
	 * @return JSON
	 */
    function put(Request $request) {
        $attributes = $request -> all();

        $categoria = Categoria::find($attributes["id"], "id");
        $categoriaWithSameName = Categoria::where('categoria', $attributes["categoria"]) -> first();

        if(!is_null($categoria)){
            //Si ninguna de las dos categorias es nula comprueba si tienen la misma id
            if(!is_null($categoriaWithSameName)) {
                //Si tienen la id distinta quiere decir que son categorias distintas, por lo que no podrá ponerse ese valor
                if($categoriaWithSameName -> id != $categoria -> id) {
                    return json_encode([false, "Ya existe una categoria con ese nombre"]);
                }
            }

            $categoria = $this -> editCategoriaByRequest($attributes, $categoria);

            if(!is_null($categoria))
                return json_encode([true, $categoria]);
        }

        return json_encode([false, "No se ha podido crear la categoria"]);
    }
    
    /* =====================================================================================================================
    ================================================== PRIVATE FUNCTIONS ===================================================
    ===================================================================================================================== */
    
    /**
     * Crea una categoria por los parámetros que le llegan dede el Request
     *
     * @param Array   $attributes
	 * 		  String  $name
     *
     * @return Categoria|Null
     */
    private function createCategoriaByRequest($attributes) {
        $categoria = new Categoria();
        $categoria -> categoria = $attributes["categoria"];

        if($categoria -> save())
            return $categoria;
            
        return null;
    }
    

    /**
     * Edita una categoria por los parámetros que le llegan dede el Request
     *
     * @param Array   $attributes
	 * 		  String  $name
     * @param Categoria $categoria
     *
     * @return Categoria|Null
     */
    private function editCategoriaByRequest($attributes, $categoria) {
        $categoria -> categoria     = $attributes["categoria"];

        if($categoria -> save())
            return $categoria;
            
        return null;
    }
}