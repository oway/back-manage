{extends file='Layouts/base.tpl'}
{block name=base_content}
    <table class="table table-bordered table-hover">
        <thead>
        <tr class="center">
            <th class="text-center">序号</th>
            <th class="text-center">用户名</th>
            <th class="text-center">所属角色</th>
            <th class="text-center">最后登陆IP</th>
            <th class="text-center">最后登陆时间</th>
            <th class="text-center">电子邮箱</th>
            <th class="text-center">真实姓名</th>
            <th class="text-center">管理操作</th>
        </tr>
        </thead>
        <tbody>
        {if isset($data['rows']) && !empty($data['rows'])}
            {foreach $data['rows'] as $v}
                <tr class="center">
                    <td class="text-center">{$v.adminid}</td>
                    <td class="text-center">{$v.username}</td>
                    <td class="text-center">{$v.rolename}</td>
                    <td class="text-center">{$v.lastloginip}</td>
                    <td class="text-center">{date('Y-m-d H:i:s',$v.lastlogintime)}</td>
                    <td class="text-center">{$v.email}</td>
                    <td class="text-center">{$v.realname}</td>
                    <td class="text-center">
                        <a href="/admin/setAdminPriv?adminid={$v.adminid}" class="btn btn-success glyphicon glyphicon-zoom-in icon-white" title="更改权限"></a>&nbsp;&nbsp;
                        <a href="/admin/edit?adminid={$v.adminid}" class="btn btn-info glyphicon glyphicon-edit icon-white" title="编辑"></a>&nbsp;&nbsp;
                        <a href="/admin/del?adminid={$v.adminid}"  class="btn btn-danger glyphicon glyphicon-trash icon-white del" title="删除"></a>
                    </td>
                </tr>
            {/foreach}
        {/if}
        </tbody>
    </table>
    {if isset($data['pages'])}
        {$data['pages']}
    {/if}
{/block}