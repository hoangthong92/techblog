<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/techblog/inc/header.php'; ?>
<script type="text/javascript">
    document.title = 'LIEN HE VINAENTER EDU';
</script>
        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-envelope-open-o bg-orange"></i> Contact us <small class="hidden-xs-down hidden-sm-down">Chúng tôi rất vui khi được các bạn liên hệ.</small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->
        <?php
        if(isset($_GET['msg'])){
            echo $_GET['msg'];
          }
         if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $query1 = "SELECT name, email FROM contact WHERE name = '{$name}' OR email = '{$email}'";
            $result1 = $mysqli->query($query1);
            if(mysqli_num_rows($result1) > 0){
              echo "tên hoặc email này đã có người dùng";
              exit();
            }else{
              $query = "INSERT INTO contact(name, email, phone, subject, message) VALUES('{$name}', '{$email}', '{$phone}','{$subject}', '{$message}')";
              $result = $mysqli->query($query);
               HEADER("LOCATION:contact.php?msg=Thêm thành công");
            }
          }
          ?>

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-lg-5">
                                    <h4>Who we are</h4>
                                    <p>Tech Blog is a personal blog for handcrafted, cameramade photography content, fashion styles from independent creatives around the world.</p>
                   
                                    <h4>How we help?</h4>
                                    <p>Etiam vulputate urna id libero auctor maximus. Nulla dignissim ligula diam, in sollicitudin ligula congue quis turpis dui urna nibhs. </p>
             
                                    <h4>Pre-Sale Question</h4>
                                    <p>Fusce dapibus nunc quis quam tempor vestibulum sit amet consequat enim. Pellentesque blandit hendrerit placerat. Integertis non.</p>
                                </div>
                                <div class="col-lg-7">
                                    <form action="" method="POST" class="form-wrapper">
                                        <input type="text" class="form-control" name="name" placeholder="Your name"  required>
                                        <input type="text" class="form-control" name="email" placeholder="Email address" required>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                                        <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                                        <textarea class="form-control" name="message" placeholder="Your message" required></textarea>
                                        <button type="submit" name="submit" class="btn btn-primary">Send <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/techblog/inc/footer.php'; ?>
