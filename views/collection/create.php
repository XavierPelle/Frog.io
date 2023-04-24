
    <main class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="index.php?page=collection&action=<?php echo $action;
                                                            echo (isset($id)) ? '&id=' . $id : ''; ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo (isset($collection)) ? $collection->id : null; ?>" hidden>
                    <div class="mb-3">
                        <label for='nomCollection' class="form-label">Nom Collection :</label>
                        <input type="text" name="nomCollection" class="form-control" value="<?php echo (isset($collection)) ? $collection->nomCollection : ''; ?>">
                    </div>
                    <input type="hidden" name="idUsers" value="<?php echo (isset($collection)) ? $collection->idUsers : $_SESSION['id']; ?>">
                    <input type="submit" name="submit" value="OK" class="btn btn-primary">
                </form>
            </div>
        </div>
    </main>

