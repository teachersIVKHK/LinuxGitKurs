<?php $title = "Администрирование" ?>

<?php ob_start() ?>
<h2>Администрирование странички</h2>
<form action="/LinuxGitKurs/index.php/add" method="POST" name="form1">
<table>
	<tr>
		<td>Автор: </td>
		<td><input type="text" name="add_autor"></td>
	</tr>
	<tr>
		<td>Data: </td>
		<td><input type="calendar" name="add_date"></td>
	</tr>
	<tr>
		<td>Заголовок: </td>
		<td><input type="text" name="add_title"></td>
	</tr>
	<tr>
		<td>Текст: </td>
		<td><textarea name="add_content"></textarea></td>
	</tr>
	<tr>
		<td><input type="reset" name="reset" value="Очистить"></td>
		<td><input type="submit" name="submit" value="Добавить"></td>
	</tr>
</table>
</form>
<?php $content = ob_get_clean() ?>

<?php include 'view/templates/layout.php' ?>