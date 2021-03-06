<? $plan = array(
	array('Івано-франківск', mktime(0, 0, 0, 10, 3, 2009)),
	array('Київ', mktime(0, 0, 0, 10, 4, 2009)),
	array('Київ', mktime(0, 0, 0, 10, 11, 2009)),
	array('Харків', mktime(0, 0, 0, 10, 16, 2009)),
	array('Київ', mktime(0, 0, 0, 10, 17, 2009))
)?>

<a href="" target="_blank"><img src="/static/images/partners/games.png" align="left" class="mr10" /></a>

<h3>Гра-тренінг "Ігри влади - моделювання парламентської демократії"</h3>
<p>Ти вважаєш, що знаєш як краще керувати державою? Ти вважаєш, що попередні уряди,парламенти,президенти не правильно будують твою країну? Ти думаєш, що ти стратег? Ти думаєш, що ти розумієш як правильно розвивати свою країну? Тоді зареєструйся на участь у грі-тренінгу "Ігри влади - можелювання парламентської демократії" і <b>доведи це</b>!</p>

<h3>Передісторія</h3>
<p>Створилася нова держава і гравцям надається можливість спробувати себе у ролі державотворців.Перед ними стоять проблеми розвитку економіки (у нової країни є держ.борг,що дістався у спадок від Старої Держави),непердбачуваних ситуацій (робляться модераторами,щоб не було нудно грати =) ),норову та амбіцій інших гравців та багато-багато цікавих елементів</p>

<h2>Суть гри</h2>
<hr />
<p>З групи гравців формується парламент,кабінет тощо та народ.Проходить моделювання виборів,роботи парламенту.кабінету.Проходять війни,ініціюються перевороти,приходять стихійні лиха тощо =)</p>
<p>Кожен може стати членом парламенту,кабінету або організувати свою структуру в народі і по СВОЄМУ таланту керувати державою.</p>

<h2>Рамки</h2>
<hr />
<ul>
	<li>час</li>
	<li>гроші(ігрові)</li>
	<li>площа(зала) гри</li>
	<li>Закони України</li>
	<li>модератори гри</li>
</ul>

<p><em>Оргомітет має право відбору бажаючих. Оргкомітет не відшкодовує витрати гравці на харчування,транспорт тощо!</em></p>
<p style="background: #FFD; padding: 10px; border: 1px solid #DD8">Для участі в тренінгу <a href="https://spreadsheets.google.com/viewform?formkey=dGU0dFY4OHFVSklwN3hjd0RvVVdReHc6MA" target="_blank">заповніть анкету</a></p>


<h2>Графік ігор</h2>
<hr />
<table class="data-table">
	<tr>
		<th>№</th>
		<th>Місто</th>
		<th>Початок роботи в регіоні</th>
	</tr>

	<? $now = time(); ?>
	<? foreach ( $plan as $i => $data ) { ?>
		<? $is_next = ( ( $now >= $plan[$i-1][1] ) && ( $now <= $plan[$i][1] ) ) ?>
		<tr class="<?=$is_next ? 'highlight' : ''?>">
			<td><?=$i+1?></td>
			<td><?=$data[0]?></td>
			<td>
				<?=date('d.m.Y', $data[1])?>
				<? if ( $is_next ) { ?>
					&nbsp; &rarr; найближча гра
				<? } ?>
				<?=$data[2]?>
			</td>
		</tr>
	<? } ?>
</table>

<p>Тренінг є безкоштовним і проводиться спільно з POLITIKO.com.ua, Спілкою молодих політологів України та Київським міським осередком ВМГО "Європейська молодь України"</p>

<?=tag_helper::image('partners/emu.jpg', array('class' => 'vcenter left'))?>
<?=tag_helper::image('partners/smpu.gif', array('class' => 'vcenter right'))?>

<div class="clear"></div>

<?/* t('Проект Игры Власти') */?>