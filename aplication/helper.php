<?php

class Helper
{	
	protected $_controller;
	protected $_method;

	public function __construct(){
		$petition = new Request();
		$this->_controller = $petition->getController();
		$this->_method = $petition->getMethod();
	}
}

class Html extends Helper
{
	public function __construct(){
		parent::__construct();
	}

	public function link($title, $url = nell, $options= array()){
		$attributes = "";

		if (is_array($url)) {
			if (!empty($url["controller"]) and !empty($url["method"])) {
				$path = "/".implode("/", $url);
			}else if (!empty($url["controller"])){
				$path .= "/".$url["controller"].$this->_method;
				if (!empty($url["args"])){
					$path .= "/".$url["args"];
				}
			}else if (!empty($url["method"])) {
				$path = "/".$this->_controller."/".$url["method"];
				if (!empty($url["args"])){
					$path .= "/".$url["args"];
				}
			}
		}else{
			$path = $url;
		}

		if (!empty($options["title"])) {
			$attributes = "title=\"".$options["title"]."\"";
		}
		if (!empty($options["target"])){
			if (empty($attributes)) {
				$attributes = "target=\"".$options["target"]."\"";
			}else{
				$attributes .= " target=\"".$options["target"]."\"";
			}
		}
		$link = "<a href =\"".APP_URL.$path."\" ".
		$attributes.">".$title."</a>";
		return $link;
		
	}
}