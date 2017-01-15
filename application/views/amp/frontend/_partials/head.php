<!doctype html>
<html amp lang="en">
<head>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <title><?php echo $page_title; ?></title>
    <link rel="canonical" href="<?php echo site_url(); ?>" />
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <link rel="canonical" href="https://ampbyexample.com/components/amp-social-share/">

    <style amp-custom>
    .carousel .slide > amp-img > img {
        object-fit: contain;
    }
    .logo {
        background-position: left 16px center;
        background-repeat: no-repeat;
        background-image: -webkit-image-set(
            url(/img/ic_menu_white_1x_web_24dp.png) 1x,
            url(/img/ic_menu_white_2x_web_24dp.png) 2x
            );
            background-color: #333;
            text-align: left;
            padding: 16px;
            padding-left: 72px;
            box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
        }
        .logo > a {
            font-size: 16px;
            font-weight: 500;
            color: white;
            text-transform: uppercase;
        }
        amp-social-share {
            margin-right: 8px;
        }
        .heading {
            padding-bottom: 8px;
        }
        .heading > #summary {
            font-weight: 500;
        }
        .heading > small {
            color: #656565;
        }
        .date {
            color: #a8a3ae;
            font-size: 12px;
        }
        .blog {
            padding: 0;
            min-width: 70%;
            background: #fff;
        }
        .blog p {
            margin: 0 16px;
        }
        .blog .text {
            color: black;
            padding-top: 0;
        }
        .blog .title {
            /*color: white;*/
            position: relative;
            /*top: -48px;*/
            margin: 0 16px;
            /*height: 0;*/
            padding-bottom: 16px;
        }
        .blog .social-share {
            line-height:36px;
            display: flex;
            padding-bottom: 16px;
            padding-top: 16px;
        }
        #live-list-update-button {
            position: fixed;
            top: 10px;
            right: 16px;
        }
        @media (max-width: 600px) {
            #live-list-update-button {
                top: 60px;
            }
        }
        .pagination {
            display: inline-block;
            padding: 0;
        }
        amp-live-list [pagination] nav {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .pagination li {
            display: inline;
            padding: 10px;
            list-style-type: none;
        }

        .heading {
            padding-bottom: 8px;
        }
        .heading > #summary {
            font-weight: 500;
        }
        .heading > small {
            color: #656565;
        }
        .related {
            background-color: #f5f5f5;
            margin: 16px 16px;
            display: block;
            color: #111;
            height: 75px;
            padding: 0;
        }
        .related > span {
            font-size: 16px;
            line-height: 75px;
            font-weight: 400;
            vertical-align: top;
            margin: 8px;
        }
        .related:hover {
            background-color: #ccc;
        }
        amp-user-notification {
            padding: 8px;
            background: #bbb;
            text-align: center;
            color: white;
        }
        </style>

        <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

        <!-- <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script> -->
        <script async custom-element="amp-image-lightbox" src="https://cdn.ampproject.org/v0/amp-image-lightbox-0.1.js"></script>
        <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
        <script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
        <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.1.js"></script>
    </head>