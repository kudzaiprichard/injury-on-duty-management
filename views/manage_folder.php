<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM folders where id=".$_GET['id']);
	if($qry->num_rows > 0){
		foreach($qry->fetch_array() as $k => $v){
			$meta[$k] = $v;
		}
	}
}
?>
<div class="container-fluid">
	<form action="" id="manage-folder">
		<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] :'' ?>">
		<input type="hidden" name="parent_id" value="<?php echo isset($_GET['fid']) ? $_GET['fid'] :'' ?>">
		<div class="form-group">
			<label for="name" class="control-label">Folder Name</label>
			<input type="text" name="name" id="name" value="<?php echo isset($meta['name']) ? $meta['name'] :'' ?>" class="form-control">
		</div>
		<div class="form-group" id="msg"></div>

	</form>
</div>
<script>
	$(document).ready(function(){
		$('#manage-folder').submit(function(e){
			e.preventDefault()
			start_load();
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_folder',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(typeof resp != undefined){
					resp = JSON.parse(resp);
					if(resp.status == 1){
						alert_toast("New Folder successfully added.",'success')
						setTimeout(function(){
							location.reload()
						},1500)
					}else{
						$('#msg').html('<div class="alert alert-danger">'+resp.msg+'</div>')
						end_load()
					}
				}
			}
		})
		})
	})
</script>