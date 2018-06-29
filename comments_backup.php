<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>




<div class="theme-comments" id="comments">
    <?php $this->comments()->to($comments); ?>

    <?php if ($comments->have()): ?>
<div class="mdui-chip theme-comments-chip">
    <span class="mdui-chip-title"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></span>
</div>
    
    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <?php if($this->user->hasLogin()): ?>
            <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
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
        <textarea class="mdui-textfield-input" cols="50" name="text" id="textarea" rows="8" placeholder="Message"><?php $this->remember('text'); ?></textarea>
    </div>
</div>

<button type="submit" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">提交评论</button>
        </form>
    </div>
    <?php endif; ?>
</div>