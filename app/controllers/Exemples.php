class Exemples extends \BaseController {
 
    public function index() {
        $services=DAO::getAll("Service");
        foreach ($services as $service){
            echo $service->getNom()."<br>";
        }
	}
    public function users(){
        $users=DAO::getAll("Utilisateur");
        $this->loadView("Exemples/users",array("users"=>$users));
        
        }

   public function disques(){
        $disques=DAO::getAll("Disque");
        $this->loadView("Exemples/disques.html",array("disques"=>$disques));
    }
    public function sortedUsers($field="login",$order="ASC"){
        $fields=["login","mail","tel"];
        if(!array_search($field,$fields))
            $field=$fields[0];
        $header="";
        foreach ($fields as $f){
            $header.="<th>";
            $icon="sort-by-alphabet";
            $url="Exemples/sortedUsers/".$f;
            if($field==$f){
                if(strtoupper($order)=="ASC"){
                    $icon="sort-by-alphabet-alt";
                    $url.="/DESC";
                }
                $header.="<a href='{$url}'>{$f}&nbsp;<span class='glyphicon glyphicon-{$icon}' aria-hidden='true'></span></a>";
            }else{
                $header.="<a href='{$url}'>{$f}</a>";
            }
            $header.="</th>";
        }
        $users=DAO::getAll("Utilisateur","1=1 ORDER BY ".$field." ".$order);
 
 
        $this->loadView("Exemples/sortedUsers.html",array("users"=>$users,"header"=>$header));
    }
    public function usersDisques(){
        $users=DAO::getAll("Utilisateur");
        foreach ($users as $user) {
            DAO::getOneToMany($user, "disques");
            if(sizeof($user->getDisques())>0)
            $this->loadView("exemples/userDisques.html",array("user"=>$user));
        }
    }
	public function displayService($id=null){
        $edit=false;
        $service=null;
        if(isset($id)){
            $service=DAO::getOne("Service", $id);
            $edit=isset($service);
        }
        if(!$edit)
            $service=new Service();
        $this->loadView("exemples/displayService.html",array("service"=>$service));
    }
}