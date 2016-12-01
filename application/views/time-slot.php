<div class="slots" style="display: block;">
<?php
$time_slots=array('9:30','10:00','10:30');
foreach($time_slots as $time)
{
?>
	<input type="checkbox" name="time[]" value="<?php echo $time; ?>" ><label for="time[]"><?php echo $time; ?></label><br/>
<?php
}
?>
</div>