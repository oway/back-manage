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

    <!-- page specific plugin styles -->
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
<?php echo ($smarty["const"]["/Public/js"]); ?>
</body>
</html>