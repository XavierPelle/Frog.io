<main>
    <div class="alert alert-success" role="alert">
        <?php echo $flashmessage; ?>
    </div>
    <form action="index.php?page=collection&action=<?php echo $action; echo (isset($id)) ? '&id=' . $id : ''; ?>" method="POST">
    <label for='nomCollection'>Nom Collection :</label>
        <input type="text" name="nomCollection" value="<?php echo (isset($collection)) ? $collection->nomCollection : ''; ?>">
        <input type="text" name="idUsers" value="<?php echo (isset($collection)) ? $collection->idUsers : '1'; ?>" hidden>
        <input type="submit" name="submit" value="OK">
    </form>
</main>