<?php
class Services extends \_DefaultController {

      public function __construct(){
           parent::__construct();
           $this->title="Services";
           $this->model="Service";
      }
      public function frm($id=NULL){
           $service=$this->getInstance($id);
           $this->loadView("exemples/frmService.html",array("service"=>$service));
      }
}