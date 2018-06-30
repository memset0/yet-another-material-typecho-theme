<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="theme-comments" id="comments">

<?php function threadedComments($comments, $options)
{
    $commentClass = '';
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
    ?>
    <div id="li-<?php $comments->theId(); ?>" class="comment mdl-color-text--grey-700 comment-body<?php
    if ($comments->_levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass; ?>">



        <!-- Comment info -->
        <header class="comment header" id="theme-comment-avatar-<?php $comments->theId(); ?>">

            <!-- Comment avatar -->
<div class="mdui-chip theme-comment-avatar-chip">
    <?php $comments->gravatar(80); ?>
    <span class="mdui-chip-title"><?php $comments->author(); ?></span>
</div>
<div class="mdui-chip theme-comment-avatar-chip">
    <span class="mdui-chip-title"><?php $comments->date('Y-m-d, H:i'); ?></span>
</div>

<?php $comments->content(); ?>

        </header>

        <!-- Comment content -->
        

        <!-- Comment actions -->
        <nav class="comment__actions">
            <!-- reply -->
            <?php $comments->reply('<button id="comment-reply-button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
            <i class="material-icons" role="presentation">forum</i>
            <span class="visuallyhidden">reply comment</span>
            </button>'); ?>
            <!-- share -->
            <button id="comment-share-<?php $comments->theId(); ?>-button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons" role="presentation">share</i>
                <span class="visuallyhidden">share comment</span>
            </button>
            <!--<button class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">share</i></button>-->
            <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect" for="comment-share-<?php $comments->theId(); ?>-button">
                <a class="md-menu-list-a" target="view_window" href="<?php $comments->permalink(); ?>">
                    <li class="mdl-menu__item">在新标签页中打开</li>
                </a>
                <a class="md-menu-list-a" href="https://twitter.com/intent/tweet?text=<?php echo htmlspecialchars($comments->content); ?>+from&url=<?php $comments->permalink(); ?>">
                    <li class="mdl-menu__item">分享到 Twitter</li>
                </a>
                <a class="md-menu-list-a" href="https://plus.google.com/share?url=<?php $comments->permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <li class="mdl-menu__item">分享到 Google+</li>
                </a>
            </ul>
        </nav>

        <!-- Comment answers -->
        <div class="comment__answers">
            <?php if ($comments->children) {
                ?>
                <!--是否嵌套评论判断开始-->
                <div class="comment-children">
                    <?php $comments->threadedComments($options); ?>
                    <!--嵌套评论所有内容-->
                </div>
                <?php
            } ?>
            <!--是否嵌套评论判断结束-->
        </div>

    </div>

    <?php
} ?>



    <?php $this->comments()->to($comments); ?>

<?php if($this->user->hasLogin()): ?>
<!--<div class="mdui-chip theme-comments-chip">
    <span class="mdui-chip-title"><?php $this->user->screenName(); ?></span>
</div>-->
<?php endif; ?>

<div class="mdui-chip theme-comments-chip">
    <span class="mdui-chip-icon mdui-color-theme-accent">
        <i class="mdui-icon material-icons">arrow_forward</i>
    </span>
    <span class="mdui-chip-title"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></span>
</div>

    <?php if ($comments->have()): ?>
    <?php $comments->listComments(); ?>
    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">

<?php if(!($this->user->hasLogin())): ?>
<div class="theme-comments-inputs">
    <div class="theme-comments-input mdui-textfield mdui-textfield-floating-label">
        <label for="author" class="mdui-textfield-label">昵称</label>
        <input class="mdui-textfield-input" type="author" name="author" id="author" value="<?php $this->remember('author'); ?>" required/>
    </div>
    <div class="theme-comments-input mdui-textfield mdui-textfield-floating-label">
        <label for="mail" class="mdui-textfield-label">Email</label>
        <input class="mdui-textfield-input" type="email" name="mail" id="mail" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?> required=""<?php endif; ?>/>
    </div>
    <div class="theme-comments-input mdui-textfield mdui-textfield-floating-label">
        <label for="url" class="mdui-textfield-label">网站</label>
        <input class="mdui-textfield-input" type="url" name="url" id="url" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL): ?> required=""<?php endif; ?>/>
    </div>
</div>
<?php endif; ?>
            

<div>
    <!--<label for="textarea">内容</label>-->
    <div class="mdui-textfield">
        <textarea class="mdui-textfield-input" cols="50" name="text" id="textarea" placeholder="说些什么吧..."><?php $this->remember('text'); ?></textarea>
    </div>
</div>

<?php if($this->user->hasLogin()): ?>
<button type="submit" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">以 <?php $this->user->screenName(); ?> 的身份评论</button>
<a href="<?php $this->options->logoutUrl(); ?>" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">注销登录状态</a>
<?php endif; ?>
        </form>
    </div>
    <?php endif; ?>
</div>