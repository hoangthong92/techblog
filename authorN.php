<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/techblog/inc/header.php'; ?>
<?php
  $author = $_GET['nameauthor'];
  $queryTSD1 = "SELECT count(*) AS tongsodong1 FROM newspaper WHERE author LIKE '{$author}'";
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
        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-star bg-orange"></i> Author by: <?php echo $author;?></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="author.php">Author</a></li>
                            <li class="breadcrumb-item active"><?php echo $author;?></li>
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
                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About <?php echo $author;?></h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#"><?php echo $author;?></a></h4>
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

                            <div class="blog-list clearfix">
                                <?php 
                                    $queryAuthor = "SELECT * FROM newspaper WHERE author LIKE '{$author}' ORDER BY newspaper_id DESC LIMIT {$offset}, {$row_count}";
                                    $resultAuthor = $mysqli->query($queryAuthor);
                                    While($arAuthor = mysqli_fetch_assoc($resultAuthor)){
                                        $nameNewspaper = $arAuthor['name'];
                                        $preview_text = $arAuthor['preview_text'];
                                        $created_at = $arAuthor['created_at'];
                                        $picture = $arAuthor['picture'];

                                    
                                ?>
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="single.php" title="">
                                                <img src="/files/<?php echo $picture;?>" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="single.php" title=""><?php echo $nameNewspaper;?></a></h4>
                                        <p><?php echo $preview_text;?></p>
                                        <small class="firstsmall"><a class="bg-orange" href="category-01.html" title="">Newspaper</a></small>
                                        <small><a href="single.php" title=""><?php echo $created_at;?></a></small>
                                        <small><a href="author.html" title="">by <?php echo $author;?></a></small>
                                        <small><a href="single.php" title=""><i class="fa fa-eye"></i> 1114</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <?php
                                    }
                                    ?>

                                <hr class="invis">

                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="<?php if($current_page<= 1){ echo 'disabled'; } ?>">
                                            <a href="<?php if($current_page <= 1){ echo '#'; } else {
                                              echo "authorN.php?page=".($current_page - 1); } ?>">prev</a>
                                        <li class="page-item"><a class="page-link" href="authorN.php?page=1">1</a></li>
                                        <li class="page-item"><a class="page-link" href="authorN.php?page=2">2</a></li>
                                        <li class="page-item"><a class="page-link" href="authorN.php?page=3">3</a></li>
                                        <li class="page-item"><a class="page-link" href="">...</a></li>
                                        <li class="page-item"><a class="page-link" href="authorN.php?page=<?php echo $tongsotrang;?>">trang cuối(<?php echo $tongsotrang;?>)</a></li>
                                        <li class="page-item">
                                            <a class="<?php if($current_page >= $tongsotrang){ echo 'disabled'; } ?>">
                                            <a href="<?php if($current_page >= $tongsotrang){ echo '#'; } else { 
                                             echo "authorN.php?page=".($current_page + 1); } ?>">Next</a>
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
