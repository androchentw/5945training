<?php
  // Require pageTitle
  // Require db data: $username, $email, $content, $categoryid
  if(!isset($username)) $username = "";
  if(!isset($email)) $email = "";
  if(!isset($content)) $content = "";
  if(!isset($categoryid)) $categoryid = 1;

  if($selector=="new_") $nextAction = "create/".htmlspecialchars($categoryid);
  elseif($selector=="edit") $nextAction = "update/".htmlspecialchars($postid);
  else $nextAction = "create/".htmlspecialchars($categoryid);
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
              <h1><a href="<?=site_url("category")?>"><?=$pageTitle?></a></h1>
              <?php if (isset($errmsg)) { ?>
                <div class="alert alert-error">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><?=$errmsg?></strong>
                </div>
                <?php } ?>
              <form id="form" name="form" action="<?=site_url("post/".$nextAction)?>" method="post">
                <fieldset>
                  <legend>發表新留言</legend>
                  <label>使用者名稱</label>
                  <input id="username" name="username" type="text" placeholder="請輸入使用者名稱" value="<?=htmlspecialchars($username);?>">
                  <label>Email</label>
                  <input id="email" name="email" type="text" placeholder="請輸入 Email" value="<?=htmlspecialchars($email);?>">
                  <label>Content</label>
                  <input id="content" name="content" type="text" placeholder="請輸入發文內容" value="<?=htmlspecialchars($content);?>">
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
    var username = document.getElementById('username').value;
    var content = document.getElementById('content').value;
    if (username=="" || content=="") {
      alert("使用者名稱、發文內容不得為空");
      return false;
    }    
  }
</script>

</body>
</html>