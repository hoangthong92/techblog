<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/techblog/inc/header.php'; ?>
<?php
  $queryTSD1 = "SELECT count(*) AS tongsodong1 FROM newspaper ";
  $resultTSD1 = $mysqli->query($queryTSD1);
  $arTmp = mysqli_fetch_assoc($resultTSD1);
  $TSD1 = $arTmp['tongsodong1'] - 3;
  //số truyện trên 1 trang
  $row_count = 1;
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
        <section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                    <div class="first-slot">
                    <?php $queryNewspaper = "SELECT n.*, c.*, c.name AS cname, n.name AS nname FROM newspaper AS n INNER JOIN cat AS c ON n.cat_id = c.cat_id ORDER BY RAND() LIMIT 1 ";
                      $resultNewspaper = $mysqli->query($queryNewspaper);
                      $arNewspaper = mysqli_fetch_assoc($resultNewspaper);
                      $nameNewspaper = $arNewspaper['nname'];
                      $nameCat = $arNewspaper['cname'];
                      $pictureNewspaper = $arNewspaper['picture'];
                      $creat_atNewspaper = $arNewspaper['created_at'];
                      $authorNewspaper = $arNewspaper['author'];
                      $cat_id = $arNewspaper['cat_id'];
                      $newspaper_id = $arNewspaper['newspaper_id'];
                      $namePlaceNewspaper = utf8ToLatin($nameNewspaper);
                      $url = '/newspaper-' . $namePlaceNewspaper .'-' . $newspaper_id . '.html';
                           ?>
                        <div class="masonry-box post-media">
                             <img src="/files/<?php echo $pictureNewspaper;?>" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"><a href="gadgets.php?id=<?php echo $cat_id;?>" title=""><?php echo $nameCat;?></a></span>
                                        <h4><a href="<?php echo $url;?>" title=""><?php echo $nameNewspaper;?></a></h4>
                                        <small><a href="#" title=""><?php echo $creat_atNewspaper;?></a></small>
                                        <small><a href="authorN.php?nameauthor=<?php echo $authorNewspaper;?>" title=""><?php echo 'by ' . $authorNewspaper;?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media --> 
                    </div><!-- end first-side -->

                    <div class="second-slot"> 
                        <div class="masonry-box post-media">
                        <?php $queryNewspaper3 = "SELECT n.*, c.*, c.name AS cname, n.name AS nname FROM newspaper AS n INNER JOIN cat AS c ON n.cat_id = c.cat_id ORDER BY RAND() LIMIT 1 ";
                      $resultNewspaper3 = $mysqli->query($queryNewspaper3);
                      $arNewspaper3 = mysqli_fetch_assoc($resultNewspaper3);
                      $nameNewspaper3 = $arNewspaper3['nname'];
                      $nameCat3 = $arNewspaper3['cname'];
                      $pictureNewspaper3 = $arNewspaper3['picture'];
                      $creat_atNewspaper3 = $arNewspaper3['created_at'];
                      $authorNewspaper3 = $arNewspaper3['author'];
                      $cat_id3 = $arNewspaper3['cat_id'];
                      $newspaper_id3 = $arNewspaper3['newspaper_id'];
                      $namePlaceNewspaper = utf8ToLatin($nameNewspaper3);
                      $url3 = '/' . $namePlaceNewspaper .'-' . $newspaper_id3 . '.html';
                           ?>
                             <img src="/files/<?php echo $pictureNewspaper3;?>" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"><a href="gadgets.php?id=<?php echo $cat_id;?>" title=""><?php echo $nameCat3;?></a></span>
                                        <h4><a href="<?php echo $url3;?>" title=""><?php echo $nameNewspaper3;?></a></h4>
                                        <small><a href="#" title=""><?php echo $creat_atNewspaper3;?></a></a></small>
                                        <small><a href="authorN.php?nameauthor=<?php echo $authorNewspaper3;?>" title=""><?php echo 'by ' . $authorNewspaper3;?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                             </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end second-side -->

                    <div class="last-slot">
                        <div class="masonry-box post-media">
                        <?php $queryNewspaper4 = "SELECT n.*, c.*, c.name AS cname, n.name AS nname FROM newspaper AS n INNER JOIN cat AS c ON n.cat_id = c.cat_id ORDER BY RAND() LIMIT 1 ";
                      $resultNewspaper4 = $mysqli->query($queryNewspaper4);
                      $arNewspaper4 = mysqli_fetch_assoc($resultNewspaper4);
                      $nameNewspaper4 = $arNewspaper4['nname'];
                      $nameCat4 = $arNewspaper4['cname'];
                      $pictureNewspaper4 = $arNewspaper4['picture'];
                      $creat_atNewspaper4 = $arNewspaper4['created_at'];
                      $authorNewspaper4 = $arNewspaper4['author'];
                      $cat_id4 = $arNewspaper4['cat_id'];
                      $newspaper_id4 = $arNewspaper4['newspaper_id'];
                      $namePlaceNewspaper = utf8ToLatin($nameNewspaper4);
                      $url4 = '/' . $namePlaceNewspaper .'-' . $newspaper_id4 . '.html';

                           ?>
                             <img src="/files/<?php echo $pictureNewspaper4;?>" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"><a href="gadgets.php?id=<?php echo $cat_id;?>" title=""><?php echo $nameCat;?></a></span>
                                        <h4><a href="<?php echo $url4;?>" title=""><?php echo $nameNewspaper;?></a></h4>
                                        <small><a href="#" title=""><?php echo $creat_atNewspaper;?></a></small>
                                        <small><a href="authorN.php?nameauthor=<?php echo $authorNewspaper3;?>" title=""><?php echo 'by ' . $authorNewspaper;?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                             </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end second-side -->
                </div><!-- end masonry -->
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-top clearfix">
                                <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                            </div><!-- end blog-top -->

                            <div class="blog-list clearfix">
                            <?php $queryNewspaper1 = "SELECT c.name AS cname, n.name AS nname, n.*, c.* FROM newspaper AS n INNER JOIN cat AS c WHERE c.cat_id = n.cat_id ORDER BY newspaper_id DESC LIMIT 3";
                                              $resultNewspaper1 = $mysqli->query($queryNewspaper1);
                                              while($arNewspaper1 = mysqli_fetch_assoc($resultNewspaper1)){
                                                  $nameNewspaper1 = $arNewspaper1['nname'];
                                                  $pictureNewspaper1 = $arNewspaper1['picture'];
                                                  $created_atNewspaper1 = $arNewspaper1['created_at'];
                                                  $preview_textNewspaper1 = $arNewspaper1['preview_text'];
                                                  $authorNewspaper1 = $arNewspaper1['author'];
                                                  $nameCat1 = $arNewspaper1['cname'];
                                                  $counterNewspaper1 = $arNewspaper1['counter'];
                                                  $cat_idNewspaper1 = $arNewspaper1['cat_id'];
                                                  $newspaper_id1 = $arNewspaper1['newspaper_id'];
                                                  $namePlaceNewspaper = utf8ToLatin($nameNewspaper1);
                                                  $url1 = '/' . $namePlaceNewspaper .'-' . $newspaper_id1 . '.html';

                                              
                                        ?>
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="single.php" title="">
                                                <img src="/files/<?php echo $pictureNewspaper1;?>" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="<?php echo $url1;?>" title=""><?php echo $nameNewspaper1;?></a></h4>
                                        <p><?php echo $preview_textNewspaper1;?></p>
                                        <small class="firstsmall"><a class="bg-orange" href="gadgets.php?id=<?php echo $cat_idNewspaper1;?>" title=""><?php echo $nameCat1;?></a></small>
                                        <small><a href="#" title=""><?php echo $created_atNewspaper1;?></a></small>
                                        <small><a href="authorN.php?nameauthor=<?php echo $authorNewspaper1;?>" title="">by <?php echo $authorNewspaper1;?></a></small>
                                        <small><a href="single.php" title=""><i class="fa fa-eye"></i><?php echo $counterNewspaper1;?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
                                <?php 
                                              }
                                              ?>

                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="banner-spot clearfix">
                                            <div class="banner-img">
                                                <img src="/files/banner2.jpg" alt="" class="img-fluid">
                                            </div><!-- end banner-img -->
                                        </div><!-- end banner -->
                                    </div><!-- end col -->
                                </div><!-- end row -->

                                <hr class="invis">

                                <?php 
                                $queryTSD = "SELECT count(*) AS tongsodong FROM newspaper ";
                                $resultTSD = $mysqli->query($queryTSD);
                                $arTmp = mysqli_fetch_assoc($resultTSD);
                                $TSD = $arTmp['tongsodong'];
                                $TSDnew = $TSD - 3;
                                $queryNewspaper2 = "SELECT c.name AS cname, n.name AS nname, n.*, c.* FROM newspaper AS n INNER JOIN cat AS c WHERE c.cat_id = n.cat_id AND newspaper_id <= {$TSDnew} ORDER BY newspaper_id DESC LIMIT {$offset}, {$row_count} ";
                                $resultNewspaper2 = $mysqli->query($queryNewspaper2);
                                while($arNewspaper2 = mysqli_fetch_assoc($resultNewspaper2)){
                                    $nameNewspaper2 = $arNewspaper2['nname'];
                                    $pictureNewspaper2 = $arNewspaper2['picture'];
                                    $created_atNewspaper2 = $arNewspaper2['created_at'];
                                    $preview_textNewspaper2 = $arNewspaper2['preview_text'];
                                    $authorNewspaper2 = $arNewspaper2['author'];
                                    $nameCat2 = $arNewspaper2['cname'];
                                    $counterNewspaper2 = $arNewspaper2['counter'];
                                    $cat_idNewspaper2 = $arNewspaper2['cat_id'];
                                    $newspaper_id2 = $arNewspaper2['newspaper_id'];
                                    $namePlaceNewspaper = utf8ToLatin($nameNewspaper2);
                                    $url2 = '/' . $namePlaceNewspaper .'-' . $newspaper_id2 . '.html';


                                     

                                ?>

                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="single.php" title="">
                                                <img src="/files/<?php echo $pictureNewspaper2;?>" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->
 
                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="<?php echo $url2;?>" title=""><?php echo $nameNewspaper2;?></a></h4>
                                        <p><?php echo $preview_textNewspaper2;?></p>
                                        <small class="firstsmall"><a class="bg-orange" href="gadgets.php?id=<?php echo $cat_idNewspaper2;?>" title=""><?php echo $nameCat2;?></a></small>
                                        <small><a href="#" title=""><?php echo $created_atNewspaper2;?></a></small>
                                        <small><a href="authorN.php?nameauthor=<?php echo $authorNewspaper2;?>" title="">by <?php echo $authorNewspaper2;?></a></small>
                                        <small><a href="#" title=""><i class="fa fa-eye"></i><?php echo $counterNewspaper2;?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">
                                <?php 
                                }
                                ?>

                                
                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                    <li class="<?php if($current_page<= 1){ echo 'disabled'; } ?>">
                                           <a href="<?php if($current_page <= 1){ echo '#'; } else {
                                              echo "index.php?page=".($current_page - 1); } ?>">prev</a>
                                        <?php
                                        $data = '';
                                        $data .= ($current_page - 3) > 1 ? '<li>...</li>' : '';
                                        for ($i = ($current_page - 3) > 0 ? ($current_page - 3) : 1; $i <= (($current_page + 3) > $tongsotrang ? $tongsotrang : ($current_page + 3)); $i++) {
                                            if ($i === $current_page) {
                                                $data .= '<li active class="page-item"><a class="page-link" href="#">' . $i . '</a></li>';
                                            }else{
                                                $data .= '<li class="page-item"><a class="page-link" href="index.php?page='. $i . '">' . $i . '</a></li>';
                                            } 
                                            
                                        }
                            
                                        $data .= ($current_page + 3) < $tongsotrang ? '<li>...</li>' : '';
                                        ?>
                                        <li class="page-item"><a class="page-link" ><?php echo $data;?></a></li>
                                        <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $tongsotrang;?>">trang cuối(<?php echo $tongsotrang;?>)</a></li>
                                        <li class="page-item">
                                        <a class="<?php if($current_page >= $tongsotrang){ echo 'disabled'; } ?>">
                                         <a href="<?php if($current_page >= $tongsotrang){ echo '#'; } else { 
                                             echo "index.php?page=".($current_page + 1); } ?>">Next</a>
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
