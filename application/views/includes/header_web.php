<?php
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contractor News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="index, follow">
  <meta name="description" content="Business news & in-depth insight for contractors and small and disadvantaged entrepreneurs in public works. " />
  <meta name="keywords" content="Small Business,Public Works">
  <link rel="icon" href="<?php echo base_url(); ?>assets/images/Contractor-News-Logo-transparent.PNG" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/calendar/calendar-main.css">
  <link rel="canonical" href="<?php echo $CurPageURL; ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap">
  <script src="<?php echo base_url(); ?>assets/bootstrap/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/dist/js/owl.carousel.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/social.css">
  <style>
    .facebook_btn {
      margin-right: 20px;
    }

    .facebook_header_section {
      display: flex;
      justify-content: flex-end;
      width: 100%;
      margin: 0;
      padding-bottom: 7px;
    }

    @media(max-width:768px) {
      h1.page_head {
        font-size: 45px;
      }

      .navbar-nav_responsive {
        font-size: 11px;
      }

      ul.navbar-nav li {
        padding-left: 0;
        padding-right: 0;
      }

      .content .btn {
        font-size: 12px;
      }

      .navbar-nav button.search {
        font-size: 12px !important;
      }

      .twitter_btn {
        margin-right: 14px;
      }
    }

    @media(max-width:480px) {
      .facebook_header {
        margin-left: 17%;
      }

      .navbar-nav_responsive {
        font-size: 11px;
      }

      ul.navbar-nav li {
        padding-left: 0;
        padding-right: 0;
      }

      .content .btn {
        font-size: 12px;
      }

      .navbar-nav button.search {
        font-size: 12px !important;
      }

      .facebook_header2 {
        margin-left: 0;
      }

      h1.page_head {
        font-size: 36px;
      }

      .twitter_btn {
        margin-right: 14px;
      }

    }

    @media(max-width:375px) {
      .facebook_btn {
        margin-bottom: 10px;
      }
    }

    @media(max-width:320px) {
      .facebook_header_section {
        flex-wrap: wrap;
      }

      .facebook_btn {
        margin-bottom: 10px;
      }

      .facebook_header {
        margin-left: 0;
      }

      .navbar-nav_responsive {
        font-size: 11px;
      }

      ul.navbar-nav li {
        padding-left: 0;
        padding-right: 0;
      }

      .content .btn {
        font-size: 12px;
      }

      .navbar-nav button.search {
        font-size: 12px !important;
      }

      .facebook_header2 {
        margin-left: 0;
      }

      .twitter_btn {
        margin-right: 14px;
      }
    }
  </style>

  <script async src="https://www.googletagmanager.com/gtag/js?id=G-TKVEL35RV7"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-TKVEL35RV7');
  </script>
</head>

<body class="Contractor">


  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0" nonce="nzewN0aL"></script>
  <div class="container">
    <div class="row facebook_header_section" style="display: flex; justify-content: flex-end; ">
      <div class="facebook_btn content">
        <div class="input-group">
          <input type="email" class="form-control" id="email_subscribe_h" placeholder="Enter your email">
          <span class="input-group-btn">
            <button class="btn" type="button" onclick="subscribeNews_h()">Subscribe Now</button>
          </span>
          <span id="email_subscribe_herror" style="color:red;"></span>
        </div>
      </div>
      <div class="facebook_btn" style="margin-top:4px;">
        <a href="https://www.facebook.com/TheContractorNews/" target="_blank" class="zocial facebook" Style="font-size:13px; !important"> Follow on Facebook</a>
        <!--<a href="https://twitter.com/news_contractor?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @news_contractor</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>-->
      </div>
      <div class="twitter_btn" style="margin-top:4px;">
        <a href="https://twitter.com/news_contractor?ref_src=twsrc%5Etfw" class="zocial twitter" data-show-count="false" Style="font-size:13px; !important">Follow on Twitter</a>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
    </div>
  </div>
  <div class="container ">
    <div class="row">
      <div class="col">
        <h1 class="page_head"><a href="<?php echo base_url(); ?>">Contractor News</a></h1>
        <!--<h3 class="sub_head">America’s #1 Small Business &amp; Public Works News Source</h3>-->
        <h3 class="sub_head">The Gov Construction News Source</h3>
        <!-- nav -->
        <!--<nav class="navbar navbar-expand-lg navbar-light bg-light custm-nav">-->
        <!--  <div class="container">-->
        <!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
        <!--      <span class="navbar-toggler-icon"></span>-->
        <!--    </button>-->
        <!--    <div class="collapse navbar-collapse " id="navbarNav">-->
        <!--      <ul class="navbar-nav w-100">-->
        <!--        <li class="nav-item dropdown">-->
        <!--          <a class="nav-link dropdown-toggle" href="" id="business_related" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
        <!--           Business Related Articles-->
        <!--          </a>-->
        <!--          <div class="dropdown-menu" aria-labelledby="business_related">-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=disadvantaged-business-enterprises">Disadvantaged Business Enterprises</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=minority-business-enterprises">Minority Business Enterprises</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=women-business-enterprises">Women Business Enterprises</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=veteran-business">Veteran Businesses</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=historically-underutilized-business">Historically Underutilized Businesses</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=lgbtq-owned-businesses">LGBTQ Owned Businesses</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=emerging-business-enterprises">Emerging Business Enterprises</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=small-business-enterprises">Small Business Enterprises</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=local-business-enterprises">Local Business Enterprises</a>-->
        <!--          </div>-->
        <!--        </li>-->
        <!--        <li class="nav-item dropdown">-->
        <!--          <a class="nav-link dropdown-toggle" href="" id="other_article" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
        <!--           Other Article Topics-->
        <!--          </a>-->
        <!--          <div class="dropdown-menu" aria-labelledby="other_article">-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=cyber-security">Cyber Security</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=department-of-transportation">Department of Transportation</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=diversity">Diversity</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=economic-crisis">Economic Crisis</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=gov’t-disparity-studies">Gov’t Disparity Studies</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=green-economy">Green Economy</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=local-government">Local Government</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=market-watch">Market Watch</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=public-private-partnership">Public - Private Partnership</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=small-business-association">Small Business Association</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=state-government">State Government</a>-->
        <!--              <a class="dropdown-item" href="<?php echo base_url(); ?>search?category=tech">Tech</a>-->
        <!--          </div>-->
        <!--        </li>-->
        <!--        <li class="nav-item dropdown">-->
        <!--          <a class="nav-link dropdown-toggle" href="" id="other_article" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
        <!--           Events Calendar-->
        <!--          </a>-->
        <!--          <div class="dropdown-menu" aria-labelledby="other_article">-->
        <!--              <a href="javascript:;" data-toggle="modal" data-target="#newsletter"  class="dropdown-item">Subscribe to our Newsletter</a>-->
        <!--              <a href="javascript:;" data-toggle="modal" data-target="#story"  class="dropdown-item">Have a story idea?</a>-->
        <!--              <a href="javascript:;" data-toggle="modal" data-target="#advertise"  class="dropdown-item">Advertise with us</a>-->
        <!--          </div>-->
        <!--        </li>-->
        <!--        <li class="nav-item">-->
        <!--            <a href="javascript:;" data-toggle="modal" data-target="#contact" class="nav-link">Contact us</a>-->
        <!--        </li>-->
        <!--    </ul>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</nav>-->
        <!--<h6 class="page_title">[insert DATE. scrolling list of TOPICS and HEADLINES]</h6>-->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-hover custm-nav child-whitespace-unset-480">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover" aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarHover">
            <ul class="navbar-nav w-100 pr-2">
              <li class="nav-item dropdown">
                <!--<a class="dropdown-item dropdown-toggle" href="#">Business Types</a>-->
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="true">Business Types</a>
                <ul class="dropdown-menu topic_menu" itemType="http://www.schema.org/SiteNavigationElement" itemscope="Business Types">
                  <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=1">Disabled Veteran Businesses</a>
                    <meta itemProp="name" content="Disabled Veteran Businesses" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=1" />
                  </li>
                  <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=2">Disadvantaged Business Enterprises</a>
                    <meta itemProp="name" content="Disadvantaged Business Enterprises" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=2" />
                  </li>
                  <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=3">Emerging Business Enterprises</a>
                    <meta itemProp="name" content="Emerging Business Enterprises" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=3" />
                  </li>
                  <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=4">Historically Underutilized Businesses</a>
                    <meta itemProp="name" content="Historically Underutilized Businesses" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=4" />
                  </li>
                  <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=5">Labor Union Certified Firms</a>
                    <meta itemProp="name" content="Labor Union Certified Firms" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=5" />
                  </li>
                  <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=6">LGBTQ Owned Businesses</a>
                    <meta itemProp="name" content="LGBTQ Owned Businesses" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=6" />
                  </li>
                  <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=7">Local Business Enterprises</a>
                    <meta itemProp="name" content="Local Business Enterprises" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=7" />
                  </li>
                  <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=8">Minority Business Enterprises</a>
                    <meta itemProp="name" content="Minority Business Enterprises" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=8" />
                  </li>
                  <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=9">Minority Women Business Enterprises</a>
                    <meta itemProp="name" content="Minority Women Business Enterprises" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=9" />
                  </li>
                  <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=10">Small Business Enterprises</a>
                    <meta itemProp="name" content="Small Business Enterprises" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=10" />
                  </li>
                  <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=11">Tribally Designated Entity</a>
                    <meta itemProp="name" content="Tribally Designated Entity" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=11" />
                  </li>
                  <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=12">Veteran Business</a>
                    <meta itemProp="name" content="Veteran Business" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=12" />
                  </li>
                  <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=13">Women Business Enterprises</a>
                    <meta itemProp="name" content="Women Business Enterprises" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=13" />
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <!--<a class="dropdown-item dropdown-toggle" href="#">Topics</a>-->
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">Topics</a>
                <ul class="dropdown-menu topic_menu" itemType="http://www.schema.org/SiteNavigationElement" itemscope="Topics">
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=41">Airports</a>
                    <meta itemProp="name" content="Airports" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=41" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=42">Bridges</a>
                    <meta itemProp="name" content="Bridges" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=42" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=14">Construction Management Software</a>
                    <meta itemProp="name" content="Construction Management Software" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=14" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=15">Contractor Trades</a>
                    <meta itemProp="name" content="Contractor Trades" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=15" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=16">Coronavirus Pandemic</a>
                    <meta itemProp="name" content="Coronavirus Pandemic" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=16" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=17">Cyber Security</a>
                    <meta itemProp="name" content="Cyber Security" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=17" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=18">Department of Transportation </a>
                    <meta itemProp="name" content="Department of Transportation " />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=18" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=19">Disparity Studies</a>
                    <meta itemProp="name" content="Disparity Studies" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=19" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=20">Diversity Outreach</a>
                    <meta itemProp="name" content="Diversity Outreach" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=20" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=21">Economic Stimulus</a>
                    <meta itemProp="name" content="Economic Stimulus" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=21" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=22">Efficiency-Improving Technology</a>
                    <meta itemProp="name" content="Efficiency-Improving Technology" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=22" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=23">Entrepreneurialism</a>
                    <meta itemProp="name" content="Entrepreneurialism" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=23" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=24">Federal Government</a>
                    <meta itemProp="name" content="Federal Government" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=24" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=44">Freeways and Highways</a>
                    <meta itemProp="name" content="Freeways and Highways" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=44" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=25">Green Economy</a>
                    <meta itemProp="name" content="Green Economy" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=25" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=26">Green Construction</a>
                    <meta itemProp="name" content="Green Construction" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=26" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=27">Health and Safety</a>
                    <meta itemProp="name" content="Health and Safety" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=27" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=43">Housing and Urban Development </a>
                    <meta itemProp="name" content="Housing and Urban Development " />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=43" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=28">International</a>
                    <meta itemProp="name" content="International" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=28" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=29">Investment in Infrastructure</a>
                    <meta itemProp="name" content="Investment in Infrastructure" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=29" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=30">Labor</a>
                    <meta itemProp="name" content="Labor" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=30" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=31">Local Government</a>
                    <meta itemProp="name" content="Local Government" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=31" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=32">Market Watch</a>
                    <meta itemProp="name" content="Market Watch" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=32" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=33">Material Costs</a>
                    <meta itemProp="name" content="Material Costs" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=33" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=34">Mobile Technology</a>
                    <meta itemProp="name" content="Mobile Technology" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=34" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=35">Modular & Prefabricated Construction</a>
                    <meta itemProp="name" content="Modular & Prefabricated Construction" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=35" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=36">Monopolization</a>
                    <meta itemProp="name" content="Monopolization" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=36" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=45">Ports</a>
                    <meta itemProp="name" content="Ports" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=45" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=46">Procurement</a>
                    <meta itemProp="name" content="Procurement" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=46" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=37">Public-Private Partnership</a>
                    <meta itemProp="name" content="Public-Private Partnership" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=37" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=47">Public Works</a>
                    <meta itemProp="name" content="Public Works" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=47" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=48">Railroads</a>
                    <meta itemProp="name" content="Railroads" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=48" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=38">Small Business Administration</a>
                    <meta itemProp="name" content="Small Business Administration" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=38" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=49">Schools</a>
                    <meta itemProp="name" content="Schools" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=49" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=39">State Government</a>
                    <meta itemProp="name" content="State Government" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=39" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=50">Taxes and the IRS</a>
                    <meta itemProp="name" content="Taxes and the IRS" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=50" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=40">Tech</a>
                    <meta itemProp="name" content="Tech" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=40" />
                  </li>
                  <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=51">Treasury Department</a>
                    <meta itemProp="name" content="Treasury Department" />
                    <meta itemProp="url" content="<?php echo base_url(); ?>search?category=51" />
                  </li>
                </ul>
              </li>
              <!--<li class="nav-item dropdown">-->
              <!--    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
              <!--        Events-->
              <!--    </a>-->
              <!--    <ul class="dropdown-menu">-->
              <!--        <li><a class="dropdown-item" href="<?php echo base_url(); ?>calendar-event">Events calendar</a></li>-->
              <!--    </ul>-->
              <!--</li>-->
              <!--<li class="nav-item dropdown">-->
              <!--    <a href="javascript:;" data-toggle="modal" data-target="#contact" class="nav-link dropdown-toggle">Contact us</a>-->
              <!--</li>-->
              <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Info
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:;" data-toggle="modal" data-target="#newsletter"  class="dropdown-item">Subscribe to our Newsletter</a></li>
                            <li><a href="javascript:;" data-toggle="modal" data-target="#story"  class="dropdown-item">Have a story idea?</a></li>
                            <li><a href="javascript:;" data-toggle="modal" data-target="#advertise"  class="dropdown-item">Advertise with us</a></li>
                            <li><a href="javascript:;" data-toggle="modal" data-target="#contact" class="dropdown-item">Contact us</a></li>
                        </ul>
                    </li> -->

              <!--<a href="<?php echo base_url(); ?>search" class="form-inline ml-auto">-->

              <a class="nav-link" href="<?php echo base_url(); ?>aboutus">About Us</a>


              <!-- "Contact Us" link -->
              <a class="nav-link ml-lg-auto" href="<?php echo base_url(); ?>contactus">Contact Us</a>

              <!-- Search Button -->
              <a href="<?php echo base_url(); ?>search" class="form-inline ml-2">
                <button class="btn btn-outline-success w-100 w-lg-auto my-2 my-sm-0 search" type="submit">Search</button>
              </a>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
