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
              <h1><a href="<?=site_url("/post")?>">Post - Andro's 5945 Intern Training Tutorial</a></h1>
              <table class="post-table table table-hover">
                <tr>
                  <th>UserName</th>
                  <th>UserEmail</th>
                  <th>Content</th>
                  <th>CreateDate</th>
                </tr>
                <?php foreach($posts as $post) { ?>
                  <tr>
                    <td><?=htmlspecialchars($post->UserName)?></td>
                    <td><?=htmlspecialchars($post->UserEmail)?></td>
                    <td><?=htmlspecialchars($post->Content)?></td>
                    <td><?=htmlspecialchars($post->CreateDate)?></td>
                    <td>
                      <a class="btn btn-info" href="<?=site_url("post/edit/".$post->PostID)?>">編輯</a>
                      <a class="btn btn-danger" href="<?=site_url("post/delete/".$post->PostID)?>" onclick="return confirmDelete()">刪除</a>
                    </td>
                  </tr>
                <?php } ?>
              </table>

              <a class="btn btn-primary" href="<?=site_url("post/new_")?>">發表新文章</a>
            </div>
         </div>
      </div>  
    </div>
    <!-- home-content ends -->
  </div>
  <!-- home-body-container ends -->

<script>
  function confirmDelete() {
    if(confirm("你確定要刪除這篇文章嗎?")) {
      // delete it!
    } else {
      return false;
    }
  }
</script>

</body>
</html>