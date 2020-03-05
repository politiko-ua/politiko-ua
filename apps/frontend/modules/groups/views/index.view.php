<? $sub_menu = '/groups'; ?>
<? include 'partials/sub_menu.php' ?>

<div class="left" style="width: 35%;"><? include 'partials/left.php' ?></div>

<div class="left ml10" style="width: 62%;">
	<h1 class="column_head">
		<? if ( $cur_type ) { ?>
			<a href="/groups"><?=t('Группы')?></a> &rarr;
			<?=groups_peer::get_type($cur_type)?>
		<? } else { ?>
			<?=t('Популярные группы')?>
		<? } ?>
	</h1>
	
	<? foreach ( $hot as $id ) { include 'partials/group.php'; } ?>
	<div class="bottom_line_d mb10"></div>
	<div class="right pager"><?=pager_helper::get_full($pager)?></div>

</div>