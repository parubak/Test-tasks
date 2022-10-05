<?php
/** @var array $CONTENT -arrays */

?>
<div class="flex-column m-5 px-5" id="containerList">
    <div class="justify-content-sm-center">
        <div class="col">
            <h2 class="text-center">Conference list</h2>
        </div>
    </div>
    <ol class="list-group list-group-numbered justify-content-center mx-5">
<?php
    if (!empty($CONTENT)) {
        foreach ($CONTENT as $k => $v) {
?>
        <li class="list-group-item d-flex justify-content-between align-items-start px-5 mx-5"
            onclick="clickElementList(event)" data-id=<?php echo $CONTENT[$k]["id"];?> >
            <div class="me-auto px-5">
                <div class="pb-0">
                    <p class="font-weight-bold text-uppercase m-0">
                        <label class="pr-2 text-capitalize">Title:</label>
                        <?php echo $CONTENT[$k]["title"]; ?>
                    </p>
                    <p class="m-0">
                        <label class="pr-2 font-weight-bold">Date:</label>
                    <?php echo $CONTENT[$k]["data"];?>
                    </p>

                </div>


            </div>
            <button class="btn-action btn btn-danger" onclick="butDelete( event)"
                                                   data-id=<?php echo $CONTENT[$k]["id"];?>>Delete</button>
        </li>
<?php
        }
    }
?>
    </ol>
    <div>
        <a href="/conference/add" ><button id="btnAdd" class="btn-add btn position-relative btn-primary w-25 mt-2" >
                Add New Conference</button></a>
    </div>
</div>
<script type="text/javascript" src="./js/home.js"></script>