<?php $title = 'Список постов' ?>

<?php ob_start() ?>
    <h2>Список постов</h2>
    <ul>
        <?php 
            $i=1;
            foreach ($posts as $post): 
        ?>
        <li>
             <a href="show?id=<?php echo $post['id'] ?>">
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