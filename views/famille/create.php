<main>
    <div class="alert alert-success" role="alert">
        <?php echo $flashmessage;?>
    </div>
    <form action="index.php?page=famille&action=<?php echo $action; echo (isset($id)) ? '&id='.$id : '';?>" method="POST">
        <input type="text" name="id" value="<?php echo (isset($famille)) ? $famille->id : '';?>" hidden>
        <input type="text" name="nomFamille" value="<?php echo (isset($famille)) ? $famille->nomFamille : '';?>">
        <input type="submit" name="submit" value="OK">
    </form>
</main>