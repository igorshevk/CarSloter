         <?php
     include("common/config.php");
	 $sql_subcat=$conn->prepare("select * from tbl_origin where o_status='1' AND o_country_id='" . $_POST["o_country_id"] . "'");
     $result_subcat=$sql_subcat->execute(); ?>
	 <option value="">--Select Origin--</option>
      <?php  while($row_subcat=$sql_subcat->fetch(PDO::FETCH_OBJ))
		 {
	  ?>
	<option value="<?php echo $row_subcat->o_id; ?>"><?php echo $row_subcat->o_title; ?></option>
     <?php } ?>