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

<script src="https://cdnjs.loli.net/ajax/libs/mdui/0.4.1/js/mdui.min.js"></script>
<script src="<?php $this->options->themeUrl('src/directory.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('src/highlight.pack.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('src/holder.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('src/smooth-scroll.min.js'); ?>"></script>

</body>
</html>