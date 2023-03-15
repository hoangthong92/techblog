<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/techblog/inc/header.php'; ?>
<?php $id = $_GET['id'];
      $queryco = "SELECT * FROM newspaper WHERE newspaper_id = {$id}";
      $resultco = $mysqli->query($queryco);
      $arco = mysqli_fetch_assoc($resultco);
      $counterco = $arco['counter'];
      $querycounter = "UPDATE newspaper SET counter = ($counterco + 1) WHERE newspaper_id = {$id}";
      $resultcounter = $mysqli->query($querycounter);
?>
        <section class="section single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area text-center">
                                <?php 
                                    $queryNewspaper = "SELECT n.*, n.name AS nname, c.name AS cname FROM newspaper AS n INNER JOIN cat AS c ON n.cat_id = c.cat_id WHERE newspaper_id = {$id}";
                                    $resultNewspaper = $mysqli->query($queryNewspaper);
                                    $arNewspaper = mysqli_fetch_assoc($resultNewspaper);
                                    $nameNewspaper = $arNewspaper['nname'];
                                    $preview_text = $arNewspaper['preview_text'];
                                    $detail_text = $arNewspaper['detail_text'];
                                    $picture = $arNewspaper['picture'];
                                    $created_at = $arNewspaper['created_at'];
                                    $counter = $arNewspaper['counter'];
                                    $author = $arNewspaper['author'];
                                    $nameCat = $arNewspaper['cname'];

                                ?>

                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                    <li class="breadcrumb-item active"><?php echo $nameNewspaper;?></li>
                                </ol>

                                <span class="color-orange"><a href="gadgets.php" title=""><?php echo $nameCat;?></a></span>

                                <h3><?php echo $nameNewspaper;?></h3>

                                <div class="blog-meta big-meta">
                                    <small><a href="single.php" title=""><?php echo $created_at;?></a></small>
                                    <small><a href="author.php" title="">by <?php echo $author;?></a></small>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i><?php echo $counter;?></a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="/files/<?php echo $picture;?>" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">  
                                <div class="pp">

                                    <h3><strong><?php echo $preview_text;?></strong></h3>

                                    <p><?php echo $detail_text;?></p>

                                </div><!-- end pp -->

                                <img src="/files/<?php echo $picture;?>" alt="" class="img-fluid img-fullwidth">
                            </div><!-- end content -->

                            <div class="blog-title-area">
                                <div class="tag-cloud-single">
                                    <span>Tags</span>
                                    <small><a href="#" title="">lifestyle</a></small>
                                    <small><a href="#" title="">colorful</a></small>
                                    <small><a href="#" title="">trending</a></small>
                                    <small><a href="#" title="">another tag</a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                        <div class="banner-img">
                                            <img src="/files/banner1.jpg" alt="" class="img-fluid">
                                        </div><!-- end banner-img -->
                                    </div><!-- end banner -->
                                </div><!-- end col -->
                            </div><!-- end row -->

                            <hr class="invis1">

                            <div class="custombox prevnextpost clearfix">
                                <div class="row">
                                <?php
                                    if($id < 2){
                                        $newspaper_idPrev = 1;
                                    }else{
                                    $newspaper_idPrev = $id - 1;
                                    }
                                    $queryNewspaperPrev = "SELECT n.*, n.name AS nname, c.name AS cname FROM newspaper AS n INNER JOIN cat AS c ON n.cat_id = c.cat_id WHERE newspaper_id = {$newspaper_idPrev}";
                                    $resultNewspaperPrev = $mysqli->query($queryNewspaperPrev);
                                    $arNewspaperPrev = mysqli_fetch_assoc($resultNewspaperPrev);
                                    $nameNewspaperPrev = $arNewspaperPrev['nname'];
                                    $picturePrev = $arNewspaperPrev['picture'];
                                    $namePlaceNewspaper = utf8ToLatin($nameNewspaperPrev);
                                    $url = '/' . $namePlaceNewspaper .'-' . $newspaper_idPrev . '.html';

                                ?>
                                    <div class="col-lg-6">
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="<?php echo $url;?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between text-right">
                                                        <img src="/files/<?php echo $picturePrev;?>" alt="" class="img-fluid float-right">
                                                        <h5 class="mb-1"><?php echo $nameNewspaperPrev;?></h5>
                                                        <small>Prev Post</small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <?php 
                                    $queryId_max = "SELECT * FROM newspaper ORDER BY newspaper_id DESC";
                                    $resultId_max = $mysqli->query($queryId_max);
                                    $arId_max = mysqli_fetch_assoc($resultId_max);
                                    $idmax = $arId_max['newspaper_id'];
                                    if($id == $idmax){
                                        $newspaper_idNext = $idmax;
                                    }else{
                                    $newspaper_idNext = $id + 1;
                                    }
                                    $queryNewspaperNext = "SELECT n.*, n.name AS nname, c.name AS cname FROM newspaper AS n INNER JOIN cat AS c ON n.cat_id = c.cat_id WHERE newspaper_id = {$newspaper_idNext}";
                                    $resultNewspaperNext = $mysqli->query($queryNewspaperNext);
                                    $arNewspaperNext = mysqli_fetch_assoc($resultNewspaperNext);
                                    $nameNewspaperNext = $arNewspaperNext['nname'];
                                    $pictureNext = $arNewspaperNext['picture'];
                                    $namePlaceNewspaper = utf8ToLatin($nameNewspaperNext);
                                    $url1 = '/' . $namePlaceNewspaper .'-' . $newspaper_idNext . '.html';

                                ?>

                                    <div class="col-lg-6">
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="<?php echo $url1;?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between">
                                                        <img src="/files/<?php echo $pictureNext;?>" alt="" class="img-fluid float-left">
                                                        <h5 class="mb-1"><?php echo $nameNewspaperNext;?></h5>
                                                        <small>Next Post</small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About <?php echo $author;?></h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="/templates/techblog/upload/author.jpg" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="authorN.php?nameauthor=<?php echo $author;?>"><?php echo $author;?></a></h4>
                                        <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Tech Blog!</p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row" >
                                    <?php $queryLq = "SELECT * FROM newspaper WHERE newspaper_id != {$id} ORDER BY RAND() LIMIT 2 ";
                                          $resultLq = $mysqli->query($queryLq);
                                          while($arLq = mysqli_fetch_assoc($resultLq)){
                                              $nameLq = $arLq['name'];
                                              $pictureLq = $arLq['picture'];
                                              $namePlaceNewspaper = utf8ToLatin($nameLq);
                                              $url2 = '/' . $namePlaceNewspaper .'-' . $arLq['newspaper_id'] . '.html';
                                          
                                    ?>
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="single.php" title="">
                                                    <img src="/files/<?php echo $pictureLq;?>" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="<?php echo $url2;?>" title=""><?php echo $nameLq;?></a></h4>
                                                <small><a href="#" title="">Reviews</a></small>
                                                <small><a href="#" title=""><?php echo $arLq['created_at'];?></a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                    <?php
                                          }
                                          ?>
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">3 Comments</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="/templates/techblog/upload/author.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name">Amanda Martines <small>5 days ago</small></h4>
                                                    <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean.</p>
                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="/templates/techblog/upload/author_01.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">

                                                    <h4 class="media-heading user_name">Baltej Singh <small>5 days ago</small></h4>

                                                    <p>Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                            <div class="media last-child">
                                                <a class="media-left" href="#">
                                                    <img src="/templates/techblog/upload/author_02.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">

                                                    <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small></h4>
                                                    <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">Leave a Reply</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper">
                                            <input type="text" class="form-control" placeholder="Your name">
                                            <input type="text" class="form-control" placeholder="Email address">
                                            <input type="text" class="form-control" placeholder="Website">
                                            <textarea class="form-control" placeholder="Your comment"></textarea>
                                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
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