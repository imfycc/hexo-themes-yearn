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
	<div class="leftAside">
    		<div class="icon">
    		    <i class="icon-reorder"></i>
    		</div>
    		<div class="hoverShow">
    			<div class="nav">
    				<ul>
    					<li><i class="icon-home"></i> <a href="http://hufangyun.com">首页</a></li>
    					<li><i class="icon-user"></i> <a href="http://hufangyun.com/wp-admin/">管理</a></li>
    					<li><i class="icon-star"></i> <a href="http://hufangyun.com/?page_id=792">友链</a></li>
    				</ul>
    			</div>
    			<div class="titleList">
    				<ul>
    					<li>
    						<i class="icon-folder-open"></i> 文章归档
    						<ul class="archive">
    							<?php wp_get_archives('type=postbypost&format=html&show_post_count=true'); ?>
    						</ul>
    					</li>
    					<li><i class="icon-tags"></i> 标签</li>
    				</ul>
    			</div>
    		</div>
    	</div>
	<div class="container">
		<div class="article">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
            <?php setPostViews(get_the_ID());?>
			<h1 class="title">
				<?php the_title(); ?>
			</h1>
			<ul class="article-info">   
				<li>发布 <?php the_time('Y/m/d'); ?></li>
                <li>阅读 <?php echo getPostViews(get_the_ID()); ?></li>
                <li>评论 <?php echo zfunc_comments_users($post->ID); ?></li>
                   <?php if ( is_user_logged_in() ) { ?>
                <li><?php edit_post_link('编辑'); ?></li> <?php }?>
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
		    <!--<div class="like ">
                 <div class="like-button">
                    <a id="like-note" href="">
                    	<i class="icon-heart"></i>  喜欢</a>
                 </div>          
                 <span id="likes-count">256</span>        
            </div>-->
            <div class="otherLink">
               <div class="previous">
               <?php previous_post_link('<i class="icon-arrow-left"></i> %link', '%title', 'TRUE'); ?>
               </div>
               <div class="next">
                 <?php next_post_link('%link <i class="icon-arrow-right"></i>', '%title', TRUE); ?>
               </div>
           </div>
            <div class="comment">
            	<?php comments_template(); ?>
            </div>
        </div>
	</div>
	<div class="footer">
		<div class="info">
			<p>阿里云服务器、七牛云加速、wordpress强力驱动，采用自设计VicSugar主题</p>
			<p>&copy;2016 胡方运的博客 鲁ICP备15009509号</p>
		</div>
	</div>
	<script src="<?php bloginfo('template_directory'); ?>/public/js/jquery-1.8.3.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/public/js/MyJs.js"></script>
</body>
</html>