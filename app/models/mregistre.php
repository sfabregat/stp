<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mRegistre extends Model{
		public function __construct(){
			parent::__construct();
			
		}
                
                
                 public function reg($em, $pass, $usrname){
                     
                        $sql="call sp_new_user(2, :email, :passwd, :usrname);";
			$this->query($sql);
                        $this->bind(":email", $em);
                        $this->bind(":passwd", $pass);
                        $this->bind(":usrname", $usrname);
			$this->execute();
                        $result=$this->rowCount();
                        
			if($result){
                            return $result;							
			}else 
                        {
                            return -1;
                            
                        }
		}
	}