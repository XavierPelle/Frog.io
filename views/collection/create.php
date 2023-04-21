<main>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['id']; ?>
    </div>
    <form action="index.php?page=collection&action=<?php echo $action;
                                                    echo (isset($id)) ? '&id=' . $id : ''; ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo (isset($collection)) ? $collection->id : null; ?>" hidden>
        <label for='nomCollection'>Nom Collection :</label>
        <input type="text" name="nomCollection" value="<?php echo (isset($collection)) ? $collection->nomCollection : ''; ?>">
        <input type="hidden" name="idUsers" value="<?php echo (isset($collection)) ? $collection->idUsers : $_SESSION['id']; ?>">
        <input type="submit" name="submit" value="OK">
    </form>
</main>