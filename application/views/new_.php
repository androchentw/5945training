<?php
  // Require pageTitle
  // Require db data: $username, $email, $content
  if(!isset($username)) $username = "";
  if(!isset($email)) $email = "";
  if(!isset($content)) $content = "";
 ?>
<!DOCTYPE html>
<html lang="zh-tw"
    xmlns:fb="http://www.facebook.com/2008/fbml"
    xmlns:og="http://ogp.me/ns#">
<head>
  <?php include("_site_header.php");?>
</head> 

<body> 
  <div id="home-body-container">
    <div id="home-content">
      <div class="container container-fluid">
         <div class="row-fluid">
            <div class="span12">
              <!--Body content-->
              <h1><a href="<?=site_url("/post")?>"><?=$pageTitle?></a></h1>
              <?php if (isset($errmsg)) { ?>
                <div class="alert alert-error">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><?=$errmsg?></strong>
                </div>
                <?php } ?>
              <form id="form" name="new_form" action="<?=site_url("post/create")?>" method="post">
                <fieldset>
                  <legend>發表新留言</legend>
                  <label>使用者名稱</label>
                  <input id="new_username" name="new_username" type="text" placeholder="請輸入使用者名稱" value="<?=htmlspecialchars($username);?>">
                  <label>Email</label>
                  <input id="new_email" name="new_email" type="text" placeholder="請輸入 Email" value="<?=htmlspecialchars($email);?>">
                  <label>Content</label>
                  <input id="new_content" name="new_content" type="text" placeholder="請輸入發文內容" value="<?=htmlspecialchars($content);?>">
                  <button type="submit" class="btn btn-primary">送出</button>
                </fieldset>
              </form>
            </div>
         </div>
      </div>  
    </div>
    <!-- home-content ends -->
  </div>
  <!-- home-body-container ends -->
  <div class="footer-container">
    <?php include("_site_footer.php"); ?>
  </div>
<script>
  document.getElementById("form").onsubmit=function(){
    return validateForm();
  }

  function validateForm() {
    var username = document.getElementById('new_username').value;
    var content = document.getElementById('new_content').value;
    if (username=="" || content=="") {
      alert("使用者名稱、發文內容不得為空");
      return false;
    }    
  }
</script>

</body>
</html>