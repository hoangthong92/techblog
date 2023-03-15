<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/techblog/inc/header.php'; ?>
<?php
  $queryTSD1 = "SELECT count(*) AS tongsodong1 FROM videos ";
  $resultTSD1 = $mysqli->query($queryTSD1);
  $arTmp = mysqli_fetch_assoc($resultTSD1);
  $TSD1 = $arTmp['tongsodong1'];
  //số truyện trên 1 trang
  $row_count = 2;
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
<?php $id = $_GET['id'];
?>
        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-play bg-orange"></i> Videos <small class="hidden-xs-down hidden-sm-down">Mời mọi người thưởng thức các video  về bóng đá của 5 giải bóng đá hàng đầu châu Âu.</small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active">Videos</li>
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
                            <div class="blog-custom-build">
                                <?php $queryVideo = "SELECT * FROM videos ORDER BY video_id DESC LIMIT {$offset}, {$row_count}";
                                      $resultVideo = $mysqli->query($queryVideo);
                                      while( $arVideo = mysqli_fetch_assoc($resultVideo)){
                                      $nameVideo = $arVideo['name'];
                                      $video = $arVideo['video'];
                                      $preview_text = $arVideo['preview_text'];
                                      $author = $arVideo['author'];
                                      $counter = $arVideo['counter'];
                                      $created_at = $arVideo['created_at'];
                                      $video_id = $arVideo['video_id'];
                                      $namePlaceVideo = utf8ToLatin($nameVideo);
                                      $url = '/video-' . $namePlaceVideo .'-' . $video_id . '.html';
                                ?>
                                <div class="blog-box">
                                    <div class="post-media">
                                        <?php echo $video;?></a>
                                            <!-- end hover -->
                                    </div>
                                    
                                    <!-- end media -->
                                    <div class="blog-meta big-meta text-center">
                                        <div class="post-sharing">
                                            <ul class="list-inline">
                                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div><!-- end post-sharing -->
                                        <h4><a href="<?php echo $url;?>" title=""><?php echo $nameVideo;?></a></h4>
                                        <p><?php echo $preview_text;?></p>
                                        <small><a href="#" title="">Videos</a></small>
                                        <small><a href="" title=""><?php echo $created_at;?></a></small>
                                        <small><a href="author.php" title="">by <?php echo $author;?></a></small>
                                        <small><a href="#" title=""><i class="fa fa-eye"></i><?php echo $counter;?></a></small>
                                    </div><!-- end meta -->
                                    
                                </div><!-- end blog-box -->  
                                <?php 
                                      }
                                      ?>

                            </div><!-- end blog-custom-build -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                    <li class="<?php if($current_page<= 1){ echo 'disabled'; } ?>">
                                           <a href="<?php if($current_page <= 1){ echo '#'; } else {
                                              echo "videos.php?page=".($current_page - 1); } ?>">prev</a>
                                        <?php
                                        $data = '';
                                        $data .= ($current_page - 3) > 1 ? '<li>...</li>' : '';
                                        for ($i = ($current_page - 3) > 0 ? ($current_page - 3) : 1; $i <= (($current_page + 3) > $tongsotrang ? $tongsotrang : ($current_page + 3)); $i++) {
                                            if ($i === $current_page) {
                                                $data .= '<li  class="page-item"><a class="page-link" href="#">' . $i . '</a></li>';
                                            }else{
                                                $data .= '<li class="page-item"><a class="page-link" href="videos.php?page='. $i . '">' . $i . '</a></li>';
                                            } 
                                            
                                        }  
                            
                                        $data .= ($current_page + 3) < $tongsotrang ? '<li>...</li>' : '';
                                        ?>
                                        <li class="page-item"><a class="page-link" ><?php echo $data;?></a></li>
                                        <li class="page-item"><a class="page-link" href="videos.php?page=<?php echo $tongsotrang;?>">trang cuối(<?php echo $tongsotrang;?>)</a></li>
                                        <li class="page-item">
                                        <a class="<?php if($current_page >= $tongsotrang){ echo 'disabled'; } ?>">
                                         <a href="<?php if($current_page >= $tongsotrang){ echo '#'; } else { 
                                             echo "videos.php?page=".($current_page + 1); } ?>">Next</a>
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
                </div>
            </div><!-- end container -->
        </section>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/techblog/inc/footer.php'; ?>