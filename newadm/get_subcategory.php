         <?php
     include("common/gaurav.library.php");
	 $sql_subcat=$conn->prepare("select * from tbl_subcategory where scat_status='1' AND scat_mcat_id='" . $_POST["p_mcat_id"] . "'");
     $result_subcat=$sql_subcat->execute(); ?>
	 <option value="">--Select SubCategory--</option>
      <?php  while($row_subcat=$sql_subcat->fetch(PDO::FETCH_OBJ))
		 {
	  ?>
	<option value="<?php echo $row_subcat->scat_id; ?>"><?php echo $row_subcat->scat_name; ?></option>
     <?php } ?>