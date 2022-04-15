<?php
/**
 * 标签模板
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
$this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => false, 'desc' => true, 'limit' => 10000))->to($tags);
?>

<div>
    <article>
        <h1><?php $this->title() ?></h1>
        <div>
            <ul>
                <?php while ($tags->next()): ?>
                    <li><a href="<?php echo $tags->permalink ?>"><?php echo $tags->name ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </article>
</div>

<?php
$this->need('footer.php');
?>
