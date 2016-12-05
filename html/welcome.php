&lt;?php

require_once 'includes/global.inc.php';

if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}

$user = unserialize($_SESSION['user']);

?&gt;

&lt;html&gt;
&lt;head&gt;
	&lt;title&gt;Welcome &lt;?php echo $user-&gt;username; ?&gt;&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
	Greetings, &lt;?php echo $user-&gt;username; ?&gt;. You've been registered and logged in. Welcome! &lt;a href="logout.php"&gt;Log out&lt;/a&gt; | &lt;a href="index.php"&gt;Return to Homepage&lt;/a&gt;
&lt;/body&gt;
&lt;/html&gt;