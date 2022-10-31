<?php
/** @var array $CONTENT - arrays */

$id = $CONTENT[0]['id'];
?>

<div class="container d-flex flex-column mt-2">
    <div class="text-right">
        <div class="col ">
            <a href="/"><input type="button" name="beak" class="btn btn-outline-dark w-25" value="Back"/></a>
        </div>
    </div>
    <div class="justify-content-sm-center">
        <div class="col">
            <h2 class="text-center">Info Conference</h2>
        </div>
    </div>
</div>
<div class="container d-flex  justify-content-sm-center">

    <form name="frmAdd" id="frmInfo" method="post" class="d-flex flex-column justify-content-sm-center">
        <div class="row justify-content-center">
            <div class="form-group col-xl-10">
                <label>Title</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <div class="form-control text-center" style="width: 10px" readonly><?php
                        echo $CONTENT[0]['title'] ?></div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="form-group col-xl-10">
                <label>Data</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" maxlength="255" id="inputDate" name="inputDate" class="form-control text-center"
                           value="<?php
                           echo date_format(date_create($CONTENT[0]['data']), "d.m.Y "); ?>" readonly/>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="form-group col-xl-10">
                <label>Country</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                        <input class="form-control text-center" size="75" id="country" name="country" type="text"
                               readonly>
                    </div>
                </div>

                <div class="">
                    <div class="w-100 p-3 d-flex justify-content-center text-center">

                        <input type="button" class="btn  text-white w-25 p-2 btn-info" onclick="onclickEdit(<?php
                        echo $id ?>)" value="Edit"/>

                        <input type="button" class="btn text-white w-25 ml-5 p-2 btn-danger"
                               onclick="onclickDelete(<?php
                               echo $id ?>)" value="Delete"/>

                    </div>
                </div>
    </form>
    <div id="map"></div>

</div>
<script src="/js/home.js"></script>
<script src="/js/info.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=??????????????????&callback&
libraries=places&callback=initMap&solution_channel=GMP_guides_locatorplus_v2_a" defer></script>
<script>const arrayContent =<?php echo json_encode($CONTENT[0]); ?>;</script>



