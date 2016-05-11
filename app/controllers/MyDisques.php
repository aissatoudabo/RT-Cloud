<?php
use micro\controllers\Controller;
use micro\js\Jquery;
use micro\utils\RequestUtils;

class MyDisques extends Controller
{
	public function initialize()
	{
		if (!RequestUtils::isAjax()) {
			$this->loadView("main/vHeader.html", array("infoUser" => Auth::getInfoUser()));
		}
	}

	public function index()
	{
		echo Jquery::compile();
		if (Auth::isAuth() == True) {//verifier si un utilisateur est bien connecté
			//afficher "Mes Disques->Nom de l'utilisateur "
			$user = Auth::getUser();
			$disques = micro\orm\DAO::getOneToMany($user, "disques");//definir la variable disque
				$this->loadView("exemples/disques.html", array("user" => $user,"disque"=>$disques));//CHARGED FROM VIEW

			 $disques->getOccupation();
			$taille=DirectoryUtils::formatBytes(get.Occupation());
			ModelUtils::sizeConverter("Mo");
			$taille=$disques->getOccupation();
		


			//$occupation = $disque->getOccupation();
			//	echo "Espace occupé : " . $disque->getSize();
			//	echo "Quota : " . $disque->getQuota();
			//	echo "% d'occupation : " . $disque->getOccupation();
			//	ModelUtils::sizeConverter("Mo");
				
			



		}else {
			echo "vous n'étes pas connecté.";
		}
	}

	public function finalize()
		{
			if (!RequestUtils::isAjax()) {
				$this->loadView("main/vFooter.html");
			}
		}


}
