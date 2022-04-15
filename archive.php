<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div>
        <article>
            <h2 class="post-title"><?php $this->archiveTitle(array(
                'category'  =>  _t('分类 %s 下的文章'),
                'search'    =>  _t('包含关键字 %s 的文章'),
                'tag'       =>  _t('标签 %s 下的文章'),
                'author'    =>  _t('%s 发布的文章')
            ), '', ''); ?></h2>
        </article>
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
            <article>
    			<h3 class="summary-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3>
                <div class="post-meta">
                    <div>
                        <span>Posted on</span> <time><?php $this->date(); ?></time>
                        <span>in</span> <?php $this->category(','); ?>
                    </div>
                    <div>
                        <span>Tags:</span> <?php $this->tags(',', true, 'none'); ?>
                    </div>
                </div>
                <div class="summary-body">
                    <p><?php handleReadMore($this->content) ?></p>
                    <a href="<?php $this->permalink() ?>">Read more...</a>
                </div>
    		</article>
    	<?php endwhile; ?>
        <?php else: ?>
            <article>
                <h3 class="post-title"><?php _e('没有找到内容'); ?></h3>
            </article>
        <?php endif; ?>

        <?php $this->pageNav('Prev', 'Next'); ?>
    </div><!-- end #main -->

	<?php $this->need('footer.php'); ?>
