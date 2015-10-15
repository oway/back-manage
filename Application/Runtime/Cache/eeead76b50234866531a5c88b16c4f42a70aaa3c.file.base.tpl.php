<?php /* Smarty version Smarty-3.1.6, created on 2015-10-15 16:08:02
         compiled from "./Application/Admin/View/Layouts/base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6602022561f5d562c70e5-73059951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eeead76b50234866531a5c88b16c4f42a70aaa3c' => 
    array (
      0 => './Application/Admin/View/Layouts/base.tpl',
      1 => 1444896479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6602022561f5d562c70e5-73059951',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_561f5d563c1b0',
  'variables' => 
  array (
    'menu' => 0,
    'value' => 0,
    'values' => 0,
    'v' => 0,
    'breadcrumb' => 0,
    'k' => 0,
    'threeMenu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561f5d563c1b0')) {function content_561f5d563c1b0($_smarty_tpl) {?><!--[if !IE]> -->
<?php echo @__JS__;?>

<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo @__JS__;?>
/jquery.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='__JS__/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    var func = [];
    function ready(fun) {
        func.push(fun);
    }
    window.onload = function() {
        setInterval(showTime,1000);
        for(var i in func) {
            func[i]();
        }
    };
    function showTime() {
        var now = new Date();
        year = now.getFullYear();
        month = now.getMonth();
        day = now.getDate();
        hours = now.getHours();
        minutes = now.getMinutes();
        seconds = now.getSeconds();
        minutes = checkTime(minutes);
        seconds = checkTime(seconds);
        month = checkTime(month);
        day = checkTime(day);
        hours = checkTime(hours);
        str = year+'-'+month+'-'+day+' '+hours+':'+minutes+':'+seconds;
        $('#date').html(str);
    }
    function checkTime(i) {
        if(i<10) {
            i = "0" + i;
        }
        return i;
    }
</script>
<style type="text/css">
    
    .required{ color: red;margin-left:5px;}
    input[type=radio],input[type=checkbox]{margin-right:5px;}
    input.error{border:1px solid #ebccd1;color:#a94442;background-color:#F2DEDD}
    span.error{color:#a94442;}
    
</style>
<!-- topbar starts -->
<div class="navbar navbar-default" role="navigation">

    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/home/index"><span>Bamboo Manage</span></a>

        <!-- user dropdown starts -->
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"><?php echo $_COOKIE['_uid'];?>
</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="/admin/changePassword?adminid=<?php echo $_COOKIE['_uid'];?>
">修改密码</a></li>
                <li class="divider"></li>
                <li><a href="/index/logout">退出登陆</a></li>
            </ul>
        </div>
        <!-- user dropdown ends -->

        <!--timw start---->
        <div class="btn-group pull-right animated tada">
            <span class="hidden-sm hidden-xs" id="date"></span>
        </div>
        <!--time end-->

        <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            <li><a href="/home/index"><i class="glyphicon glyphicon-globe"></i>首页</a></li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i>下拉菜单
                    <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                </ul>
            </li>
        </ul>

    </div>
</div>
<!-- topbar ends -->

<div class="main-container" id="main-container">
    <div class="ch-container">
        <div class="row">
            <!-- left menu starts -->
            <div class="col-sm-2 col-lg-2">
                <div class="sidebar-nav">
                    <div class="nav-canvas">
                        <div class="nav-sm nav nav-stacked">

                        </div>
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <?php if (!empty($_smarty_tpl->tpl_vars['menu']->value)){?>
                            <li class="nav-header">菜单</li>
                            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                                <li class="<?php if (isset($_smarty_tpl->tpl_vars['value']->value['child'])&&!empty($_smarty_tpl->tpl_vars['value']->value['child'])){?>accordion<?php }?>">
                                    <a class="" href="<?php if (isset($_smarty_tpl->tpl_vars['value']->value['rules'])&&!empty($_smarty_tpl->tpl_vars['values']->value['rules'])){?><?php echo $_smarty_tpl->tpl_vars['values']->value['rules'];?>
<?php }?>">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['icon'])){?><i class="glyphicon glyphicon-<?php echo $_smarty_tpl->tpl_vars['value']->value['icon'];?>
"></i><?php }?>
                                        <span><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</span>
                                    </a>
                                    <?php if (isset($_smarty_tpl->tpl_vars['value']->value['child'])&&!empty($_smarty_tpl->tpl_vars['value']->value['child'])){?>
                                        <ul class="nav nav-pills nav-stacked">
                                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['value']->value['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->iteration++;
?>
                                                <li>
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['rules'];?>
">
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['icon'])){?><i class="glyphicon glyphicon-<?php echo $_smarty_tpl->tpl_vars['v']->value['icon'];?>
"></i><?php }?><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>

                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php }?>
                                </li>
                            <?php } ?>
                        </ul>
                        <?php }?>
                    </div>
                </div>
            </div>
            <!--/span-->
            <!-- left menu ends -->
            <div class="main-content">
                <!---正文-->
                <div id="content" class="col-lg-10 col-sm-10">
                    <!-- content starts -->
                    <?php if (!empty($_smarty_tpl->tpl_vars['breadcrumb']->value)){?>
                        <div>
                            <ul class="breadcrumb">
                                <li>
                                    <i class='glyphicon glyphicon-home blue' style="font-size: 20px"></i> 控制台
                                </li>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['v']->iteration++;
?>
                                    <li>
                                        <?php if ($_smarty_tpl->tpl_vars['k']->value!='//'&&$_smarty_tpl->tpl_vars['v']->iteration!=1){?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a>
                                        <?php }else{ ?>
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>

                                        <?php }?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php }?>
                    <!---errorMessage end----->

                    <!----three start---->
                    <?php if (!empty($_smarty_tpl->tpl_vars['threeMenu']->value)){?>
                        <p>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['threeMenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['v']->iteration++;
?>
                                <a href="<?php if ($_smarty_tpl->tpl_vars['v']->value['m']){?>/<?php echo $_smarty_tpl->tpl_vars['v']->value['m'];?>
<?php }?>/<?php echo $_smarty_tpl->tpl_vars['v']->value['c'];?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['a'];?>
<?php if (!empty($_smarty_tpl->tpl_vars['v']->value['data'])){?>?<?php echo $_smarty_tpl->tpl_vars['v']->value['data'];?>
<?php }?>" class="btn btn-primary btn-sm"><?php if (!empty($_smarty_tpl->tpl_vars['v']->value['icon'])){?> <i class='ace-icon fa fa-<?php echo $_smarty_tpl->tpl_vars['v']->value['icon'];?>
'></i><?php }?><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a>
                            <?php } ?>
                        </p>
                    <?php }?>
                    <!----three end------>

                    <!---content start--->
                    __CONTENT__
                    <!---content end------>
                </div>
            </div>
        </div>
    </div>



    <!-- basic scripts -->
    <script type="text/javascript">
        if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo @__JS__;?>
/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>

    <script type="text/javascript" src="__JS__/bootstrap.min.js"></script>
    <script type="text/javascript" src="__JS__/jquery-ui.min.js"></script>
    <!-- page specific plugin scripts -->
    <!--[if lte IE 8]>
    <script src="__JS__/excanvas.min.js"></script>
    <![endif]-->

    <!--日期选择-->
    <script src="__JS__/date-time/bootstrap-datepicker.min.js"></script>
    <script src="__JS__/date-time/bootstrap-timepicker.min.js"></script>
    <script src="__JS__/date-time/moment.min.js"></script>
    <script src="__JS__/date-time/daterangepicker.min.js"></script>
    <script src="__JS__/date-time/bootstrap-datetimepicker.min.js"></script>
    <!--图片上传-->
    <script type="text/javascript" src="__JS__/plupload/plupload.full.min.js"></script>

    <!--后台页面基本js-->
    <script type="text/javascript" src="__JS__/charisma/charisma.js"></script>
    <script type="text/javascript" src="__JS__/charisma/jquery.cookie.js"></script>
    <script type="text/javascript" src="__JS__/charisma/jquery.history.js"></script>
    <script type="text/javascript" src="__JS__/charisma/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="__JS__/charisma/jquery.noty.js"></script>
    <script type="text/javascript" src="__JS__/charisma/jquery.raty.min.js"></script>
    <script type="text/javascript" src="__JS__/charisma/jquery.colorbox-min.js"></script>

    <script type="text/javascript">
        var _script = '/Public/';
        //上传图片
        function intUploader(obj){
            //var obj = $(obj);
            var dataCount = obj.attr("data-count"),
                    typename = obj.attr("data-name");
            var uploader = obj.pluploadQueue({
                // General settings
                runtimes : 'html5,flash,silverlight,html4',
                url : '/file/uploadFile?key='+key+'&zoo='+zoo+'&sign='+sign,
                chunk_size: '20mb',
                rename : true,
                dragdrop: true,
                max_file_count: parseInt(dataCount) ? parseInt(dataCount) : 1,
                typename:typename,
                filters : {
                    // Maximum file size
                    max_file_size : '50mb',
                    // Specify what files to browse for
                    mime_types: [
                        { title : "Image files", extensions : "jpg,gif,png,ico,svg" },
                        { title : "Zip files", extensions : "zip" }
                    ]
                },
                // Resize images on clientside if we can
                resize : { width : 1500, height : 1500, quality : 100 },
                flash_swf_url : _script+'js/plupload/Moxie.swf',
                silverlight_xap_url : _script+'js/plupload/Moxie.xap'
            });

            obj.find("ul.J-img-list").sortable({
                placeholder: "ui-state-highlight"
            });
            obj.find("ul.J-img-list").disableSelection();
        }
        
        $(function() {
            var deleteElement = $('a.del').attr('onclick', 'return false').click(function() {
                var message = $(this).attr('data-confirm');
                del($(this).attr('href'), message ? message : '您确定要删除吗？')
            });

            function del(url, confirmString) {
                if (typeof confirmString != 'undefined') {
                    if (!confirm(confirmString)) {
                        return;
                    }
                }
                var form = document.createElement('form');
                form.action = url;
                form.method = 'POST';
                var inputSubmit = document.createElement('input');
                inputSubmit.type = 'submit';
                inputSubmit.style.display = 'none';
                form.appendChild(inputSubmit);
                document.body.appendChild(form);
                inputSubmit.click();
            }

            //link
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            });

            //图片上传
            $(".uploader").each(function(i){
                intUploader($(this));
            });
        });
        
    </script><?php }} ?>