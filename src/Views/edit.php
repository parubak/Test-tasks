<?php
/** @var array $CONTENT - arrays */

/** @var array $nowDate - DateUTC */

$id = $CONTENT[0]['id']

?>
<div class="container d-flex flex-column mt-2">
    <div class="text-right">
        <div class="col ">
            <a href="/conference/info/?id=<?php
            echo $id ?>"><input type="button" name="beak" class="btn btn-outline-dark w-25" value="Back"/></a>
        </div>
    </div>
    <div class="justify-content-sm-center">
        <div class="col">
            <h2 class="text-center">Edit Conference</h2>
        </div>
    </div>
</div>
<div class="container d-flex  justify-content-sm-center">
    <form name="edit" id="frmEdit" novalidate action="edit" method="POST" class="d-flex flex-column justify-content-sm-center"
          enctype="multipart/form-data" onsubmit="validation(event)">
        <div class="row justify-content-center">
            <div class="form-group col-xl-10">
                <label>Title</label> <span id="title-info" class="invalid-feedback"></span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" minlength="2" maxlength="255" size="75" placeholder="2-255 characters"
                           class="form-control text-center pl-0" name="title" id="title" value="<?php
                    echo $CONTENT[0]['title'] ?>" required>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group col-xl-10">
                <label>Data</label> <span id="inputDate-info" class="invalid-feedback"></span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="date" id="inputDate" name="inputDate" class="form-control text-center pl-4"
                           placeholder="y-M-d" <?php
                    echo "min='" . $nowDate . "' value='" . $CONTENT[0]["data"] . "'"; ?>
                           required/>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group col-xl-10">
                <label>Country</label> <span id="country-info" class="invalid-feedback"></span>
                <div class="input-group">
                    <div class="input-group-prepend w-100">
                        <span class="input-group-text"></span>
                        <select class="form-control text-center c-pointer pl-3" id="country" name="country" required>
                        </select>

                    </div>
                </div>
                <div class="">
                    <div class="w-100 p-3 d-flex justify-content-center text-center">

                        <input id="butS" type="submit" value="Save" class="btn  w-25 p-2 btn-outline-success"/>

                        <input type="button" value="Delete" onclick="onclickDelete(<?php
                        echo $id ?>)"
                               class="btn  w-25 ml-5 p-2 btn-outline-danger"/>
                    </div>
                </div>
                <div class="d-flex justify-content-center text-center">
                    <div class="w-50">
                        <div id="statusMessage" class="" role="alert">
                        </div>
                    </div>
                </div>
    </form>
    <div class="input-group justify-content-end">
        <label for="marker" class="c-pointer" style="visibility: hidden">
            <input type="checkbox" id="marker" form="frmEdit" name="marker" class="text-right mr-2"/>Show marker
        </label>
    </div>
    <div id="map"></div>
</div>
<script>
    const arrayContent =<?php echo json_encode($CONTENT[0]); ?>;
</script>

<script src="/js/functionalForm.js"></script>
<script src="/js/edit.js"></script>
<script src="/js/home.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?
key=????????????????????&callback&libraries=places&callback=initMap&solution_channel=
GMP_guides_locatorplus_v2_a" defer>
</script>
