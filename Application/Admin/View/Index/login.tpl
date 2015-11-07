{extends file='Layouts/layout.tpl'}
{block name=layout_content}
    <style type="text/css">
        body {
            background: url("{$smarty.const.PUBLIC_PATH}imgs/12.jpg");
            background-size:100% 130%;
            background-repeat: no-repeat;
        }
    </style>
    <div class="ch-container">
        <div class="row">
            <div class="row">
                <div class="col-md-12 center login-header">
                    <h2 class="yellow"><span style="color:greenyellow"></span>
                        <span style="color:#f5f5f5">管理后台</span></h2>
                    <h4 class="blue">&copy; Author:Oway(527221625@qq.com)</h4>
                </div>
                <!--/span-->
            </div>
            <!--/row-->

            <div class="row">
                <div class="well col-md-3 center login-box">
                    {if isset($errorMessage) && !empty($errorMessage)}
                        <div class="alert alert-{$errorMessage.type}">{$errorMessage.message|escape}</div>
                    {else}
                        <div class="alert alert-info">
                            请输入用户名和密码.
                        </div>
                    {/if}
                    <form action="/index/login" method="post" class="form-signin well well-l">
                        <fieldset>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                                <input type="text" name="username" class="form-control" placeholder="请输入用户名或邮箱">
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="请输入密码">
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="input-group input-group-lg">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <input type="text" name="verify" class="form-control" style="height: 50px" placeholder="请输入验证码">
                                    </div>
                                    <div class="col-sm-7">
                                        <img src="/index/getVerify" style="cursor: pointer;height: 50px; ;width: 95%" title="看不清,请点击..." onclick="this.src='/index/getVerify?aaa='+Math.random()">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <input type="hidden" name="callback" value="{$callback}">
                            <p class="center col-md-5">
                                <button type="submit" class="btn btn-primary">登录</button>
                            </p>
                        </fieldset>
                    </form>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
        </div>
        <!--/fluid-row-->
    </div>
{/block}

