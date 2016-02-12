<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />   
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?> ">
	<title><?php bloginfo('name'); ?></title>
</head>
<body>
	<div class="left-aside">
		<div class="face-img"><img src="<?php bloginfo('template_directory'); ?>/public/img/face.jpg"></div>
		<div class="intro-word">
			<h2><?php bloginfo('name'); ?></h2>
			<p>天马行空，爱生活，爱coding</p>
			<p>The value of life by their own decisions</p>
		</div>
		<div class="sns">
			<ul>
				<li>
					<a href="http://music.163.com/#/user/home?id=30828384" target="_blank">
					   <img src="<?php bloginfo('template_directory'); ?>/public/img/iconfont-netease-music.svg" alt="网易云音乐" title="网易云音乐">
				    </a>
				</li>
				<li>
					<a href="">
						<img src="<?php bloginfo('template_directory'); ?>/public/img/iconfont-qq.svg" alt="898843651" title="QQ:898843651">
					</a>
				</li>
				<li>
					<a href="http://youthol.cn" target="_blank">
						<img src="<?php bloginfo('template_directory'); ?>/public/img/Youthol.svg" alt="青春在线" title="青春在线" >
					</a>
				</li>
				<li>
					<a href="">
						<img src="<?php bloginfo('template_directory'); ?>/public/img/iconfont-appicon06.svg" alt="邮箱" title="hufy3651@foxmail.com">
					</a>
				</li>
				<li>
					<a href="https://github.com/Youthink" target="_blank">
						<img src="<?php bloginfo('template_directory'); ?>/public/img/iconfont-github.svg" alt="GitHub" title="GitHub">
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="right-aside">
		<div class="right-nav">
		   <div class="main">
			<ul class="left">
				<?php wp_nav_menu(array('theme_location' => 'main', 'container' => false, 'container_class' => false)); ?>
			</ul>
			<input type="search"  placeholder="搜索" class="input-search">
		 </div>
	    </div>
		<div class="right-main">
			<div class="main">
				<div class="category">
					<ul>
						<li><a href="http://hufangyun.com" class="active">最新</a></li>
						<?php wp_nav_menu(array('menu'=>'tabNav', 'container' => false, 'container_class' => false)); ?>
					</ul>
				</div>
		    </div>
			<div class="clear"></div>
			<div class="list">
				<div class="main">
					<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
					<div class="item">
					<div class="title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</div>
					<div class="info">
						<ul>
							<li><?php the_time('Y/m/d/g'); ?></li>
							<li>喜欢 3</li>
							<li>评论 6</li>
							<li>阅读 <?php echo getPostViews(get_the_ID()); ?></li>
						</ul>
					</div>
				</div>

                   <?php endwhile; ?>

                   <?php endif; ?>
			  </div>
		    </div>
		</div>
	</div>
</body>
</html>