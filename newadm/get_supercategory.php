         <?php
     include("common/gaurav.library.php");
	 $sql_subcat=$conn->prepare("select * from tbl_supercategory where supercat_status='1' AND supercat_scat_id='" . $_POST["p_scat_id"] . "'");
     $result_subcat=$sql_subcat->execute(); ?>
	 <option value="">--Select SubCategory--</option>
      <?php  while($row_subcat=$sql_subcat->fetch(PDO::FETCH_OBJ))
		 {
	  ?>
	<option value="<?php echo $row_subcat->supercat_id; ?>"><?php echo $row_subcat->supercat_name; ?></option>
     <?php } ?>