<?php

$title = $article->getName();
$comments = $comments ?? []; // Инициализация переменной
require dirname(__DIR__) . '/header.php';

$title = $article->getName(); 
require dirname(__DIR__) . '/header.php';
?>

<div class="card" style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title"><?=$article->getName();?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?=$article->getAuthor()->getNickName();?></h6>
    <p class="card-text"><?=$article->getText();?></p>
    <a href="<?=dirname($_SERVER['SCRIPT_NAME']);?>/article/<?=$article->getId();?>/edit" class="btn btn-primary">Article update</a>
     <a href="<?=dirname($_SERVER['SCRIPT_NAME']);?>/article/<?=$article->getId();?>/delete" class="btn btn-warning">Article delete</a>
  </div>
</div>
<form action="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/article/<?= $article->getId() ?>/comment" method="POST">
    <div class="mb-3">
        <textarea class="form-control" name="text" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Добавить комментарий</button>
</form>
<div class="comments mt-4">
    <?php foreach ($comments as $comment): ?>
    <div class="card mb-3" id="comment<?= $comment->getId() ?>">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">
                <?= $comment->getAuthor()->getNickname() ?>
                <small><?= $comment->getCreatedAt() ?></small>
            </h6>
            <p class="card-text"><?= htmlspecialchars($comment->getText()) ?></p>
            <a href="/comment/<?= $comment->getId() ?>/edit" class="btn btn-sm btn-outline-secondary">Редактировать</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php require dirname(__DIR__).'/footer.php';?>

