<? $sub_menu = '/ideas/create'; ?>
<? include 'partials/sub_menu.php' ?>

<? if ( !$allow_create ) { ?>
	<div class="screen_message acenter"><?=t('Вы сможете высказать идеи, когда Ваш опыт достигнет')?> 5.</div>
<? } else { ?>
	<div class="form_bg">
		<h1 class="column_head"><?=t('Новая идея')?></h1>

		<form id="add_form" class="form mt10">
			<table width="100%" class="fs12">
				<tr>
					<td class="aright" width="18%"><?=t('Сфрера')?></td>
					<td>
						<?=tag_helper::select('segment', ideas_peer::get_segments())?>
					</td>
				</tr>
				<tr>
					<td class="aright" width="18%"><?=t('Краткий смысл')?></td>
					<td><input type="text" class="text" rel="<?=t('Введите заголовок Вашей идеи')?>" name="title" style="width: 500px;" /></td>
				</tr>
				<tr>
					<td class="aright" width="18%"><?=t('Содержание идеи')?></td>
					<td><textarea rel="<?=t('Введите текст Вашей идеи')?>" name="text" style="width: 500px; height:100px;"></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit" class="button" value=" <?=t('Сохранить')?> ">
						<input onclick="history.go(-1);" type="button" name="cancel" class="button_gray" value=" <?=t('Отмена')?> ">
						<?=tag_helper::wait_panel() ?>
						<div class="success hidden mr10 mt10"><?=t('Мнение добавлено')?></div>
					</td>
				</tr>

			</table>
		</form>
	</div>
<? } ?>