<?php
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// echo "<pre>"; print_r($article_data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php $title = !empty($article_data[0]->meta_title) ? $article_data[0]->meta_title : $article_data[0]->title;
            echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/Contractor-News-Logo-transparent.PNG" type="image/gif" sizes="16x16">
    <meta name="description" content="<?php $small_description = !empty($article_data[0]->meta_descripion) ? $article_data[0]->meta_descripion : $article_data[0]->small_description;
                                        echo $small_description; ?>" />
    <meta name="keywords" content="<?php $meta_keywords = !empty($article_data[0]->meta_keywords) ? $article_data[0]->meta_keywords : '';
                                    echo $meta_keywords; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" content="<?php echo $CurPageURL; ?>" />
    <meta property="og:type" content="article" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@news_contractor" />
    <meta property="og:title" content="<?php $title = !empty($article_data[0]->title) ? $article_data[0]->title : 'Not Available';
                                        echo $title; ?>" />
    <meta property="og:description" content="<?php $title = !empty($article_data[0]->small_description) ? $article_data[0]->small_description : '';
                                                echo $title; ?>" />
    <meta property="og:image" content="<?php echo base_url() . $article_data[0]->image_url . '/' . $article_data[0]->image_name; ?>" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/calendar/calendar-main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap">
    <link rel="canonical" href="<?php echo $CurPageURL; ?>">
    <script src="<?php echo base_url(); ?>assets/bootstrap/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/owl.carousel.min.js"></script>
    <!--ckeditorby jaidev-->

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "name": "<?php echo !empty($article_data[0]->title) ? $article_data[0]->title : 'Not Available'; ?>",
            "headline": "<?php echo !empty($article_data[0]->title) ? $article_data[0]->title : 'Not Available'; ?>",
            "alternativeHeadline": "<?php echo !empty($article_data[0]->small_description) ? $article_data[0]->small_description : ''; ?>",
            "datePublished": "<?php echo !empty($article_data[0]->published_date) ? date('c', strtotime($article_data[0]->published_date)) : ''; ?>",
            "url": "<?php echo $CurPageURL; ?>",
            "thumbnailUrl": "<?php echo base_url() . $article_data[0]->image_url . '/' . $article_data[0]->image_name; ?>",
            "articleSection": "<?php echo !empty($article_data[0]->category) ? $article_data[0]->category : 'News'; ?>",
            "speakable": {
                "@context": "https://schema.org",
                "@type": "SpeakableSpecification",
                "xpath": [
                    "/html/head/title",
                    "/html/head/meta[@name=\"description\"]/@content"
                ]
            },
            "publisher": {
                "@type": "Organization",
                "name": "<?php echo !empty($site_settings->site_name) ? $site_settings->site_name : 'Contractor News'; ?>",
                "url": "<?php echo base_url(); ?>",
                "logo": {
                    "@context": "https://schema.org",
                    "@type": "ImageObject",
                    "url": "<?php echo base_url(); ?>assets/images/Contractor-News-Logo-transparent.PNG",
                    "caption": "<?php echo !empty($site_settings->site_name) ? $site_settings->site_name : 'Contractor News'; ?> logo"
                }
            },
            "image": {
                "@context": "https://schema.org",
                "@type": "ImageObject",
                "url": "<?php echo base_url() . $article_data[0]->image_url . '/' . $article_data[0]->image_name; ?>",
                "caption": "<?php echo !empty($article_data[0]->image_caption) ? $article_data[0]->image_caption : $article_data[0]->title; ?>",
                "height": "<?php echo !empty($article_data[0]->image_height) ? $article_data[0]->image_height : '689'; ?>",
                "width": "<?php echo !empty($article_data[0]->image_width) ? $article_data[0]->image_width : '1225'; ?>"
            },
            "creator": {
                "@type": "Person",
                "name": "<?php echo !empty($article_data[0]->post_by) ? $article_data[0]->post_by : ''; ?>",
                "url": "<?php echo !empty($article_data[0]->author_url) ? $article_data[0]->author_url : base_url() . 'author/' . $article_data[0]->author_slug; ?>",
                "description": "<?php echo !empty($article_data[0]->author_description) ? $article_data[0]->author_description : ''; ?>",
                "jobTitle": "<?php echo !empty($article_data[0]->author_designation) ? $article_data[0]->author_designation : ''; ?>",
                "image": {
                    "@type": "ImageObject",
                    "url": "<?php echo !empty($article_data[0]->author_image) ? base_url() . $article_data[0]->author_image : ''; ?>",
                    "caption": "<?php echo !empty($article_data[0]->author_name) ? $article_data[0]->author_name : ''; ?>"
                }
            },
            "author": {
                "@type": "Person",
                "name": "<?php echo !empty($article_data[0]->post_by) ? $article_data[0]->post_by : ''; ?>",
                "url": "<?php echo !empty($article_data[0]->author_url) ? $article_data[0]->author_url : base_url() . 'author/' . $article_data[0]->author_slug; ?>",
                "description": "<?php echo !empty($article_data[0]->author_description) ? $article_data[0]->author_description : ''; ?>",
                "jobTitle": "<?php echo !empty($article_data[0]->author_designation) ? $article_data[0]->author_designation : ''; ?>",
                "image": {
                    "@type": "ImageObject",
                    "url": "<?php echo !empty($article_data[0]->author_image) ? base_url() . $article_data[0]->author_image : ''; ?>",
                    "caption": "<?php echo !empty($article_data[0]->author_name) ? $article_data[0]->author_name : ''; ?>"
                }
            },
            "dateModified": "<?php echo !empty($article_data[0]->modified_date) ? date('c', strtotime($article_data[0]->modified_date)) : date('c', strtotime($article_data[0]->created_date)); ?>"
        }
    </script>

    <!--<script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/ckeditor5-build-classic/ckeditor.js"></script>
    <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>


    <!--share follow -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/social.css">
    <!--slider links-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
    <!---- for icon style------>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        .gap-top-bottom {
            padding: 70px 0;
        }

        .img-box img {
            width: 100%;
        }

        .text-box h4 {
            font-size: 20px
        }

        /**sec2 style**/
        .sec2 {
            padding: 60px 0;
            border-top: 1px solid #d9d9d9;
        }

        .sec2 h1 {
            color: red;
        }

        .item-img {
            position: relative;
            transition: all ease-in-out 0.5s;
        }

        .hover-box {
            position: absolute;
            bottom: -100%;

            width: 100%;
            height: 100%;
            transition: all ease-in-out 0.5s;
            opacity: 0;
        }

        .hover-box ul {
            padding-left: 0;
            position: absolute;
            top: 50%;
            width: 100%;
            text-align: center;
            transform: translateY(-50%);
        }

        .hover-box ul li {
            color: gold;
            font-size: 30px;
        }

        .text-box-2 h4 {
            color: #28A745;
        }

        .text-box-2 p samp {
            color: red;
        }

        /***hover**/
        .item-box:hover .hover-box {
            opacity: 1;
            bottom: 0;

        }

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

        .text-box h4 {
            padding-top: 20px;
            font-size: 16px;
            text-align: justify;
            color: #000;
            word-break: break-all;
        }

        @media(max-width:768px) {
            .facebook_header {
                margin-left: 48%;
            }

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

            .facebook_header2 {
                margin-left: 45%;
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

            h1.page_head {
                font-size: 36px;
            }

            .facebook_btn {
                margin-bottom: 10px;
            }

            .facebook_btn {
                margin-right: 0;
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

            .facebook_btn {
                margin-right: 0;
            }
        }


        .learnmore-section {
            display: flex;
        }

        .learn_more {
            background-color: #3f9a92;
            color: #f9ae00;
            font-size: 32px;
            padding: 15px 69px;
            border-radius: 50px;
            position: absolute;
            margin-top: 525px;
            margin-left: 96px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-family: sans-serif;
            font-weight: 600;
        }

        @media (max-width:1282px) {
            .learn_more {
                font-size: 29px;
                padding: 18px 80px;
                margin-top: 524px;
                margin-left: 72px;
            }
        }

        @media (max-width:1140px) and (min-width:992px) {
            .learn_more {
                font-size: 24px;
                padding: 15px 69px;
                margin-top: 436px;
                margin-left: 62px;
            }
        }

        @media (max-width:991px) and (min-width:768px) {
            .learn_more {
                font-size: 22px !important;
                padding: 8px 30px !important;
                margin-top: 325px !important;
                margin-left: 5%;
            }
        }

        @media (max-width:768px) {
            .learn_more {
                font-size: 13px;
                padding: 12px 35px;
                margin-top: 240px;
                margin-left: 5%;
            }
        }

        @media(max-width:480px) {
            .learn_more {
                font-size: 14px;
                padding: 10px 20px;
                margin-top: 43%;
                margin-left: 25px;
            }
        }

        @media(max-width:376px) {
            .learn_more {
                font-size: 10px;
                padding: 10px 18px;
                margin-top: 155px;
                margin-left: 28px;
            }
        }

        @media(max-width:321px) {
            .learn_more {
                padding: 4px 17px;
                margin-top: 136px;
                margin-left: 23px;
            }
        }

        @media(max-width:281px) {
            .learn_more {
                padding: 4px 17px;
                margin-top: 116px;
                margin-left: 20px;
            }
        }
    </style>
</head>

<body class="Contractor">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0" nonce="nzewN0aL"></script>
    <div class="container">
        <div class="row facebook_header_section" style="display: flex; justify-content: flex-end; ">
            <div class="facebook_btn content">
                <div class="input-group">
                    <input type="email" class="form-control" id="email_subscribe_hO" placeholder="Enter your email">
                    <span class="input-group-btn">
                        <button class="btn" type="button" onclick="subscribeNews_hO()">Subscribe Now</button>
                    </span>
                    <span id="email_subscribe_hOerror" style="color:red;"></span>
                </div>
            </div>

            <div class="facebook_btn" style="margin-top:4px;">

                <a href="https://www.facebook.com/TheContractorNews/" target="_blank" class="zocial facebook" Style="font-size:13px !important;"> Follow on Facebook</a>
            </div>
            <div class="twitter_btn" style="margin-top:4px;">
                <a href="https://twitter.com/news_contractor?ref_src=twsrc%5Etfw" class="zocial twitter" data-show-count="false" Style="font-size:12px !important;">Follow on Twitter</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <!--<a href="https://twitter.com/news_contractor?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @news_contractor</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>-->
        </div>
    </div>
    <div class="container ">
        <div class="row">
            <div class="col">
                <h1 class="page_head"><a href="<?php echo base_url(); ?>">Contractor News</a></h1>
                <h3 class="sub_head">America’s #1 Small Business &amp; Public Works News Source</h3>

                <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-hover custm-nav child-whitespace-unset-480">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover" aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarHover">
                        <ul class="navbar-nav navbar-nav_responsive w-100 pr-2">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="true">Business Types</a>
                                <ul class="dropdown-menu topic_menu">
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=1">Disabled Veteran Businesses</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=2">Disadvantaged Business Enterprises</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=3">Emerging Business Enterprises</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=4">Historically Underutilized Businesses</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=5">Labor Union Certified Firms</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=6">LGBTQ Owned Businesses</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=7">Local Business Enterprises</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=8">Minority Business Enterprises</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=9">Minority Women Business Enterprises</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=10">Small Business Enterprises</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=11">Tribally Designated Entity</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=12">Veteran Business</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>search?category=13">Women Business Enterprises</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">Topics</a>
                                <ul class="dropdown-menu topic_menu">
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=41">Airports</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=42">Bridges</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=14">Construction Management Software</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=15">Contractor Trades</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=16">Coronavirus Pandemic</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=17">Cyber Security</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=18">Department of Transportation </a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=19">Disparity Studies</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=20">Diversity Outreach</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=21">Economic Stimulus</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=22">Efficiency-Improving Technology</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=23">Entrepreneurialism</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=24">Federal Government</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=44">Freeways and Highways</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=25">Green Economy</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=26">Green Construction</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=27">Health and Safety</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=43">Housing and Urban Development </a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=28">International</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=29">Investment in Infrastructure</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=30">Labor</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=31">Local Government</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=32">Market Watch</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=33">Material Costs</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=34">Mobile Technology</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=35">Modular & Prefabricated Construction</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=36">Monopolization</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=45">Ports</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=46">Procurement</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=37">Public-Private Partnership</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=47">Public Works</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=48">Railroads</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=38">Small Business Administration</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=49">Schools</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=39">State Government</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=50">Taxes and the IRS</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=40">Tech</a></li>
                                    <li><a class="dropdown-item pt-0 pb-0" href="<?php echo base_url(); ?>search?category=51">Treasury Department</a></li>
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
                            <!--<li class="nav-item dropdown">-->
                            <!--    <a href="javascript:;" data-toggle="modal" data-target="#contact" class="nav-link dropdown-toggle">Contact us</a>-->
                            <!--</li>-->

                            <a href="<?php echo base_url(); ?>search" class="form-inline ml-2 ml-lg-auto">
                                <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
                                <button class="btn btn-outline-success my-2 my-sm-0 search" type="submit">Search</button>
                            </a>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <h2 class="text-center mb-3"><?php $title = !empty($article_data[0]->title) ? $article_data[0]->title : 'Not Available';
                                                echo $title; ?></h2>
                <h4 class="text-center"><?php $small = !empty($article_data[0]->small_description) ? $article_data[0]->small_description : '';
                                        echo $small; ?></h4>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <?php if (!empty($article_data[0]->image_url)) {
                ?>
                    <!--<div class="owl-carousel owl-theme landing">-->
                    <div class="item">
                        <img src="<?php echo base_url() . $article_data[0]->image_url . '/' . $article_data[0]->image_name; ?>" style="width:100%" />
                    </div>
                    <!--<div class="item">-->
                    <!--    <iframe width="956" height="538" src="<?php echo $article_data[0]->video_url; ?>" frameborder="1"></iframe>-->
                    <!--</div>-->
                    <!--</div>-->

                    <p class="text-right" style="font-size:12px"><strong>Source : </strong> <?php echo $article_data[0]->source; ?></p>
                <?php
                } ?>
                <div class="row">
                    <div class="col-6">
                        <p class="text-left"><?php echo date("F j, Y", strtotime($article_data[0]->published_date)); ?></p>
                    </div>
                    <div class="col-6">
                        <p class="text-right"><strong>Author : </strong> <?php $author = (!empty($article_data[0]->post_by) ? $article_data[0]->post_by : "");
                                                                            echo $author; ?></p>
                    </div>
                </div>
            </div>
        </div>




        <!--share code start-->
        <div class="facebook_header_section row mt-2" style="display: flex; justify-content: flex-end;  padding-bottom: 7px;">
            <div class="facebook_btn">
                <a href="http://www.facebook.com/sharer.php?u=<?php echo $CurPageURL; ?>" target="_blank" class="zocial facebook" style="margin-right:5px;"> <span class="tooltiptext" style="font-size: 12px;">Share on Facebook</span></a>
            </div>
            <div class="twitter_btn">
                <a href="http://twitter.com/intent/tweet?url=<?php echo $CurPageURL; ?>" class="zocial twitter " target="_blank"><span class="tooltiptext" style="font-size: 12px;">Share on Twitter</span></a>
            </div>
        </div>

        <!--share code end-->
        <div class="row mt-3">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 a-word-break-all child-img-100">
                <div class="demo py-3 px-5 text-justify">
                    <!--<h4 class="text-center mb-3">Description</h4>-->
                    <p class="text-justify"><?php $desc = !empty($article_data[0]->description) ? $article_data[0]->description : "";
                                            echo $desc; ?></p>
                </div>
                <!--<p class="text-left mt-3"><strong>Category : </strong> <span><?php echo $article_data[1]->category_name; ?></span></p>-->
                <p class="text-left mt-3 category_lst">
                    <strong>Category : </strong>
                    <?php $category_arr = explode(',', $article_data[1]->category_name);
                    $contractor_cat_id = explode(',', $article_data[0]->contractor_cat_id);
                    $output = array_combine($contractor_cat_id, $category_arr);

                    foreach ($output as $key => $value) {
                    ?>
                        <a href="<?php echo base_url(); ?>search?category=<?php echo $key; ?>"><span><?php echo $value; ?></span></a>
                    <?php
                    }

                    ?>
                    <!--<span>Category 1</span><span>Category 2</span></p>-->
            </div>
        </div>

        <div class="row mt-3">
            <!--<iframe width="956" height="538" src="<?php echo $article_data[0]->video_url; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->

            <!--<iframe width="956" height="538" src="<?php echo $article_data[0]->video_url; ?>" frameborder="1"></iframe>-->
        </div>
        <!--<div class="row mt-2">-->
        <!--    <div class="col-md text-center">-->
        <!--             <h1>Related Twitter Post</h1>-->

        <!--         </div>-->
        <!--</div>-->
        <!--<div class ="row mt-2" style="300px;">-->
        <!--    <div class="col-md-6" >-->
        <!--       <blockquote class="twitter-tweet"><p lang="en" dir="ltr">Today&#39;s <a href="https://twitter.com/hashtag/PentesterPal?src=hash&amp;ref_src=twsrc%5Etfw">#PentesterPal</a> came at us from the State of Hesse, Germany, and attempted connections to two of the devices on our network with considerable determination, earning them their rare red threat ring.<a href="https://twitter.com/hashtag/PenTester?src=hash&amp;ref_src=twsrc%5Etfw">#PenTester</a> <a href="https://twitter.com/hashtag/PenetrationTester?src=hash&amp;ref_src=twsrc%5Etfw">#PenetrationTester</a> <a href="https://twitter.com/hashtag/CyberSecurity?src=hash&amp;ref_src=twsrc%5Etfw">#CyberSecurity</a> <a href="https://twitter.com/hashtag/NetworkSecurity?src=hash&amp;ref_src=twsrc%5Etfw">#NetworkSecurity</a> <a href="https://twitter.com/hashtag/Observability?src=hash&amp;ref_src=twsrc%5Etfw">#Observability</a> <a href="https://t.co/yijTueYCJW">pic.twitter.com/yijTueYCJW</a></p>&mdash; Auspex Labs Inc. (@Auspex_Labs) <a href="https://twitter.com/Auspex_Labs/status/1371748593644765184?ref_src=twsrc%5Etfw">March 16, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>-->
        <!--    </div>-->
        <!--    <div class="col-md-6">-->
        <!--        <blockquote class="twitter-tweet"><p lang="en" dir="ltr">&quot;In the end, the question is going to be: what is the real moral content of your identity?&quot; - <a href="https://twitter.com/CornelWest?ref_src=twsrc%5Etfw">@CornelWest</a> <br><br>The professors teach us a lesson about revolutionary authors Lorraine Hansberry &amp; Gwendolyn Brooks in our latest episode: <a href="https://t.co/L1y6vrk653">https://t.co/L1y6vrk653</a> <a href="https://t.co/oYPVOkcShV">pic.twitter.com/oYPVOkcShV</a></p>&mdash; The Tight Rope Podcast (@thetightropepod) <a href="https://twitter.com/thetightropepod/status/1370116105902129152?ref_src=twsrc%5Etfw">March 11, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>-->
        <!--        </div>-->
        <!--</div>-->

        <!--Slider start -->
        <div class="row mt-2">
            <div class="col-md text-center">
                <h1>Related <?php echo $article_data[0]->section; ?></h1>
                <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
            </div>
        </div>
        <div class="row slide1 ">

            <?php
            if (!empty($retaled_data)) {
                foreach ($retaled_data as $related_value) {
                    if ($related_value->id == $article_data[0]->id) {
                    } else {
                        $title_url_rel = strtolower(preg_replace('/[ ]+/', '-', $related_value->title));
            ?>
                        <div class="col-md-3">
                            <a href="<?php echo base_url() . $related_value->id . '/' . urlencode($title_url_rel); ?>">
                                <div class="img-box">
                                    <img style="height:200px;" src="<?php echo base_url() . $related_value->image_url . '/' . $related_value->image_name; ?>" alt="<?php echo $related_value->alt_tag; ?>">
                                </div>
                                <div class="text-box text-center">
                                    <h4><strong><?php echo $related_value->title; ?></strong></h4>
                                    <!--<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>-->
                                </div>
                            </a>
                        </div>
            <?php }
                }
            } else {

                echo "<h4>No Related Post Available</h4>";
            }
            ?>
            <!--end col-md-3-->

        </div>
        <!--silder ends-->
        <br>

        <a href="http://www.compliancenews.com" target="_blank"><img src="<?php echo base_url(); ?>assets/images/contractor.jpg" class="w-100"></a>

        <br>
        <br>
        <div class="learnmore-section row">
            <div class="col-md-6">
                <a href="https://www.federalcompass.com/lp/federal-compass-contractor-news" target="_blank">
                    <img src="<?php echo base_url(); ?>assets/images/Contractor_News_Ad.png" class="w-100">
                    <!--<a href="#" class="learn_more">Learn More</a>-->
                </a>
            </div>
            <div class="col-md-6">
                <a href="https://hubs.la/Q01gkGvf0" target="_blank">
                    <img src="<?php echo base_url(); ?>assets/images/Contractor_News_Ad2.jpg" class="w-100">
                    <!--<a href="#" class="learn_more">Learn More</a>-->
                </a>
            </div>
        </div>

    </div>
    <script>
        var baseURL = '<?php echo base_url(); ?>';
        // slider js start

        $('.slide1').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true,
            autoplay: true,
            speed: 300,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>
    <script>
        document.querySelectorAll('oembed[url]').forEach(element => {
            // Create the <a href="..." class="embedly-card"></a> element that Embedly uses
            // to discover the media.
            const anchor = document.createElement('a');

            anchor.setAttribute('href', element.getAttribute('url'));
            anchor.className = 'embedly-card';

            element.appendChild(anchor);
        });

        $(document).ready(function($) {
            $('.brd').css('display', 'none');
        });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/contact.js"></script>