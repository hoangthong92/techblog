<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/techblog/inc/header.php'; ?>
<?php
  $queryTSD1 = "SELECT count(*) AS tongsodong1 FROM reviews";
  $resultTSD1 = $mysqli->query($queryTSD1);
  $arTmp = mysqli_fetch_assoc($resultTSD1);
  $TSD1 = $arTmp['tongsodong1'];
  //số truyện trên 1 trang
  $row_count = 3;
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
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-star bg-orange"></i> Reviews <small class="hidden-xs-down hidden-sm-down">Tin tức về các giải bóng đá hàng đầu châu Âu.</small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active">Reviews</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->
      
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">
                            <?php $queryReview = "SELECT c.name AS cname, r.name AS rname, r.*, c.* FROM reviews AS r INNER JOIN cat AS c WHERE c.cat_id = r.cat_id ORDER BY review_id DESC LIMIT {$offset}, {$row_count}";
                      $resultReview = $mysqli->query($queryReview);
                      while($arReview = mysqli_fetch_assoc($resultReview)){
                          $nameReview = $arReview['rname'];
                          $pictureReview = $arReview['picture'];
                          $preview_text = $arReview['preview_text'];
                          $created_atReview = $arReview['created_at'];
                          $authorReview = $arReview['author'];
                          $counterReview = $arReview['counter']; 
                          $nameCat = $arReview['cname'];
                          $review_id = $arReview['review_id'];
                          $namePlaceReview = utf8ToLatin($nameReview);
                          $url = '/review-' . $namePlaceReview .'-' . $review_id . '.html';
                      
                ?>
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="single.php" title="">
                                                <img src="/files/<?php echo $pictureReview;?>" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="<?php echo $url;?>" title=""><?php echo $nameReview;?></a></h4>
                                        <p><?php echo $preview_text;?></p>
                                        <small class="firstsmall"><a class="bg-orange" href="gadgets.php?id=<?php echo $arReview['cat_id'];?>" title=""><?php echo $nameCat;?></a></small>
                                        <small><a href="single.php" title=""><?php echo $created_atReview?>;</a></small>
                                        <small><a href="author.php?nameauthor=<?php echo $authorReview;?>" title=""><?php echo 'by ' . $authorReview;?></a></small>
                                        <small><a href="single.php" title=""><i class="fa fa-eye"></i><?php echo $counterReview;?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
                                <?php
                      }
                    ?>

                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                          <li class="<?php if($current_page<= 1){ echo 'disabled'; } ?>">
                                           <a href="<?php if($current_page <= 1){ echo '#'; } else {
                                              echo "reviews.php?page=".($current_page - 1); } ?>">prev</a>
                                             <?php
                                            $data = '';
                                             $data .= ($current_page - 3) > 1 ? '<li>...</li>' : '';
                                             for ($i = ($current_page - 3) > 0 ? ($current_page - 3) : 1; $i <= (($current_page + 3) > $tongsotrang ? $tongsotrang : ($current_page + 3)); $i++) {
                                                 if ($i === $current_page) {
                                                    $data .= '<li  class="page-item"><a class="page-link" href="#">' . $i . '</a></li>';
                                                     }else{
                                                     $data .= '<li class="page-item"><a class="page-link" href="reviews.php?page='. $i . '">' . $i . '</a></li>';
                                                  } 
                                            
                                                }  
                            
                                                      $data .= ($current_page + 3) < $tongsotrang ? '<li>...</li>' : '';
                                                ?>
                                             <li class="page-item"><a class="page-link" ><?php echo $data;?></a></li>
                                             <li class="page-item"><a class="page-link" href="reviews.php?page=<?php echo $tongsotrang;?>">trang cuối(<?php echo $tongsotrang;?>)</a></li>
                                             <li class="page-item">
                                                <a class="<?php if($current_page >= $tongsotrang){ echo 'disabled'; } ?>">
                                                <a href="<?php if($current_page >= $tongsotrang){ echo '#'; } else { 
                                                   echo "reviews.php?page=".($current_page + 1); } ?>">Next</a>
                                            </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/techblog/inc/left.php'; ?>
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
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/techblog/inc/footer.php'; ?>