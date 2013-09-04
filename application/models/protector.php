<?
class Protector extends CI_Model {

	public function __construct()
	{
		if(isset($_SESSION["logged_in"])){
			
			if($_SESSION["logged_in"]==1){

			}else{
				header("location: ../pages/login");
			}
		}else{
			header("location: ../pages/login");
		}
	}
}
?>