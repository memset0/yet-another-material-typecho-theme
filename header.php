<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
  <meta charset="<?php $this->options->charset(); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>

  <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
  
  <link rel="shortcut icon" href="<?php $this->options->themeUrl('src/favicon.png'); ?>">
  <link rel="stylesheet" href="https://cdnjs.loli.net/ajax/libs/mdui/0.4.1/css/mdui.min.css">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('src/highlight.css'); ?>"/>
  <link rel="stylesheet" href="<?php $this->options->themeUrl('src/railscasts.css'); ?>"/>
  <link rel="stylesheet" href="<?php $this->options->themeUrl('src/style.css'); ?>"/>

  <!-- 通过自有函数输出HTML头部信息 -->
  <?php $this->header(); ?>

</head>

<body class="mdui-drawer-body-left mdui-appbar-with-toolbar  mdui-theme-primary-indigo mdui-theme-accent-pink">

<header class="mdui-appbar mdui-appbar-fixed mdui-shadow-4 ">
  <div class="mdui-toolbar mdui-color-theme">

    <!-- 菜单栏切换按钮-->
    <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}">
      <i class="mdui-icon material-icons">menu</i>
    </span>

    <!-- 左半部分 -->
    <a href="/" class="mdui-typo-title mdui-hidden-xs"><?php $this->options->title(); ?></a>
    <a href="" class="mdui-typo-title"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></a>

    <div class="mdui-toolbar-spacer"></div>

    <!-- 右半部分 -->

<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
  <a href="<?php $pages->permalink(); ?>" class="mdui-typo-title mdui-hidden-sm-down"><?php $pages->title(); ?></a>
<?php endwhile; ?>


  <button class="mdui-btn mdui-ripple mdui-btn-icon" mdui-menu="{target: '#menu'}">
    <i class="mdui-icon material-icons ion-plus-round">more_vert</i>
  </button>

<ul class="mdui-menu" id="menu">


<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
<li class="mdui-menu-item mdui-hidden-md-up"><a href="<?php $pages->permalink(); ?>" class="mdui-ripple"><?php $pages->title(); ?></a></li>
<?php endwhile; ?>

  <li class="mdui-divider mdui-hidden-md-up"></li>
  <li class="mdui-menu-item"><a href="javascript:;" class="mdui-ripple">登录</a></li>
  <li class="mdui-menu-item"><a href="javascript:;" class="mdui-ripple">注册</a></li>
</ul>

  </div>
</header>

<div class="mdui-drawer mdui-shadow-4" id="main-drawer">

<div class="mdui-card mdui-shadow-0" style="border-radius: 0px;">
  <div class="mdui-card-media">
    <img src="<?php $this->options->themeUrl('src/background-img.jpg'); ?>"/>
    <div class="mdui-card-media-covered">
      <div class="mdui-card-primary">
        <!--<div class="mdui-card-primary-title">Title</div>-->
        <div class="mdui-card-primary-subtitle"><?php $this->options->title(); ?></div>
      </div>
      <!--<div class="mdui-card-actions">
        <button class="mdui-btn mdui-ripple mdui-ripple-white">action 1</button>
        <button class="mdui-btn mdui-ripple mdui-ripple-white">action 2</button>
      </div>-->
    </div>
  </div>
</div>

  <div id="directory">
    
  </div>
</div>


<!--
<header id="header" class="clearfix">
    <div class="container">
        <div class="row">
            <div class="site-name col-mb-12 col-9">
            <?php if ($this->options->logoUrl): ?>
                <a id="logo" href="<?php $this->options->siteUrl(); ?>">
                    <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                </a>
            <?php else: ?>
                <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
        	    <p class="description"><?php $this->options->description() ?></p>
            <?php endif; ?>
            </div>
            <div class="site-search col-3 kit-hidden-tb">
                <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                    <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
                    <input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" />
                    <button type="submit" class="submit"><?php _e('搜索'); ?></button>
                </form>
            </div>
            <div class="col-mb-12">
                <nav id="nav-menu" class="clearfix" role="navigation">
                    <a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                    <?php endwhile; ?>
                </nav>
            </div>
        </div>
    </div>
</header>
<div id="body">
    <div class="container">
        <div class="row">
-->