&lt;?php

require_once 'includes/global.inc.php';

if(!isset($_SESSION['logged_in'])){
	header("Location: login.php");
}

$user = unserialize($_SESSION['user']);

$email = $user-&gt;email;
$message = "";

if(isset($_POST['submit-settings'])){
	
	$email = $_POST['email']
	
	$user-&gt;email = $email;
	$user-&gt;save();
	
	$message = "Settings Saved&lt;br/&gt;";
}
?&gt;


&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;Change Settings&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;?php echo $message; ?&gt;
 
    &lt;form action="settings.php" method="post"&gt;
 
    E-Mail: &lt;input type="text" value="&lt;?php echo $email; ?&gt;" name="email" /&gt;&lt;br/&gt;
    &lt;input type="submit" value="Update" name="submit-settings" /&gt;
 
    &lt;/form&gt;
&lt;/body&gt;
&lt;/html&gt;