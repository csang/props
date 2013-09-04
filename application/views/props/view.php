<?php
$info = 0;
$info2 = 1;
if($needCorrectInfo == 1){
	$info = 1;
	$info2 = 2;
}elseif($needCorrectInfo == 2){
	$info2 = 0;
}
foreach($props_item->ar_no_escape[$info2] as $p){
	?>
    <div id="adminEdit">
    	<ul>
            <li>PROP</li>
            <li>Amount</li>
            <li>Given for</li>
            <li>Why PROPS</li>
        </ul>
        <h1 id="from">From</h1>
        	<p id="propsFrom"><? echo $p->from_user?></p>
        <h1 id="to">To</h1>
        	<p id="propsTo"><? echo $p->to_user?></p>
         	<p id="amount"><? echo $p->amount?></p>
            <p id="given"><? echo $p->category?></p>
            <p id="why"><? echo $p->why?></p>
            <? if($needCorrectInfo != 2){echo form_open('props/delete'); ?>
            <!--<form method="post" action="delete" enctype="multipart/form-data">-->
            <input type="hidden" value="<? echo $p->prop_id?>" name="prop_id"/>
            <input id="deleteForm" type="submit" value="    " />
            </form><? }?>
    </div>
<?
}
?>