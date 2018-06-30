<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<!--
        </div>
    </div>
</div>

<footer id="footer" role="contentinfo">
    &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>.
</footer>

<?php $this->footer(); ?>
</body>
</html>
-->

<div class="mdui-fab-wrapper" mdui-fab="{trigger: 'hover'}" id="exampleFab">
  <button class="mdui-fab mdui-ripple mdui-color-theme-accent">
    <!-- 默认显示的图标 -->
    <i class="mdui-icon material-icons">add</i>
    
    <!-- 在拨号菜单开始打开时，平滑切换到该图标，若不需要切换图标，则可以省略该元素 -->
    <i class="mdui-icon mdui-fab-opened material-icons">apps</i>
  </button>
  <div class="mdui-fab-dial">
    <button class="mdui-fab mdui-fab-mini mdui-ripple mdui-color-white"><i class="mdui-icon material-icons">backup</i></button>
    <button class="mdui-fab mdui-fab-mini mdui-ripple mdui-color-red"><i class="mdui-icon material-icons">bookmark</i></button>
    <button class="mdui-fab mdui-fab-mini mdui-ripple mdui-color-orange"><i class="mdui-icon material-icons">access_alarms</i></button>
    <button class="mdui-fab mdui-fab-mini mdui-ripple mdui-color-blue"><i class="mdui-icon material-icons">touch_app</i></button>
  </div>
</div>

<script src="https://cdnjs.loli.net/ajax/libs/mdui/0.4.1/js/mdui.min.js"></script>
<script src="<?php $this->options->themeUrl('src/directory.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('src/highlight.pack.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('src/holder.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('src/smooth-scroll.min.js'); ?>"></script>

</body>
</html>