<!DOCTYPE html>
<html>
	<head>
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="black" />
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>{if isset($siteTitle) && !empty($siteTitle)}{$siteTitle}{/if}</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />

            <!-- basic styles -->

            <link rel="stylesheet" href="{$smarty.const.PUBLIC_PATH}css/bootstrap.min.css"/>

            {*<!-- page specific plugin styles -->*}
            <link rel="stylesheet" href="{$smarty.const.PUBLIC_PATH}css/charisma-app.css" />
            <link rel="stylesheet" href="{$smarty.const.PUBLIC_PATH}css/chosen.min.css" />
            <link rel="stylesheet" href="{$smarty.const.PUBLIC_PATH}css/colorbox.css" />
            <link rel="stylesheet" href="{$smarty.const.PUBLIC_PATH}css/responsive-tables.css" />
            <link rel="stylesheet" href="{$smarty.const.PUBLIC_PATH}css/jquery.noty.css" />
            <link rel="stylesheet" href="{$smarty.const.PUBLIC_PATH}css/elfinder.theme.css" />
            <link rel="stylesheet" href="{$smarty.const.PUBLIC_PATH}css/elfinder.min.css" />
            <link rel="stylesheet" href="{$smarty.const.PUBLIC_PATH}css/jquery.iphone.toggle.css" />
            <link rel="stylesheet" href="{$smarty.const.PUBLIC_PATH}css/uploadify.css" />
            <link rel="stylesheet" href="{$smarty.const.PUBLIC_PATH}css/animate.min.css" />
            <!--[if lte IE 8]>
                <script src="{$smarty.const.PUBLIC_PATH}js/html5shiv.js"></script>
                <script src="{$smarty.const.PUBLIC_PATH}js/respond.min.js"></script>
            <![endif]-->
	</head>
        <body class="no-skin">
            {block name=layout_content}{/block}
        </body>
</html>