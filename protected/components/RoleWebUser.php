<?php 
	class RoleWebUser extends CWebUser 
	{
		protected $model;
		
		protected function loadUser() {
			if($this->model === null) {
				$this->model = User::model()->findByPk($this->id);
			}
			return $this->model;
		}
		function getLevel() {
			$user = $this->loadUser();
			if($user) {
				return $user->role;
			}
			return 0;
		}
	}
?>