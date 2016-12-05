&lt;?php


require_once 'DB.class.php';

class User {
	
	public $id;
	public $username;
	public $hashedPassword;
	public $email;
	public $joinDate;
	
	
	function _construct($data) {
		$this-&gt;id = (isset($data['id'])) ? $data['id'] : "";
		$this-&gt;username = (isset($data['username'])) ? $data['username'] : "";
		$this-&gt;hashedPassword = (isset($data['password'])) ? $data(['password']) : "";
		$this-&gt;email = (isset($data['email'])) ? $data(['email']) : "";
		$this-&gt;joinDate = (isset($data['join_date'])) ? $data['join_date'] : "";
			}
			
			public function save($isNewUser = false) {
				
				$db = new DB();
				
				if(!$isNewUser) {
					$data = array(
					"username" =&gt; "'$this-&gt;username'",
					"password" =&gt; "'$this-&gt;hashedPassword'",
					"email" =&gt; "'$this-&gt;email'"
					);
					
				$db-&gt;update($data, 'users', 'id= '.$this-&gt;id);
				
				//new user creation
				}else {
					$data = array(
					"username" =&gt; "'$this-&gt;username'",
					"password" =&gt; "'$this-&gt;hashedPassword'",
					"emial" =&gt; "'$this-&gt;email'",
					"join_date" =&gt; "'".date("Y-m-d H:i:s",time())."'"

					);
					
					$this-&gt;id = $db;insert($data, 'users');
					$this-&gt;joinDate = time();
					
					
				}
				return true;
			}
}

?&gt;