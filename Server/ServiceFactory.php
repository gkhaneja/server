<?php
include_once 'Rest/RestService.php';
include_once 'Rest/UserService.php';

 class ServiceFactory
 {
    public $baseService;
    public $baseSupportedMethods;
    
    public function  __construct($uri)
    {
    	$this->baseService = $this->findService($uri);
    	if(!$this->baseService)
    	{
    		$this->baseSupportedMethods = "'GET','POST','PUT','DELETE'";
    		$this->baseService = new RestService($this->baseSupportedMethods);
    	}
    		
    }
    
    public function  getService()
    {
    	return $this->baseService;
    }
    
    private function  findService($uri)
    {
    	$parts=explode('/',$uri);
    	$last_part=$parts[3];
    	
//     	if(strpos($last_part,'.')!==FALSE) {
//     		$last_part=explode('.',$last_part);
//     		$last_part=$last_part[0];
//     	}
    	echo "Last Part: " . $last_part ."\n";

    	if(strcasecmp($last_part,'User') == 0 )
    	{
    		 return new UserService("'GET'");
    	}
    	
    	return null;
    }
 }