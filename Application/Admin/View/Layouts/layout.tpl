<!DOCTYPE html>
<html>
<head>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{if isset($siteTitle) && !empty($siteTitle)}{$siteTitle}{/if}</title>
    <!--
    <link href="//www.name.im/" rel="dns-prefetch" />
    <link href="http://www.name.im/" rel="prefetch" />
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- basic styles -->

    <link rel="stylesheet" href="__CSS__/bootstrap.min.css"/>

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="__CSS__/charisma-app.css" />
    <link rel="stylesheet" href="__CSS__/chosen.min.css" />
    <link rel="stylesheet" href="__CSS__/colorbox.css" />
    <link rel="stylesheet" href="__CSS__/responsive-tables.css" />
    <link rel="stylesheet" href="__CSS__/jquery.noty.css" />
    <link rel="stylesheet" href="__CSS__/elfinder.theme.css" />
    <link rel="stylesheet" href="__CSS__/elfinder.min.css" />
    <link rel="stylesheet" href="__CSS__/jquery.iphone.toggle.css" />
    <link rel="stylesheet" href="__CSS__/uploadify.css" />
    <link rel="stylesheet" href="__CSS__/animate.min.css" />

    <!--[if lte IE 8]>
    <script src="__JS__/html5shiv.js"></script>
    <script src="__JS__/respond.min.js"></script>
    <![endif]-->
</head>
<body class="no-skin">
{__CONTENT__}
</body>
</html>