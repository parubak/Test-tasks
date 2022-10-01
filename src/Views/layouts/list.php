<?php
/** @var array $data -arrays */
/** @var array $news -arrays */
/** @var array $head -arrays */
/** @var array $content -arrays */


?>

<html lang="">
<?php echo $content["head"]; ?>
<body>
<?php //dd($arrayData);

?>
<main>
    <div class="conferences-container" id="container">
        <ol class="list-group list-group-numbered">
            <?php
            if (!empty($data)) {
                foreach ($data as $k => $v) {
                    ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <?php
                                echo $data[$k]["Title"]; ?>
                            </div>
                            <?php
                            echo $data[$k]["Date"]; ?>
                        </div>
                        <button class="btn-action btn btn-danger">Delete</button>
                    </li>
                    <?php
                }
            }
            ?>
        </ol>
        <div>
            <a href="add"><button class="btn-add btn position-relative btn-primary ">Add New Record</button></a>
        </div>
    </div>
    <!-- Modal
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmEdit">
                        <div class="form-group">
                            <div class="row">
                                <label>Title</label> <input type="text"
                                                            name="title" id="title"
                                                            class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label>Description</label>
                                <textarea class="form-control"
                                          id="description"
                                          name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label>URL</label> <input type="text"
                                                          name="url" id="url"
                                                          class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label>Category</label> <input
                                        type="text" name="category"
                                        id="category"
                                        class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <input type="text" name="id"
                                       id="id" class="form-control"
                                       hidden="true">
                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-primary"
                            id="update">Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!- - Modal ends here -- >

    <!- - Modal for message- >
    <div class="modal fade" id="messageModal" tabindex="-1"
         role="dialog" data-backdrop="static"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                    <button type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center" id="msg"></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!- - Modal ends here - ->
    -->
</main>
</body>
</html>