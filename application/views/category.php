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
              <table id="table_post" class="table-category table table-hover">
                <?php foreach($categories as $category) { ?>
                  <tr>
                    <td><?=htmlspecialchars($category->Name)?></td>
                    <td>
                      <a id="btn" class="btn btn-info" href="<?=site_url("post/index/".htmlspecialchars($category->CategoryID))?>">進入看板</a>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
         </div>
      </div>  
    </div>
    <!-- home-content ends -->
  </div>
  <!-- home-body-container ends -->
</body>
</html>