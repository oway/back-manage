{extends file='Layouts/base.tpl'}
{block name=base_content}
<form action="{U()}" method="post">
<div class="form-horizontal col-sm-10">
    <div class="form-group">
        <label for="username" class="col-sm-3 control-label no-padding-right">管理员名称<span class="required">*</span></label>
        <div class="col-sm-4"><input type="text" name="username" class="form-control" id="username" placeholder="请输入管理员名称"></div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-3 control-label no-padding-right">密码<span class="required">*</span></label>
        <div class="col-sm-4"><input type="password" name="password" class="form-control" id="password" placeholder="请填入密码"></div>
    </div>
    <div class="form-group">
        <label for="roleid" class="col-sm-3 control-label no-padding-right">所属角色<span class="required">*</span></label>
        {$roleList}
    </div>
    <div class="form-group">
        <label for="realname" class="col-sm-3 control-label no-padding-right">真实姓名<span class="required">*</span></label>
        <div class="col-sm-4"><input type="text" name="realname" class="form-control" id="realname" placeholder="请填入真实姓名"></div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-3 control-label no-padding-right">邮箱<span class="required">*</span></label>
        <div class="col-sm-4"><input type="text" name="email" class="form-control" placeholder="eg:zhangsan@gmail.com"></div>
    </div>
    <div class="form-group">
        <label for="card" class="col-sm-3 control-label no-padding-right">签名</label>
        <div class="col-sm-4"><textarea name="card" class="form-control" id="card"></textarea></div>
    </div>
    <div class="form-group">
        <div for="save" class="col-sm-3 control-label no-padding-right"></div>
        <button type='submit' class='btn btn-primary' id="save"><i class="ace-icon fa fa-save"></i>保存</button>
    </div>
</div>
</form>
{/block}