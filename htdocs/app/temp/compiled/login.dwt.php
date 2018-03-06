<div class="uh ub ub-ac bc-head-grey maxh ubb border-top head-h" id="header"><div class="nav-btn1 _back"><div class="icon-back1 ub-img"></div></div><h1 class="ut ub-f1 ulev-3 ut-s tx-c bc-text ub-ac" tabindex="0" id="win_title">登录</h1><div class="nav-btn1 ulev-1 p-r1 f-color-red"></div></div>
<?php if ($this->_var['phone_login'] == '1'): ?>
<div class="ub user_check bg-color-w">
  <div class="ub-f1 selected" id="use_password"><font>普通登录</font></div>
  <div class="ub-f1" id="use_mobile_code"><font>短信验证码登录</font></div>
</div>
<?php endif; ?>
<div class="uc-a1 bg-color-w umar-t1 reg-p ubb ubt border-hui f-color-zi">
  <div id="username_box" class="ub uinn-eo8 ubb border-hui ulev-9 ub-ac p-r1">
    <div class="uw-login">账户名</div>
    <div class="ub-f1">
      <div class="uinput ub-f1">
        <input id="username" name="username" placeholder="请输入手机号/用户名/邮箱" type="text" class="f-color-6">
      </div>
    </div>
    <div class="ub-img input-del h-w-6 uhide" id='clear_username'></div>
  </div>
  <div id="password_box" class="ub uinn-eo8 <?php if ($this->_var['enabled_captcha']): ?>ubb border-hui<?php endif; ?> ulev-9 ub-ac p-r1">
    <div class="uw-login"> 密码 </div>
    <div class="ub-f1">
      <div class="uinput ub-f1">
        <input  id="password" name="password"  placeholder="输入6~20位字符" type="password" class="f-color-6">
      </div>
    </div>
    <div class="ub-img input-del h-w-6 uhide" id='clear_password'></div>
    <div class="ub-img input-eye-off h-w-5" id='show_password'></div>
  </div>
  <?php if ($this->_var['phone_login'] == '1'): ?>
  <div id="mobile_phone_box" class="ub uinn-eo8 ubb border-hui ulev-9 ub-ac p-r1 uhide">
    <div class="uw-login">手机号</div>
    <div class="ub-f1">
      <div class="uinput ub-f1">
        <input id="mobile_phone" name="mobile_phone" placeholder="请输入手机号" type="text" class="f-color-6">
      </div>
    </div>
    <div class="ub-img input-del h-w-6 uhide" id='clear_username'></div>
  </div>
  <div class="ub uinn-eo8 <?php if ($this->_var['enabled_captcha']): ?>ubb border-hui<?php endif; ?> ulev-9 ub-ac p-r1 uhide" id='mobile_verify_box'>
      <div class="uw-login">短信验证码 </div>
      <div class="ub-f1 uinput" style="width:6em">
        <input id="mobile_code" placeholder="请输入验证码" type="text" class="f-color-6"/>
      </div>
      <div class="btn-red-1 ulev-2" id='get_mobile_code' data-count='60' data-origin_html='获取验证码' data-origin_count='60'>获取验证码</div>
    </div>
  <?php endif; ?>
  </div>
<div class="user-btn m-all3" id="login_button"> 登录 </div>
<div class="ub f-color-6 ulev-9 m-all3">
  <div class="ub-f1 _register" id="check_reg"> 立即注册 </div>
  <div class="ub-pe ub">  	  
      <div class="m-l1" id='forget_pass_button'> 忘记密码 </div>
  </div>
</div>
<button type="submit"class="uinvisible"></button>


<div class="uhide m-top6" id="oath_login_box">
  <div class='ub ub-ac ub-pc other-login'>
    <div class='bg-color-f2 p-l-r3 f-color-6 ulev-1'>使用第三方账号登录</div>
  </div>
  <div class='ub ub-pc ub-ac ub-f1 p-t-b4'>
    <div class='p-all2 f-color-6 oath_login' oath_type='weixin' id="weixin_oath_login"> <img src="img/img_login_weixin.png" class="h-w-10"/>
      <div class='tx-c m-top1 ulev-2'>微信</div>
    </div>
    <div class='p-all2 f-color-6 oath_login uhide' oath_type='qq' id="qq_oath_login"> <img src="img/img_login_qq.png" class="h-w-10"/>
      <div class='tx-c m-top1 ulev-2'>腾讯QQ</div>
    </div>
  </div>
</div>
 
