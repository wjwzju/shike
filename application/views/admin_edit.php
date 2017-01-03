<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">管理员管理</h3>
	</div>
	<!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="admin/">管理员列表</a> >> <?php echo $admin['id'] === 0 ? '添加管理员' : '编辑管理员--'.$admin['nick']; ?>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<form class="form-horizontal col-lg-8" role="form">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">账号</label>
						<div class="col-sm-10">
							<input class="form-control" name="name" id="name" value="<?php echo $admin['name']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">密码</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password" id="password">
							<?php if($admin['id'] != 0): ?>
							<span class="label label-info">留空则不修改密码</span>
							<?php endif; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="nick" class="col-sm-2 control-label">昵称</label>
						<div class="col-sm-10">
							<input class="form-control" name="nick" id="nick" value="<?php echo $admin['nick']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="permission" class="col-sm-2 control-label">权限</label>
						<div class="col-sm-10">
							<div class="btn-group" >
								<?php $permission = explode(',', $admin['permission']); ?>
								<label class="btn btn-success"><input type="checkbox" name="permission[]" value="base" <?php if(in_array('base', $permission)): ?>checked<?php endif; ?>> 基本管理</label>
								<label class="btn btn-success"><input type="checkbox" name="permission[]" value="examine" <?php if(in_array('examine', $permission)): ?>checked<?php endif; ?>> 留言审核</label>
								<label class="btn btn-success"><input type="checkbox" name="permission[]" value="member" <?php if(in_array('member', $permission)): ?>checked<?php endif; ?>> 会员管理</label>
								<label class="btn btn-success"><input type="checkbox" name="permission[]" value="admin" <?php if(in_array('admin', $permission)): ?>checked<?php endif; ?>> 管理员</label>
								<label class="btn btn-success"><input type="checkbox" name="permission[]" value="speaker" <?php if(in_array('speaker', $permission)): ?>checked<?php endif; ?>> 讲课老师 </label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="rid" class="col-sm-2 control-label">审核房间</label>
						<div class="col-sm-10">
							<div class="btn-group" >
								<?php
								$rid = explode(',', $admin['rid']);
								foreach($rid_list as $v):
								?>
								<label class="btn btn-success"><input type="checkbox" name="rid[]" value="<?php echo $v['id']; ?>" <?php if(in_array($v['id'], $rid)): ?>checked<?php endif; ?>> <?php echo $v['name']; ?></label>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="hidden" name="id" value="<?php echo $admin['id']; ?>">
							<button type="button" class="btn btn-primary" onclick="save_admin()">保存</button>
							<button type="reset" class="btn btn-danger">重置</button>
						</div>
					</div>
				</form>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-6 -->
</div>
<!-- /.row -->

<script>
	
function save_admin(){
	$.post(admin.url+'admin/save_admin',
	$('form').serialize(),
	function (result){
		result = $.parseJSON(result);
		if(result.status){
			alert('保存成功');
			location.href = admin.url+'admin';
		}else{
			alert(result.msg);
		}
	})

}

</script>