<?php
use micro\controllers\Controller;
use micro\js\Jquery;
use micro\utils\RequestUtils;

class MyDisques extends Controller{
	public function initialize(){
		if(!RequestUtils::isAjax()){
			$this->loadView("main/vHeader.html",array("infoUser"=>Auth::getInfoUser()));
		}
	}
	public function index() {
		echo Jquery::compile();
		if (Auth::isAuth()==True) //verifier si un utilisateur est bien connecté
			//afficher "Mes Disques->Nom de l'utilisateur "
		$user=Auth::getUser();
		echo "<strong> Mes Disques </strong> ->";
        echo $user -> getLogin();
		   //afficher les disques
		$disques=micro\orm\DAO::getOneToMany($user, "disques");
		$nombredisque=count($disques);
		echo '<br/>';
		for ($num=0; $num > $nombredisque; $num= $num + 1){

		    //espace de disque uccupé.
			$occupation=ModelUtils::getDisqueOccupation($GLOBALS["config"],$disques[$num]);

			//convertir la taille en octet
            $taille=DirectoryUtils::formatBytes($occupation);

			//le pourcentage de chaque disque
			$tarif=ModelUtils::getDisqueTarif($disques[$num]);
			if($tarif -> getPrix()==0)
			    {


			}
			else{


			}
		}


	
		}
	}


	public function finalize(){
		if(!RequestUtils::isAjax()){
			$this->loadView("main/vFooter.html");
		}
	}

}
