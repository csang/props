<?php
echo form_open('props/search');
$info = 0;
$info2 = 1;
if($needCorrectInfo == 1){
	$info = 1;
	$info2 = 2;
}?>

<div id="welcomeAdmin"><p>Welcome Admin</p></div>
<input list="users" type="text" placeholder="eg. Joe" name="search"/>
<datalist id="users">
<? $number = 1;foreach($users->ar_no_escape[$info] as $d){; ?>
<option value="<? echo($d->name); ?>"/>
<option value="<? echo($d->email); ?>"/>
<? }?>
</datalist>
<input type="submit" value="Search"/>
</form><a href="../props/search">Show All</a>