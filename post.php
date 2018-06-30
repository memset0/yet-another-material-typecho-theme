<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


<div class="theme-body mdui-center">
  <div class="mdui-container">
    <div class="mdui-row">
      <div class="mdui-col-xs-12">

<div class="mdui-card mdui-shadow-4 mdui-hoverable">
    <div class="mdui-card-media mdui-ripple">
      <img src="<?php $this->options->themeUrl('src/background-img.jpg'); ?>"/>
      <div class="mdui-card-menu">
        <?php if($this->user->hasLogin()):?>
          <a href="<?php _e($this->options->adminUrl()."write-post.php?cid=".$this->cid); ?>" class="mdui-btn mdui-btn-icon mdui-text-color-white"> 
            <i class="mdui-icon material-icons">edit</i>
          </a>
        <?php endif;?>
      </div>
      <div class="mdui-card-media-covered mdui-card-media-covered-transparent">
        <div class="mdui-card-primary">
          <div class="mdui-card-primary-title"><?php $this->archiveTitle(array(
                'category'  =>  _t('分类 %s 下的文章'),
                'search'    =>  _t('包含关键字 %s 的文章'),
                'tag'       =>  _t('标签 %s 下的文章'),
                'author'    =>  _t('%s 发布的文章')
            ), '', ''); ?></div>
          <!--<div class="mdui-card-primary-subtitle">Subtitle</div>-->
        </div>
      </div>
    </div>
    <div id='theme-content-avater' class="mdui-card-header">
      <a href="<?php $this->author->permalink(); ?>" class="theme-content-avater-name mdui-card-header-title"><?php $this->author(); ?></a>
      <div class="mdui-card-header-subtitle">
        <?php $this->date('Y年n月j日 G时i分'); ?>
        发表于 <?php $this->category(', '); ?>
      </div>
    </div>
    <script>
      item = document.getElementById('theme-content-avater');
      url = '<?php $str = $this->author->gravatar(80); ?>'.split('"')[1];
      //console.log(url);
      item.innerHTML = '<img class="mdui-card-header-avatar" src="' + url + '">' + item.innerHTML;
    </script>
    <div class="mdui-card-content">
      <div class="mdui-typo" id="content">
        <?php $this->content(); ?>
      </div>
    </div>
    <div class="mdui-card-actions">
      <?php $this->need('comments.php'); ?>
      <!--<button class="mdui-btn mdui-ripple">action 1</button>
      <button class="mdui-btn mdui-ripple">action 2</button>
      <button class="mdui-btn mdui-btn-icon mdui-float-right"><i class="mdui-icon material-icons">expand_more</i></button>-->
    </div>
</div>

      </div>
    </div>
  </div>
</div>

<!--
-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>