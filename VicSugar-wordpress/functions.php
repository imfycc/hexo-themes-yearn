<?php 

/* 启用浏览数目 */

// function to display number of posts.

function getPostViews($postID){

    $count_key = 'post_views_count';

    $count = get_post_meta($postID, $count_key, true);

    if($count==''){

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

        return "0";

    }

    return $count.'';

}



// function to count views.

function setPostViews($postID) {

    $count_key = 'post_views_count';

    $count = get_post_meta($postID, $count_key, true);

    if($count==''){

        $count = 0;

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

    }else{

        $count++;

        update_post_meta($postID, $count_key, $count);

    }

}





//后台添加显示

add_filter('manage_posts_columns', 'posts_column_views');

add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);

function posts_column_views($defaults){

    $defaults['post_views'] = __('浏览');

    return $defaults;

}

function posts_custom_column_views($column_name, $id){

    if($column_name === 'post_views'){

        echo getPostViews(get_the_ID());

    }

}


/* 获取文章的评论人数 by zwwooooo | zww.me */
function zfunc_comments_users($postid=0,$which=0) {
    $comments = get_comments('status=approve&type=comment&post_id='.$postid); //获取文章的所有评论
    if ($comments) {
        $i=0; $j=0; $commentusers=array();
        foreach ($comments as $comment) {
            ++$i;
            if ($i==1) { $commentusers[] = $comment->comment_author_email; ++$j; }
            if ( !in_array($comment->comment_author_email, $commentusers) ) {
                $commentusers[] = $comment->comment_author_email;
                ++$j;
            }
        }
        $output = array($j,$i);
        $which = ($which == 0) ? 0 : 1;
        return $output[$which]; //返回评论人数
    }
    return 0; //没有评论返回0
}