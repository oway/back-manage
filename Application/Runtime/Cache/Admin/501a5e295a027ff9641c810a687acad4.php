<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{if isset($siteTitle) && !empty($siteTitle)}<?php echo ($siteTitle); ?>{/if}</title>
    <!--
    <link href="//www.name.im/" rel="dns-prefetch" />
    <link href="http://www.name.im/" rel="prefetch" />
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- basic styles -->

    <link rel="stylesheet" href="/Public/css/bootstrap.min.css"/>

    {*<!-- page specific plugin styles -->*}
    <link rel="stylesheet" href="/Public/css/charisma-app.css" />
    <link rel="stylesheet" href="/Public/css/chosen.min.css" />
    <link rel="stylesheet" href="/Public/css/colorbox.css" />
    <link rel="stylesheet" href="/Public/css/responsive-tables.css" />
    <link rel="stylesheet" href="/Public/css/jquery.noty.css" />
    <link rel="stylesheet" href="/Public/css/elfinder.theme.css" />
    <link rel="stylesheet" href="/Public/css/elfinder.min.css" />
    <link rel="stylesheet" href="/Public/css/jquery.iphone.toggle.css" />
    <link rel="stylesheet" href="/Public/css/uploadify.css" />
    <link rel="stylesheet" href="/Public/css/animate.min.css" />

    <!--[if lte IE 8]>
    <script src="/Public/js/html5shiv.js"></script>
    <script src="/Public/js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="no-skin">
<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='/Public/js/jquery.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='/Public/js/jquery1x.min.js'>"+"<"+"/script>");
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
    {literal}
    .required{ color: red;margin-left:5px;}
    input[type=radio],input[type=checkbox]{margin-right:5px;}
    input.error{border:1px solid #ebccd1;color:#a94442;background-color:#F2DEDD}
    span.error{color:#a94442;}
    {/literal}
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
                <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"><?php echo ($smarty["cookies"]["_uid"]); ?></span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="/admin/changePassword?adminid=<?php echo ($smarty["cookies"]["_uid"]); ?>">修改密码</a></li>
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
                            {if !empty($menu)}
                            <li class="nav-header">菜单</li>
                            {foreach $menu as $key => $value}
                                <li class="{if isset($value['child']) && !empty($value['child'])}accordion{/if}">
                                    <a class="" href="{if isset($value['rules']) && !empty($values['rules'])}<?php echo ($values['rules']); ?>{/if}">
                                        {if !empty($value['icon'])}<i class="glyphicon glyphicon-<?php echo ($value["icon"]); ?>"></i>{/if}
                                        <span><?php echo ($value['name']); ?></span>
                                    </a>
                                    {if isset($value['child']) && !empty($value['child'])}
                                        <ul class="nav nav-pills nav-stacked">
                                            {foreach $value['child'] as $v}
                                                <li>
                                                    <a href="<?php echo ($v['rules']); ?>">
                                                        {if !empty($value['icon'])}<i class="glyphicon glyphicon-<?php echo ($v["icon"]); ?>"></i>{/if}<?php echo ($v['name']); ?>
                                                    </a>
                                                </li>
                                            {/foreach}
                                        </ul>
                                    {/if}
                                </li>
                            {/foreach}
                            {*<li class="nav-header hidden-md">Sample Section</li>*}
                        </ul>
                        {/if}
                    </div>
                </div>
            </div>
            <!--/span-->
            <!-- left menu ends -->
            <div class="main-content">
                <!---正文-->
                <div id="content" class="col-lg-10 col-sm-10">
                    <!-- content starts -->
                    {if !empty($breadcrumb)}
                        <div>
                            <ul class="breadcrumb">
                                <li>
                                    <i class='glyphicon glyphicon-home blue' style="font-size: 20px"></i> 控制台
                                </li>
                                {foreach $breadcrumb as $k=>$v}
                                    <li>
                                        {if $k != '//' && $v@iteration != 1 }
                                            <a href="<?php echo ($k); ?>"><?php echo ($v["name"]); ?></a>
                                        {else}
                                            <?php echo ($v["name"]); ?>
                                        {/if}
                                    </li>
                                {/foreach}
                            </ul>
                        </div>
                    {/if}
                    {*<!----errorMessage start---->*}
                    {*{if $errorMessage = CTipMessage::instance()->getMessage()}*}
                        {*{foreach $errorMessage as $v}*}
                            {*<div class="alert alert-{$v.type}">*}
                                {*<ul>{foreach $v.message as $value}*}
                                        {*{foreach $value as $mes}*}
                                            {*<li>{$mes}</li>*}
                                        {*{/foreach}*}
                                    {*{/foreach}*}
                                {*</ul>*}
                            {*</div>*}
                        {*{/foreach}*}
                    {*{/if}*}

                    {*{if isset($vali) && $vali->hasError()}*}
                        {*<div class="alert alert-danger">{$vali->form->errorSum()}</div>*}
                    {*{/if}*}
                    <!---errorMessage end----->

                    <!----three start---->
                    {if !empty($threeMenu)}
                        <p>
                            {foreach $threeMenu as $k=>$v}
                                <a href="{if $v.m}/<?php echo ($v["m"]); ?>{/if}/<?php echo ($v["c"]); ?>/<?php echo ($v["a"]); ?>{if !empty($v.data)}?<?php echo ($v["data"]); ?>{/if}" class="btn btn-primary btn-sm">{if !empty($v.icon)} <i class='ace-icon fa fa-<?php echo ($v["icon"]); ?>'></i>{/if}<?php echo ($v["name"]); ?></a>
                            {/foreach}
                        </p>
                    {/if}
                    <!----three end------>

                    <!---content start--->
                    {__CONTENT__}
                    <!---content end------>
                </div>
            </div>
        </div>
        {*<div class="footer">*}
        {*<div class="footer-inner">*}
        {*<!-- #section:basics/footer -->*}
        {*<div class="footer-content">*}
        {*<span class="bigger-120">*}
        {*<a href="http://www.name.im" target="_blank"><span class="blue bolder">Bamboo</span></a>*}
        {*© 2015*}
        {*</span>*}
        {*</div>*}
        {*<!-- /section:basics/footer -->*}
        {*</div>*}
        {*</div>*}
    </div>



    <!-- basic scripts -->
    <script type="text/javascript">
        if('ontouchstart' in document.documentElement) document.write("<script src='/Public/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>

    <script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/js/jquery-ui.min.js"></script>
    <!-- page specific plugin scripts -->
    <!--[if lte IE 8]>
    <script src="{CClientScript::instance()->getBaseUrl()}js/excanvas.min.js"></script>
    <![endif]-->

    <!--日期选择-->
    <script src="/Public/js/date-time/bootstrap-datepicker.min.js"></script>
    <script src="/Public/js/date-time/bootstrap-timepicker.min.js"></script>
    <script src="/Public/js/date-time/moment.min.js"></script>
    <script src="/Public/js/date-time/daterangepicker.min.js"></script>
    <script src="/Public/js/date-time/bootstrap-datetimepicker.min.js"></script>
    <!--图片上传-->
    <script type="text/javascript" src="/Public/js/plupload/plupload.full.min.js"></script>

    <!--后台页面基本js-->
    <script type="text/javascript" src="/Public/js/charisma/charisma.js"></script>
    <script type="text/javascript" src="/Public/js/charisma/jquery.cookie.js"></script>
    <script type="text/javascript" src="/Public/js/charisma/jquery.history.js"></script>
    <script type="text/javascript" src="/Public/js/charisma/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/Public/js/charisma/jquery.noty.js"></script>
    <script type="text/javascript" src="/Public/js/charisma/jquery.raty.min.js"></script>
    <script type="text/javascript" src="/Public/js/charisma/jquery.colorbox-min.js"></script>

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
        {literal}
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
        {/literal}
    </script>
</body>
</html>