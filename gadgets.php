<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/techblog/inc/header.php'; ?>
<?php   
     if(isset($_GET['id'])){
        $cat_id = $_GET['id'];
     }else{
         $cat_id = 1;
    }

?>
<?php
  $queryTSD1 = "SELECT count(*) AS tongsodong1 FROM newspaper WHERE cat_id = {$cat_id} ";
  $resultTSD1 = $mysqli->query($queryTSD1);
  $arTmp = mysqli_fetch_assoc($resultTSD1);
  $TSD1 = $arTmp['tongsodong1'];
  //số truyện trên 1 trang
  $row_count = 10;
  // tổng số trang
  $tongsotrang = ceil($TSD1/$row_count);
  //trang hiện tại
  if(isset($_GET['page'])){
    $current_page = $_GET['page'];
  }else{ $current_page = 1;
  }
  //offset
  $offset = ($current_page - 1) * $row_count;

?>
   
        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <?php $query = "SELECT * FROM cat WHERE cat_id = {$cat_id}";
                          $result = $mysqli->query($query);
                          $arC = mysqli_fetch_assoc($result);
                          $nameC = $arC['name'];
                    ?>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-gears bg-orange"></i><?php echo $nameC;?><small class="hidden-xs-down hidden-sm-down">Những tin tức về giải bóng đá này.</small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active">Gadgets</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section">
            <div class="container">
                <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="/files/football.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Trend Videos</h2>
                                <div class="trend-videos">
                                    <div class="blog-box">
                                        <div class="post-media">
                                                <div class="hovereffect">
                                                    <span class="videohover"></span>
                                                </div><!-- end hover -->
                                        </div><!-- end media -->
                                        <iframe width="250" height="315" src="https://www.youtube.com/embed/qifb7zHqEd0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <div class="blog-meta">
                                            <h4><a href="single.php" title="">VIDEO BÓNG ĐÁ HAY</a></h4>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->

                                    <hr class="invis">
  
                                    
                                </div><!-- end videos -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Popular Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                    <?php $queryPopular = "SELECT * FROM newspaper ORDER BY counter DESC LIMIT 3";
                                              $resultPopular = $mysqli->query($queryPopular);
                                              while($arPopular = mysqli_fetch_assoc($resultPopular)){
                                                  $namePopular = $arPopular['name'];
                                                  $picturePopular = $arPopular['picture'];
                                                  $created_atPopular = $arPopular['created_at'];
                                              
                                        ?>
                                        <a href="single.php?id=<?php echo $arPopular['newspaper_id'];?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="/files/<?php echo $picturePopular;?>" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1"><?php echo $namePopular;?></h5>
                                                <small><?php echo $created_atPopular;?></small>
                                            </div>
                                        </a>
                                        <?php
                                              }
                                              ?>
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Recent Reviews</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                    <?php $queryReview = "SELECT * FROM reviews ORDER BY review_id DESC LIMIT 3";
                                              $resultReview = $mysqli->query($queryReview);
                                              while($arReviews = mysqli_fetch_assoc($resultReview)){
                                                  $nameReview = $arReviews['name'];
                                                  $pictureReview = $arReviews['picture'];
                                                  $created_at = $arReviews['created_at'];
                                                  $review_id = $arReviews['review_id'];

                                              
                                        ?>
                                        <a href="singlereview.php?id=<?php echo $review_id;?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="/files/<?php echo $pictureReview;?>" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1"><?php echo $nameReview;?></h5>
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        </a>
                                     <?php 
                                              }
                                              ?>
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->
                <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/techblog/inc/follow.php'; ?>

                <div class="widget">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="/files/banner3.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                    
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-grid-system">
                                <div class="row">
                                <?php
                                       $queryCat= "SELECT * FROM newspaper WHERE cat_id = {$cat_id} ORDER BY newspaper_id DESC LIMIT {$offset}, {$row_count}";
                                       $resultCat = $mysqli->query($queryCat);
                                       while($arCat = mysqli_fetch_assoc($resultCat)){
                                           $nameNewspaper = $arCat['name'];
                                           $pictureNewspaper = $arCat['picture'];
                                           $nameCat = $arCat['name'];
                                           $preview_text = $arCat['preview_text'];
                                           $created_at = $arCat['created_at'];
                                           $author = $arCat['author'];
                                           $counter = $arCat['counter'];
                                           $namePlaceStory = utf8ToLatin($nameCat);
                                           $url = '/' . $namePlaceStory .'-' . $arCat['newspaper_id'] . '.html';
                                    ?>
                                    <div class="col-md-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="<?php echo $url;?>" title="">
                                                    <img src="/files/<?php echo $pictureNewspaper;?>" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta big-meta">
                                                <span class="color-orange"><a href="gadgets.php" title=""><?php echo $nameCat;?></a></span>
                                                <h4><a href="single.php?id=<?php echo $arCat['newspaper_id'];?>" title=""><?php echo $nameNewspaper;?></a></h4>
                                                <p><?php echo $preview_text;?></p>
                                                <small><a href="#" title=""><?php echo $created_at;?></a></small>
                                                <small><a href="authorN.php?nameauthor=<?php echo $author;?>" title=""><?php echo $author;?></a></small>
                                                <small><a href="single.php" title=""><i class="fa fa-eye"></i><?php echo $counter;?></a></small>
                                            </div><!-- end meta -->
                                     
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                    <?php 
                                       }
                                       ?>
                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                    <li class="<?php if($current_page<= 1){ echo 'disabled'; } ?>">
                                           <a href="<?php if($current_page <= 1){ echo '#'; } else {
                                              echo "gadgets.php?page=".($current_page - 1); } ?>">prev</a>
                                        <?php
                                        $data = '';
                                        $data .= ($current_page - 3) > 1 ? '<li>...</li>' : '';
                                        for ($i = ($current_page - 3) > 0 ? ($current_page - 3) : 1; $i <= (($current_page + 3) > $tongsotrang ? $tongsotrang : ($current_page + 3)); $i++) {
                                            if ($i === $current_page) {
                                                $data .= '<li  class="page-item"><a class="page-link" href="#">' . $i . '</a></li>';
                                            }else{
                                                $data .= '<li class="page-item"><a class="page-link" href="gadgets.php?page='. $i . '">' . $i . '</a></li>';
                                            } 
                                            
                                        }  
                            
                                        $data .= ($current_page + 3) < $tongsotrang ? '<li>...</li>' : '';
                                        ?>
                                        <li class="page-item"><a class="page-link" ><?php echo $data;?></a></li>
                                        <li class="page-item"><a class="page-link" href="gadgets.php?page=<?php echo $tongsotrang;?>">trang cuối(<?php echo $tongsotrang;?>)</a></li>
                                        <li class="page-item">
                                        <a class="<?php if($current_page >= $tongsotrang){ echo 'disabled'; } ?>">
                                         <a href="<?php if($current_page >= $tongsotrang){ echo '#'; } else { 
                                             echo "gadgets.php?page=".($current_page + 1); } ?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                                    
              
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '//templates/techblog/inc/footer.php'; ?>
