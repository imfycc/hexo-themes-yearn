<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />   
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?> ">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/public/css/font-awesome.min.css">
	
	<title><?php bloginfo('name'); ?></title>
</head>
<body>
	<div class="header">
		<i class="icon-reorder"></i>
		<h1><a href="">I`m Fangyun</a></h1>
		<div class="face">
			<i class="icon-user"></i>
		</div>
	</div>
	<div class="container">
		<div class="article">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			<h1 class="title">
				<?php the_title(); ?>
			</h1>
			<ul class="article-info">   
				<li>字数 2325</li>
				<li>阅读 <?php echo getPostViews(get_the_ID()); ?></li>
				<li>评论 104</li>
				<li>喜欢 245</li>
			</ul>
			<div class="clear"></div>
			<div class="content">
			  <?php the_content();?>
			</div>

			<?php endwhile; ?>

            <?php endif; ?>
			<div class="support-author">
                 <p>如果觉得我的文章对您有用，请随意打赏。您的支持将鼓励我继续创作！</p>
                 <a class="btn-pay"  href="#pay-modal">¥ 打赏支持</a>
		    </div>
		    <div class="like ">
                 <div class="like-button">
                    <a id="like-note" href="">
                    	<i class="icon-heart"></i>  喜欢</a>
                 </div>          
                 <span id="likes-count">256</span>        
            </div>
            <div class="comment">
            	
            </div>
        </div>
	</div>
	<div class="footer">
		<div class="info">
			<p>阿里云服务器、七牛云加速、wordpress强力驱动，采用自设计VicSugar主题</p>
			<p>&copy;2016 胡方运的博客 鲁ICP备15009509号</p>
		</div>
	</div>
</body>
</html>