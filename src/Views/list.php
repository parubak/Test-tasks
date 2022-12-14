<?php
/** @var array $CONTENT -arrays */

?>
<div class="m-5" id="containerList">
    <div class="justify-content-sm-center">
        <div class="col">
            <h2 class="text-center">Conference list</h2>
        </div>
    </div>
    <ol class="list-group list-group-numbered justify-content-center m-auto w-75">
        <?php
        if (!empty($CONTENT)) {
            foreach ($CONTENT as $k => $v) {
                ?>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ml-3">
                        <div class="c-pointer pb-0" onclick="onclickElementList(<?php
                        echo $CONTENT[$k]["id"]; ?>)">
                            <p class="font-weight-bold text-uppercase m-0">
                                <label class="pr-2  text-capitalize">Title:</label>
                                <label class="c-pointer">"<?php
                                    echo $CONTENT[$k]["title"]; ?>"

                                </label>

                            </p>
                            <p class="m-0">
                                <label class="pr-2 font-weight-bold">Date:</label>
                                <?php
                                echo $CONTENT[$k]["data"]; ?>

                            </p>
                        </div>

                    </div>
                    <button class="btn-action btn btn-danger float-right" onclick="onclickDelete(<?php
                    echo $CONTENT[$k]["id"]; ?>)">Delete
                    </button>

                </li>
                <?php
            }
        } else {
            echo '<div class="flex-column m-5 px-5" id="containerList">
            <div class="justify-content-sm-center">
                <div class="col">
                    <h1 class="text-center font-weight-bold">No Conferences</h1>
                </div>
            </div>
        </div>';
        }
        ?>

    </ol>
    <div>
        <a href="/conference/add">
            <button id="btnAdd" class="btn-add btn position-relative btn-primary mt-2">
                Add New Conference
            </button>
        </a>
    </div>
</div>
<script type="text/javascript" src="/js/home.js"></script>