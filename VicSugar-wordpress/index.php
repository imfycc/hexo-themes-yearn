<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="baidu_union_verify" content="4a0e189d6aa33c77bf2c7a8fce617ff2"><!--联盟-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="keywords" content="胡方运,程小猿,前端,个人博客,Youthink,Web" />
	<meta name="description" content="程小猿的个人博客，Web前端工程师的成长之路" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?> ">
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/public/img/favicon.ico" title="Favicon">	
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/public/css/font-awesome.min.css">
	<title><?php bloginfo('name'); ?></title>

	<!-- 百度检测-->
	<script>
		var _hmt = _hmt || [];
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "//hm.baidu.com/hm.js?ae46047b557574a12bba544bea130043";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
		})();
	</script>
</head>
<body>
	<header class="left-aside">
		<div class="face-img"><img src="<?php bloginfo('template_directory'); ?>/public/img/face.jpg"></div>
		<div class="intro-word">
			<h2><?php bloginfo('name'); ?></h2>
			<p class="ms">天马行空，爱生活，爱coding</p>
			<p class="ms">The value of life by their own decisions</p>
		</div>
	    <div class="sns">
            <ul>
                <li>
                    <a href="http://music.163.com/#/user/home?id=30828384" target="_blank">
                       <img src="<?php bloginfo('template_directory'); ?>/public/img/icon-netease.png" alt="网易云音乐" data-tooltip="网易云音乐">
                    </a>
                </li>
                <li>
                    <a>
                        <img src="<?php bloginfo('template_directory'); ?>/public/img/icon-qq.png" alt="898843651" data-tooltip="QQ:898843651">
                    </a>
                </li>
                <li>
                    <a href="http://youthol.cn" target="_blank">
                        <img src="<?php bloginfo('template_directory'); ?>/public/img/icon-youthol.png" alt="青春在线" data-tooltip="青春在线" >
                    </a>
                </li>
                <li>
                    <a>
                        <img src="<?php bloginfo('template_directory'); ?>/public/img/icon-email.png" alt="邮箱" data-tooltip="hi@hufangyun.com">
                    </a>
                </li>
                <li>
                    <a href="https://github.com/Youthink" target="_blank">
                        <img src="<?php bloginfo('template_directory'); ?>/public/img/icon-github.png" alt="GitHub" data-tooltip="GitHub">
                    </a>
                </li>
            </ul>
            <div class="tip">
                <p></p><span></span>
            </div>
        </div>
    </header>
	<section class="right-aside">
		<div class="right-nav ms">
		    <nav class="nav-main">
				<ul class="left">
					<?php wp_nav_menu(array('theme_location' => 'main', 'container' => false, 'container_class' => false)); ?>
				</ul>
				<div class="login"><a href="<?php echo home_url();?>/wp-admin"><i class="icon-user"></i></a></div>
				<div class="search">
                	<?php get_search_form(); ?>
            	</div>
		 	</nav>
	    </div>
		<div class="right-main">
				<nav class="category">
					<ul>
						<?php wp_nav_menu(array('menu'=>'tabNav', 'container' => false, 'container_class' => false)); ?>
					</ul>
		    	</nav>
			<div class="clear"></div>
			<div class="list">
					<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
					<div class="item">
					<div class="title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</div>
					<div class="info">
						<ul>
							<li><?php the_time('Y/m/d'); ?></li>
							<li>评论 <?php echo zfunc_comments_users($post->ID); ?></li>
							<li>阅读 <?php echo getPostViews(get_the_ID()); ?></li>
						</ul>
					</div>
				</div>

                   <?php endwhile; ?>

                   <?php endif; ?>
			  </div>
		</div>
	</section>
	<script src="<?php bloginfo('template_directory'); ?>/public/js/jquery-1.8.3.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/public/js/MyJs.js"></script>
</body>
</html>