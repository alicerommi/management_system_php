<?php
      include 'includes/header.php';
?>
  <!-- start banner -->
  <section class="banner-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="banner-head">
            <h2>Blog</h2>
            <nav aria-label="breadcrumb" class="nav-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">About</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end banner -->

  <!-- start blog content -->
  <section class="blog-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div class="blog-left-content">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="blog-inner-content">
                  <div class="image-blog">
                    <img src="assets/images/video-image.jpg" class="img-fluid" alt="Video Image">
                    <a href="https://www.youtube.com/watch?v=LVDUbfdfBPk" data-fancybox class="video-popup"><i class="fas fa-play"></i></a>
                  </div>
                  <div class="blog-text">
                    <h2><a href="#">Video Post</a></h2>
                    <span class="blog-link">
                      <span class="link"><a href="#">Commercial,</a></span>
                      <span class="link"><a href="#">Blogs,</a></span>
                      <span class="link"><a href="#">Media</a></span>
                      <span class="line"></span>
                      <span class="link"><a href="#">January 10, 2020</a></span>
                      <span class="line"></span>
                      <span class="link"><a href="#"><i class="far fa-comment"></i> <strong class="number">0</strong> Comment</a></span>
                    </span>

                    <div class="text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit porro, nostrum nam, delectus fugit error. Saepe dicta, sit fugit tempora, nulla hic vel molestiae facere officia dignissimos inventore, minus, magni nostrum blanditiis. Animi eligendi tempora eum quasi adipisci facere quia.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="blog-inner-content">
                  <div class="image-blog">
                    <img src="assets/images/blog.jpg" class="img-fluid" alt="Blog Image">
                  </div>
                  <div class="blog-text">
                    <h2><a href="#">Gallery Post</a></h2>
                    <span class="blog-link">
                      <span class="link"><a href="#">Commercial,</a></span>
                      <span class="link"><a href="#">Blogs,</a></span>
                      <span class="link"><a href="#">Media</a></span>
                      <span class="line"></span>
                      <span class="link"><a href="#">January 10, 2020</a></span>
                      <span class="line"></span>
                      <span class="link"><a href="#"><i class="far fa-comment"></i> <strong class="number">0</strong> Comment</a></span>
                    </span>

                    <div class="text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit porro, nostrum nam, delectus fugit error. Saepe dicta, sit fugit tempora, nulla hic vel molestiae facere officia dignissimos inventore, minus, magni nostrum blanditiis. Animi eligendi tempora eum quasi adipisci facere quia.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
          <div class="right-blog-content">
            <div class="categories-blog">
              <h2 class="subhead">Categories</h2>
              <ul>
                <li><a href="#">Car Interior</a></li>
                <li><a href="#">Commercial</a></li>
                <li><a href="#">Company News</a></li>
                <li><a href="#">Interesting to know</a></li>
                <li><a href="#">Media</a></li>
              </ul>
            </div>

            <div class="search-blog">
              <h2 class="subhead">Search</h2>
              <form action="#" class="form-inline" method="POST">
                <div class="form-group form-inline">
                  <input type="text" class="form-control" id="search" placeholder="Search">
                  <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                </div>
              </form>
            </div>

            <div class="compare-blog">
              <h2 class="subhead">Cars Compare</h2>
              <p>Select 2+ cars to compare</p>
            </div>

            <div class="comment-blog">
              <h2 class="subhead">Comments</h2>

              <ul>
                <li><p>Philip James on <a href="#">The best car interiors of all time</a></p></li>
                <li><p>Philip James on <a href="#">The best car interiors of all time</a></p></li>
              </ul>
            </div>

            <div class="recent-blog">
              <h2 class="subhead">Recent Posts</h2>
              <ul>
                <li><a href="#">Audio Post</a> January 30, 2017</li>
                <li><a href="#">Video Post</a> January 30, 2017</li>
              </ul>
            </div>

            <div class="tags-blog">
              <h2 class="subhead">Tags</h2>
              <ul>
                <li><a href="#">advice</a></li>
                <li><a href="#">expert</a></li>
              </ul>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end blog content -->
<?php
  include 'includes/footer.php';
?>