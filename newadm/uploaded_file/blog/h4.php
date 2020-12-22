<?php include("../../common/gaurav.library.php");
echo protect_admin();
?>
<table id="example1" class="table table-bordered table-striped table-responsive">
<thead>
<tr style="background-color:#122F3B;">
<th style="width:10%;color:#fff;">S.No</th>
<th style="width:25%;color:#fff;">User Id</th>
<th style="width:25%;color:#fff;">Admin Name</th>
<th style="width:25%;color:#fff;">password</th>

<th style="width:15%;color:#fff;">Status</th>
<th style="width:25%;color:#fff;">Action</th>
</tr>
</thead>				
<tbody>

<?php
$stmt=$conn->prepare("select * from tbl_admin where adm_type='2' order by adm_id DESC");
$sno=1;
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_OBJ))
{
?>
<tr>
<td><?=$sno;?></td>
<td><?=$row->adm_uid;?></td>
<td><?=$row->adm_name;?></td>
<td><?=$row->adm_password;?></td>
<?php
$status=$row->adm_status;
if($status==1) {$status='Active'; } else {$status='Block';}
?>
<td><?php echo $status;  ?></td>
<td>
&nbsp;&nbsp;&nbsp;<a href="edit_admin.php?admid=<?=$row->adm_id;?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;<a href="manage_admin.php?admid=<?=$row->adm_id;?>" onclick="return checkDelete()"><i class="fa fa-trash" aria-hidden="true"></i></a>
</td>
</tr>
<?php $sno++; } ?>
</tbody>

</table>