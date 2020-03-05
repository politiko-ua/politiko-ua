<? $sub_menu = '/blogs/favorites'; ?>
<? include 'partials/sub_menu.php' ?>

<div class="left" style="width: 35%;"><? include 'partials/left.php' ?></div>

<div class="left ml10" style="width: 62%;">

	<div class="column_head">
		<h1 class="left"> <?=t('Избранное')?></h1>
		<a class="right" href="/blogs/rss?type=favorites"><?=tag_helper::image('icons/rss.gif', array('class' => 'mt10', 'title' => 'RSS'))?></a>
	</div>

	<? foreach ( $list as $id ) { ?>
		<? $post_data = blogs_posts_peer::instance()->get_item($id) ?>
		<? include 'partials/post.php'; ?>
	<? } ?>

	<div class="bottom_line_d mb10"></div>
	<div class="right pager"><?=pager_helper::get_short($pager)?></div>

</div>