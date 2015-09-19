<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="UTF-8">
        <title>欢迎您登录龙渊账号管理后台</title>
        <link rel="stylesheet" type="text/css" href="http://account.ilongyuan.com.cn//Public/Admin/css/login.css" media="all">
       	<link rel="stylesheet" type="text/css" href="http://account.ilongyuan.com.cn//Public/Admin/css/blue_color.css" media="all">
        <style type="text/css">
            #login-page .login-form {
              background-color: #363A49;
              box-shadow: 0 0 26px #041A36;
              border-top-color: #00C7E8;
            }
            #login-page .login-form .item {
              border-color: #ececec;
              background: #FFF;
            }
        </style>
    </head>
    <body id="login-page">
        <div id="main-content">

            <!-- 主体 -->
            <div class="login-body">
                <div class="login-main pr">
                    {!! Form::open(['url'=>URL::route('admin.doLogin'), 'class' => 'login-form']) !!}
                        <h3 class="welcome"><i class=""><img src="http://account.ilongyuan.com.cn//Public/Home/ui2.0/images/logo.png" alt=""></i></h3>
                        <div id="itemBox" class="item-box">
                            <div class="item">
                                <i class="icon-login-user"></i>
                                {!! Form::text('username','', ['placeholder' => '请填写用户名', 'autocomplete' => 'off']) !!}
                            </div>
                            <span class="placeholder_copy placeholder_un">请填写用户名</span>
                            <div class="item b0">
                                <i class="icon-login-pwd"></i>
                                {!! Form::password('password','', ['placeholder' => '请填写密码', 'autocomplete' => 'off']) !!}
                            </div>
                            <span class="placeholder_copy placeholder_pwd">请填写密码</span>
                           <!--  <div class="item verifycode">
                                <i class="icon-login-verifycode"></i>
                                <input type="text" name="verify" placeholder="请填写验证码" autocomplete="off">
                                <a class="reloadverify" title="换一张" href="javascript:void(0)">换一张？</a>
                            </div>
                            <span class="placeholder_copy placeholder_check">请填写验证码</span>
                            <div>
                                <img class="verifyimg reloadverify" alt="点击切换" src="/index.php?s=/Adminhttp://account.ilongyuan.com.cn//Public/verify.html">
                            </div> -->
                        </div>
                        <div class="login_btn_panel">
                            <button class="login-btn" type="submit">
                                <span class="in"><i class="icon-loading"></i>登 录 中 ...</span>
                                <span class="on">登 录</span>
                            </button>
                            <div class="check-tips"></div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
	<!--[if lt IE 9]>
    <script type="text/javascript" src="http://account.ilongyuan.com.cn//Public/static/jquery-1.10.2.min.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script type="text/javascript" src="http://account.ilongyuan.com.cn//Public/static/jquery-2.0.3.min.js"></script>
    <!--<![endif]-->
    <script type="text/javascript">
    	/* 登陆表单获取焦点变色 */
    	$(".login-form").on("focus", "input", function(){
            $(this).closest('.item').addClass('focus');
        }).on("blur","input",function(){
            $(this).closest('.item').removeClass('focus');
        });

    	//表单提交
    	$(document)
	    	.ajaxStart(function(){
	    		$("button:submit").addClass("log-in").attr("disabled", true);
	    	})
	    	.ajaxStop(function(){
	    		$("button:submit").removeClass("log-in").attr("disabled", false);
	    	});

    	$("form").submit(function(){
    		var self = $(this);
    		$.post(self.attr("action"), self.serialize(), success, "json");
    		return false;

    		function success(data){
    			if(data.status){
    				window.location.href = data.url;
    			} else {
    				self.find(".check-tips").text(data.info);
    				//刷新验证码
    				$(".reloadverify").click();
    			}
    		}
    	});

		$(function(){
			//初始化选中用户名输入框
			$("#itemBox").find("input[name=username]").focus();
			//刷新验证码
			var verifyimg = $(".verifyimg").attr("src");
            $(".reloadverify").click(function(){
                if( verifyimg.indexOf('?')>0){
                    $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
                }else{
                    $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
                }
            });

            //placeholder兼容性
                //如果支持 
            function isPlaceholer(){
                var input = document.createElement('input');
                return "placeholder" in input;
            }
                //如果不支持
            if(!isPlaceholer()){
                $(".placeholder_copy").css({
                    display:'block'
                })
                $("#itemBox input").keydown(function(){
                    $(this).parents(".item").next(".placeholder_copy").css({
                        display:'none'
                    })                    
                })
                $("#itemBox input").blur(function(){
                    if($(this).val()==""){
                        $(this).parents(".item").next(".placeholder_copy").css({
                            display:'block'
                        })                      
                    }
                })
                
                
            }
		});
    </script>

</body></html>