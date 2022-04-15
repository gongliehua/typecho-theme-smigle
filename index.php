<?php
/**
 * 这是 Typecho 系统的一套皮肤
 *
 * @package Smigle
 * @author liukaishui
 * @version 1.0.0
 * @link http://liukaishui.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('header.php');
?>

<div id="content">
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

    <?php $this->pageNav('Prev', 'Next'); ?>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
