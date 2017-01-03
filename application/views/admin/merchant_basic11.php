<div class="row" style="height:80px">
    <div class="col-lg-12">
        <h3 class="page-header">商家管理</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form class="row search_form" method="get" action="admin_merchant_basic/member_list">
                    <div class="col-lg-3 col-md-6">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-search"></i>搜索</button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>商家ID</th>
                                <th>注册时间</th>
                                <th>商家账号</th>
                                <th>手机号</th>
                                <th>QQ号</th>
                                <th>会员类型</th>
                                <th>会员到期时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($sellers as $v): ?>
                            <tr>
                               <td><?php echo $v['seller_id'];?></td>
                                <td><?php echo $v['reg_time'];?></td>
                                <td><?php echo $v['account'];?></td>
                                <td><?php echo $v['tel'];?></td>
                                <td><?php echo $v['qq'];?></td>
                                <td><?php echo ($v['level']==1 ? '试用会员':'正式会员');?></td>
                                <td><?php echo $v['end_time'];?></td>
                                <td>
                                    <a href="member/member_edit/<?php echo $v['seller_id']; ?>" class="btn btn-primary">编辑</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php echo $pagin; ?>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->

<script type="text/javascript">

function member_del(id){
    if(confirm('确认删除该会员?')){
        $.post(admin.url+'member/member_del/'+id,'',function (){
            location.reload();
        })
    }
}

</script>