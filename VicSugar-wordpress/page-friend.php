<?php
/*
Template Name: 友情链接 模板
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="baidu_union_verify" content="4a0e189d6aa33c77bf2c7a8fce617ff2"><!--联盟-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="keywords" content="胡方运,程小猿,前端,个人博客,Youthink,Web" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?> ">
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/public/img/favicon.ico" title="Favicon">	
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/public/css/font-awesome.min.css">
	<title><?php bloginfo('name'); ?> | 友链</title>
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
	<div class="header">
		<i class="icon-reorder"></i>
		<h1><a href="<?php echo home_url();?>"><?php bloginfo('name'); ?></a></h1>
		<div class="face">
			<a href="<?php echo home_url();?>/wp-admin">
				<i class="icon-user"></i>
			</a>
		</div>
	</div>
	<div class="container">
				<h1 class="title center">
				  <?php the_title();?>
				</h1>
				<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				<?php the_content();?>
				<?php endwhile; ?>
                <?php endif; ?>
		</div>
		<div class="clear"></div>
		<div class="footer">
			<div class="info">
				<p>阿里云服务器、七牛云加速、wordpress强力驱动，采用自设计VicSugar主题</p>
				<p>&copy;2016 胡方运的博客 鲁ICP备15009509号</p>
			</div>
		</div>
	</body>
</html>