<?php
error_reporting(0);

$q1='Do you like to wear long or short sleeves?';
$a11='Long sleeves';	
$a12='Short sleeves';	
$q2='Do you prefer pink or blue?';
$a21='Pink';	
$a22='Blue';	
$q3='Do you prefer round or triangular shapes?';
$a31='Round';	
$a32='Triangular';	



$address = "proj06.htm";
$randomizequestions ="yes"; 

$a = array(
1 => array(
   0 => "$q1",
   1 => "$a11",
   2 => "$a12",
   6 => 2
),
2 => array(
   0 => "$q2",
   1 => "$a21",
   2 => "$a22",
   6 => 1
),
3 => array(
   0 => "$q3",
   1 => "$a31",
   2 => "$a32",
   6 => 2
),
);

$max=3;

$question=$_POST["question"] ;

if ($_POST["Randon"]==0){
        if($randomizequestions =="yes"){$randval = mt_rand(1,$max);}else{$randval=1;}
        $randval2 = $randval;
        }else{
        $randval=$_POST["Randon"];
        $randval2=$_POST["Randon"] + $question;
                if ($randval2>$max){
                $randval2=$randval2-$max;
                }
        }
        
$ok=$_POST["ok"] ;

if ($question==0){
        $question=0;
        $ok=0;
        $percentage=0;
        }else{
        $percentage= Round(100*$ok / $question);
        }
?>


<SCRIPT LANGUAGE='JavaScript'>
<!-- 
function Goahead (number){
        if (document.percentage.response.value==0){
                if (number==<?php print $a[$randval2][6] ; ?>){
                        document.percentage.response.value=1
                        document.percentage.question.value++
                        document.percentage.ok.value++
                }else{
                        document.percentage.response.value=1
                        document.percentage.question.value++
                }
        }
        if (number==<?php print $a[$randval2][6] ; ?>){
                document.question.response.value="Correct"
        }else{
                document.question.response.value="Incorrect"
        }
}
// -->
</SCRIPT>
<h2>Are you a Patty or a Selma?</h2>
<div id='proj06' class='row'>

<?php if ($question<$max){ ?>


<FORM METHOD=POST NAME="question" ACTION="">
<?php print "<br>".$a[$randval2][0].""; ?>
 <BR>     <INPUT TYPE=radio NAME="option" VALUE="1"  onClick=" Goahead (1);"><?php print $a[$randval2][1] ; ?>
<BR>     <INPUT TYPE=radio NAME="option" VALUE="2"  onClick=" Goahead (2);"><?php print $a[$randval2][2] ; ?>

<?php if ($a[$randval2][3]!=""){ ?>
<BR>     <INPUT TYPE=radio NAME="option" VALUE="3"  onClick=" Goahead (3);"><?php print $a[$randval2][3] ; } ?>

<?php if ($a[$randval2][4]!=""){ ?>
<BR>     <INPUT TYPE=radio NAME="option" VALUE="4"  onClick=" Goahead (4);"><?php print $a[$randval2][4] ; } ?>

<?php if ($a[$randval2][5]!=""){ ?>
<BR>     <INPUT TYPE=radio NAME="option" VALUE="5"  onClick=" Goahead (5);"><?php print $a[$randval2][5] ; } ?>
<BR>     <input type=hidden name=response size="8">
</FORM>



<form method="POST" name="percentage" action="<?php print $URL; ?>">


<br>

<?php
echo"
<button type='submit' name='submit' id='add_btn' class='add_btn btn btn-farel' value='Next >>' tabindex='11'>
Next >></button><br>
";
?>
<input type="hidden" name="response" value="0">
<input type="hidden" name=question value=<?php print $question; ?>>
<input type="hidden" name=ok value=<?php print $ok; ?>>
<input type="hidden" name=Randon value=<?php print $randval; ?>>
<br><?php print $question+1; ?> / <?php print $max; ?>
</form>


<?php
}else{

$percentage2=100-$percentage;


if ($percentage>50){
$chara='patty';
echo"
<div class='col-sm-8 col-md-8 col-lg-6 '>
<p>The Quiz has finished. You're $percentage% like Patty! <br><br>Cynical, bitter and unpleasant. Most likely you're also a smoker.</p>
";
}else{
$chara='selma';
echo"
<div class='col-sm-8 col-md-8 col-lg-6 '>

<p>The Quiz has finished. You're $percentage2% like Selma! <br><br>Cynical, bitter and unpleasant. Most likely you're also a smoker.</p>
";
}

?>


<a href="index.php">Repeat quiz</a>
<br>
</div>
<div class='col-sm-4 col-md-4 col-lg-6 '>
<img src='images/<?php print $chara; ?>.png' >	
</div>
<?php } ?>

</div>
