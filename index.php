<?php
/**
 * 一套基于MDUI框架的质感设计主题
 * 
 * @package Ringo (Material Design)
 * @author memset0
 * @version 0.1
 * @link https://memset0.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div class="theme-body mdui-center">
  
  <div class="mdui-container-fluid mdui-hidden-sm-down">
    <div class="theme-introduction">
      <div class="mdui-card mdui-hoverable mdui-ripple">
        <div class="mdui-card-media">
          <img src="<?php $this->options->themeUrl('src/background-img.jpg'); ?>"/>
          <div class="mdui-card-media-covered mdui-card-media-covered-gradient">
            <div class="mdui-card-primary">
              <div class="mdui-card-primary-title">memset0的博客</div>
              <div class="mdui-card-primary-subtitle">一个可能永远没有人访问的地方</div>
            </div>
            <!--<div class="mdui-card-actions">
              <button class="mdui-btn mdui-ripple mdui-ripple-white">关于我</button>
            </div>-->
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="mdui-container-fluid">

	<?php while($this->next()): ?>
	    <div class="theme-article-card-container mdui-col-xs-12 mdui-col-md-6">
	      <a href="<?php $this->permalink() ?>" class="theme-article-card mdui-card mdui-hoverable mdui-ripple">
	        <div class="theme-article-card-media mdui-card-media">
	          <img class="theme-article-card-image" src="<?php $this->options->themeUrl('src/background-img.jpg'); ?>"/>
	          <div class="mdui-card-media-covered mdui-card-media-covered-gradient">
	            <div class="mdui-card-primary">
	              <div class="mdui-card-primary-title"><?php $this->title() ?></div>
	            </div>
	          </div>
	        </div>
	        <div class="theme-article-card-content mdui-card-actions">
				<!--<?php _e('作者: '); ?><?php $this->author->permalink(); ?><?php $this->author(); ?>
				<?php _e('时间: '); ?><?php $this->date('c'); ?><?php $this->date(); ?>
				<?php _e('分类: '); ?><?php $this->category(','); ?>
				<?php $this->permalink() ?><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?>-->
	          <?php /*$this->content('- 阅读剩余部分 -');*/ ?>
	          <?php $this->excerpt(80, '...');?>
	        </div>
	      </a>
	    </div>
	<?php endwhile; ?>



  </div>
</div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
