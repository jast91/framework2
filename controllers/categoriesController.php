<?php 
class categoriesController extends AppController {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		//opcion 1
		$options= array(
			
			);

		$this->set("categories", 
			$this->categories->find(
				"categories", 
				"all", 
				$options
				)
			);
	}


	public function add(){

		if ($_SESSION["type_name"]=="Administradores") {
			if ($_POST) {
				//$pass = new Password();
				//$_POST["password"] = $pass->getPassword($_POST["password"]);
				if ($this->categories->save("categories", $_POST)){
					$this->redirect(array("controller"=>"categories"));
				}else{
					$this->redirect(array("controller"=>"users","method"=>"add"));				
				}
			}
			$this->set("categories", $this->categories->find("categories"));
		}else{
			$this->redirect(array("controller"=>"users"));
			}
		}

	public function edit($id){
		if ($_POST) {
			
			
			if ($this->categories->update("categories", $_POST)) {
				$this->redirect(array("controller"=> "categories"));
			}else{
				$this->redirect(
					array(
						"controller"=> "categories",
						"method"=>"edit/".$_POST["id"])
					);
			}
		}
		$options = array(
			"conditions"=>"id=".$id
			);
		$this->set(
			"categorie",
			$this->categories->find("categories", "first", $options)
		);
		$this->set("categories", $this->categories->find("categories"));
		
	}

	public function delete($id){
		$options = "categories.id=".$id;
		if($this->categories->delete("categories", $options)){
			$this->redirect(array("controller"=>"categories"));
		}

	}
}