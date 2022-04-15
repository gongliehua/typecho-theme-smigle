<?php
/**
 * 分类模板
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
$this->widget('Widget_Metas_Category_List')->to($categories);
?>

<div>
    <article>
        <h2><?php $this->title() ?></h2>
        <div>
            <ul>
                <?php while ($categories->next()): ?>
                    <li><a href="<?php echo $categories->permalink ?>"><?php echo $categories->name ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </article>
</div>

<?php
$this->need('footer.php');
?>
