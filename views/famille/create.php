<main>
    <div>
        <?php echo $flashmessage; var_dump($famille);?>
    </div>
    <form action="index.php?page=famille&action=<?php echo $action; echo (isset($id)) ? '&id='.$id : '';?>" method="POST">
        <input type="text" name="id" value="<?php echo (isset($famille)) ? $famille->id : '';?>">
        <input type="text" name="nomFamille" value="<?php echo (isset($famille)) ? $famille->nomFamille : '';?>">
        <input type="submit" name="submit" value="OK">
    </form>
</main>