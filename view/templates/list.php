<?php $title = 'Список постов' ?>

<?php ob_start() ?>
    <h1>Список постов</h1>
    <ul>
        <?php foreach ($posts as $post): ?>
        <li>
            <a href="/LinuxGitKurs/index.php/show?id=<?php echo $post['id'] ?>">
                <?php echo $post['title'] ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
<?php $content = ob_get_clean() ?>

<?php include 'view/templates/layout.php' ?>