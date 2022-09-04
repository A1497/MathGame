<?php

session_start();

//$_SESSION['user']="";
//$_SESSION['duration']=0;
$user="";
$duration=0;
$_SESSION['score']=0;
$_SESSION['attempts']=0;

print ("<p style=\"text-align:center\">");
print ("<br/><br/><b><u>Welcome to the Math Quiz!</u></b>");
print ("<br/><br/>Please fill the form below to start your practice session!!<br/><br/>");
print ("</p>");

echo "<form margin='0 auto' width='250px'  action='math.php' method='POST'>
Please enter your name: <input type='text' name='user'><br /><br />
How long would you like to do this quiz ? <br /> <br />
<input type='radio' name='duration' value = '3'
<?php if (isset($duration) && $duration=='3') echo 'checked';?> 3 Minutes
<input type='radio' name='duration' value = '5'
<?php if (isset($duration) && $duration=='5') echo 'checked';?> 5 Minutes
<input type='radio' name='duration' value = '10'
<?php if (isset($duration) && $duration=='10') echo 'checked';?> 10 Minutes
<br /><br />
<input type='submit' name='submit'>
</form>";


?>