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
