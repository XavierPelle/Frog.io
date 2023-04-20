<main>
    <div class="alert alert-success" role="alert">
        <?php echo $flashmessage; ?>
    </div>
    <form action="index.php?page=collection&action=<?php echo (isset($id)) ? '&id=' . $id : ''; ?>" method="POST">
        <input type="text" name="nomCollection"
            value="<?php echo (isset($collection)) ? $collecion->nomCollection : ''; ?>">
        <input type="submit" name="submit" value="OK">
    </form>
</main>