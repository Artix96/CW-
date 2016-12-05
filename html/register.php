&lt;?php

require_once 'includes/global.inc.php';

$username = "";
$password = "";
$password_confirm = "";
$email = "";
$error = "";

if(isset($_POST['submit-form'])){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_confirm = $_POST['']
	$email = $_POST['email'];
	
	$success = true;
	$userTools = new UserTools();
	
	if($userTools-&gt;checkUsernameExists($username))
	{
		$error .= "That username is already taken.&lt;br/&gt; \n\r";
		$success = false;
	}
	
	if($password != $password_confirm) {
		$error .= "Passwords do not match.&lt;br/&gt; \n\r";
		$success = false;
	}
	
	if($success)
	{
		$data['username'] = $username;
		$data['password'] = md5($password);
		$data['email'] = $email;
		
		$newUser = new User($data);
		
		$newUser-&gt;save(true);
		
		$userTools-&gt;login($username, $password);
		
		header("Location: welcome.php");
	}
}

?&gt;

&lt;html&gt;
&lt;head&gt;
	&lt;title&gt;Registration&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
	&lt;?php echo ($error != "") ? $error : ""; ?&gt;
	&lt;form action="register.php" method="post"&gt;
	
	Username: &lt;input type="text" value="&lt;?pgp echo $username; ?&gt;" name="username" /&gt;&lt;br/&gt;
	Password: &lt;input type="password" value="&lt;?php echo $password; ?&gt;" name="password" /&gt;&lt;br/&gt;
	Password (confirm): &lt;input type="password" value="&lt;?php echo $password_confirm; ?&gt;" name="password-confirm" /&gt;&lt;br/&gt;
	E-mail: &lt;input type="text" value="&lt;?php echo $email; ?&gt;" name="email" /&gt;&lt;br/&gt;
	&lt;input type="submit" value="Register" name="submit-form" /&gt;
	
	&lt;/form&gt;
&lt;/body&gt;
&lt;/html&gt;