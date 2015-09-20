<?php $title = "Администрирование" ?>

<?php ob_start() ?>
<h3>Добавить запись</h3>
<form action="add" method="POST" name="form1">
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
<h3>Удалить запись</h3>
    <ul>
        <?php 
            $i=1;
            foreach ($posts as $post): 
        ?>
        <li>
        	<a id='del_post' href="delete?id=<?php echo $post['id'] ?>">
				<?php echo ' x ' ?>
        	</a>
        	<a id='row_post' href="show?id=<?php echo $post['id'] ?>">
                <?php echo $i.'. '.$post['title'] ?>
            </a>
        </li>
        <?php 
            $i++;
            endforeach; 
        ?>
    </ul>
<?php $content = ob_get_clean() ?>

<?php include 'view/templates/layout.php' ?>