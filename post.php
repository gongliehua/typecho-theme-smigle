<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div>
    <article>
        <h2><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
        <!--
        <div class="post-meta">
            <div>
                <span>Posted on</span> <time><?php $this->date(); ?></time>
                <span>in</span> <?php $this->category(','); ?>
            </div>
            <div>
                <span>Tags:</span> <?php $this->tags(',', true, 'none'); ?>
            </div>
        </div>
        -->
        <div>
            <?php $this->content(); ?>
        </div>
    </article>

    <ul class="page-navigator">
        <li>Prev: <?php $this->thePrev('%s','null'); ?></li>
        <li>Next: <?php $this->theNext('%s','null'); ?></li>
    </ul>

    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
