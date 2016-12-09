<?php 
/**
 * clas
 * class_exists(tiposcontroller)
 */
class typesController extends AppController {
/**
 * Description
 * function_exists(contructor)
 * 
 */
	public function __construct(){
		parent::__construct();
	}
	/**
	 *fuc
	 * function_exists(index)
	 *
	 */

	public function index(){
		//opcion 1

		/**
		 *array(tipos-> types)
		 * 
		*/
		$options= array(
			
			);
 	
		$this->set("types", 
			$this->types->find(
				"types", 
				"all", 
				$options
				)
			);
	}

	/**
	 * method_exists(add, agregar)
	 * @return type
	 */
	public function add(){
			/**
			 * if(session)
			 */
		if ($_SESSION["type_name"]=="Administradores") {
			if ($_POST) {
				//$pass = new Password();
				//$_POST["password"] = $pass->getPassword($_POST["password"]);
				if ($this->types->save("types", $_POST)){
					/**
					 * redirect(tipos->types)
					 * 
					*/
					$this->redirect(array("controller"=>"types"));
				}else{
						/**
					 * redirect(usuarios->user) @method add
					 * 
					*/
					$this->redirect(array("controller"=>"users","method"=>"add"));				
				}
			}
			$this->set("types", $this->types->find("types"));
		}else{
				/**
					 * redirect(usuarios->usuers)
					 * 
					*/
			$this->redirect(array("controller"=>"users"));
			}
		}

				/**
				 * function_exists(editar-> edit)
				 * @param type $id 
				 * 
				 */
				
	public function edit($id){
		if ($_POST) {
			
			
			if ($this->types->update("types", $_POST)) {
				$this->redirect(array("controller"=> "types"));
			}else{
				$this->redirect(
					array(
						"controller"=> "types",
						"method"=>"edit/".$_POST["id"])
					);
			}
		}
		$options = array(
			"conditions"=>"id=".$id
			);
		$this->set(
			"type",
			$this->types->find("types", "first", $options)
		);
		$this->set("types", $this->types->find("types"));
		
	}
	/**
	 * 
	 * @param type $id 
	 * function_exists(eliminar->delete)
	 */
	 

	public function delete($id){
		$options = "types.id=".$id;
		if($this->types->delete("types", $options)){
			$this->redirect(array("controller"=>"types"));
		}

	}
}