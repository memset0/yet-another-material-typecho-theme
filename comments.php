<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="theme-comments" id="comments">

<?php function threadedComments($comments, $options)
{
    $commentClass = '';
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
    ?>
    <div id="li-<?php $comments->theId(); ?>" class="comment comment-body<?php
    if ($comments->_levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass; ?>">



        <!-- Comment info -->
        <div class="comment header" id="theme-comment-avatar-<?php $comments->theId(); ?>">

            <!-- Comment avatar -->
<div class="mdui-chip theme-comment-avatar-chip">
    <?php $comments->gravatar(80); ?>
    <span class="mdui-chip-title"><?php $comments->author(); ?></span>
</div>
<div class="mdui-chip theme-comment-avatar-chip">
    <span class="mdui-chip-title"><?php $comments->date('Y-m-d, H:i'); ?></span>
</div>

<?php $comments->reply('<button class="theme-comment-reply-button mdui-text-color-theme-accent mdui-btn mdui-btn-icon" id="comment-share-<?php $comments->theId(); ?>-button" ">
                <i class="mdui-icon material-icons">reply</i>
            </button>'); ?>

<?php $comments->content(); ?>

        </div>

        <!-- Comment answers -->
        <div class="comment__answers">
            <?php if ($comments->children) {
                ?>
                <div class="comment-children">
                    <?php $comments->threadedComments($options); ?>
                </div>
                <?php
            } ?>
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
    <span class="mdui-chip-title"><?php $this->commentsNum(_t('这里还没有评论，抢个沙发吧！'), _t('仅有一条评论，赶快再留一条！'), _t('已有 %d 条评论，评论一下吧！')); ?></span>
</div>

    <?php if ($comments->have()): ?>

<div class="theme-comment-list">
    <?php $comments->listComments(); ?>
</div>

    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>

    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
            
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
<button type="submit" class="theme-comment-button mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">以 <?php $this->user->screenName(); ?> 的身份评论</button>
<a href="<?php $this->options->logoutUrl(); ?>" class="theme-comment-button mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">注销登录状态</a>
<?php endif; ?>

<!-- 取消回复功能 -> 不会搞
<?php $comments->cancelReply('取消回复状态'); ?>
-->

        </form>
    </div>
    <?php endif; ?>
</div>