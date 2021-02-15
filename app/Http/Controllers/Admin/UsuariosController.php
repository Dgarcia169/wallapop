<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request,
    Illuminate\Support\Facades\Hash;

use App\Models\User;

use DataTables;

class UsuariosController extends Controller {

    /**
     * Devuelve la vista donde se encuentra la lista de los usuarios
     *
     * @return View
     */
    function view() {
        return view('admin.user_list');
    }
    
    
    /* =====================================================================================================================
    ================================================= MÉTODOS DATATABLE ====================================================
    ===================================================================================================================== */

    /**
     * Devuelve los usuarios en el formato de datatable
     */
    function getDatatable() {
        $query = User::select('id', 'name', 'email', 'admin');
        return Datatables::eloquent($query)
            ->toJson();
    }
    
    /* =====================================================================================================================
    ==================================================== MÉTODOS GET ======================================================
    ===================================================================================================================== */
      
     /**
	 * Devuelve una cantidad de usuarios dependiendo de los parametros
	 *
	 * @access public
	 * @method GET
     * @param Int $id_usuario
	 *
	 * @return JSON
	 */
	function get($id_usuario = null) {
        $usuarios = User::all() -> toArray();

        if(!is_null($id_usuario) && $id_usuario != 0){
            $usuarios = User::find($id_usuario);

            if($usuarios != null)
                $usuarios = $usuarios -> toArray();
            else
                $usuarios = User::all() -> toArray();
        }
        
		return json_encode([true, $usuarios]);
    }
    
    /* =====================================================================================================================
    ==================================================== MÉTODOS POST ======================================================
    ===================================================================================================================== */
    
    /**
	 * Crea un nuevo usuario
	 *
	 * @access public
	 * @method POST
	 * @param Illuminate\Http\Request $request
	 * 		  String  $name
	 *        String  $email
	 *        Boolean $admin
	 *
	 * @return JSON
	 */
    function post(Request $request) {
        //Se cogen asi porque vienen como JSON
        $attributes = $request -> all();

        $userWithSameEmail = User::where('email', $attributes["email"]) -> first();

        if(!is_null($userWithSameEmail)) {
            return json_encode([false, "Ya existe un usuario con ese email"]);
        }

        $usuario = $this -> createUsuarioByRequest($attributes);

        if(!is_null($usuario))
            return json_encode([true, $usuario]);

        return json_encode([false, "No se ha podido crear el usuario"]);
    }
    
    /* =====================================================================================================================
    ==================================================== MÉTODOS PUT =======================================================
    ===================================================================================================================== */
    
    /**
	 * Actualiza la información de un usuario
	 *
	 * @access public
	 * @method PUT
	 * @param Illuminate\Http\Request $request
     *        Int     $id
	 * 		  String  $name
	 *        String  $email
	 *        Boolean $admin
	 *
	 * @return JSON
	 */
    function put(Request $request) {
        //Se cogen asi porque vienen como JSON
        $attributes = $request -> all();

        $usuario = User::find($attributes["id"], "id");
        $userWithSameEmail = User::where('email', $attributes["email"]) -> first();

        
        if(!is_null($usuario)){
            //Si ninguno de los dos usuarios es nulo comprueba si tienen la misma id
            if(!is_null($userWithSameEmail)) {
                //Si tienen la id distinta quiere decir que son usuarios distintos, por lo que no podrá ponerse ese valor
                if($userWithSameEmail -> id != $usuario -> id) {
                    return json_encode([false, "Ya existe un usuario con ese email"]);
                }
            }

            $usuario = $this -> editUsuarioByRequest($attributes, $usuario);

            if(!is_null($usuario))
                return json_encode([true, $usuario]);
        }

        return json_encode([false, "No se ha podido crear el usuario"]);
    }
    
    /* =====================================================================================================================
    ================================================== PRIVATE FUNCTIONS ===================================================
    ===================================================================================================================== */
    
    /**
     * Crea un usuario por los parámetros que le llegan dede el Request
     *
     * @param Array   $attributes
	 * 		  String  $name
	 *        String  $email
	 *        String  $password     
	 *        Boolean $admin
     *
     * @return User|Null
     */
    private function createUsuarioByRequest($attributes) {
        $usuario = new User();
        $usuario -> name     = $attributes["name"];
        $usuario -> password = Hash::make($attributes["password"]);
        $usuario -> email    = $attributes["email"] == null ? "" : $attributes["email"];
        $usuario -> admin    = $attributes["admin"];
        $usuario -> email_verified_at = time();

        if($usuario -> save())
            return $usuario;
            
        return null;
    }
    

    /**
     * Edita un usuario por los parámetros que le llegan dede el Request
     *
     * @param Array   $attributes
	 * 		  String  $name
	 *        String  $email
	 *        Boolean $admin
     * @param User $usuario
     *
     * @return User|Null
     */
    private function editUsuarioByRequest($attributes, $usuario) {
        $usuario -> name  = $attributes["name"];
        $usuario -> email = $attributes["email"] == null ? "" : $attributes["email"];
        $usuario -> admin = $attributes["admin"];

        if($usuario -> save())
            return $usuario;
            
        return null;
    }
}