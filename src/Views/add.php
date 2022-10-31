<?php
/** @var array $nowDate - DateUTC */


?>
<div class="container d-flex flex-column mt-2">
    <div class="text-right">
        <div class="col ">
            <a href="/"><input type="button" name="beak" class="btn btn-outline-dark w-25" value="beak"/></a>
        </div>
    </div>
    <div class="justify-content-sm-center">
        <div class="col">
            <h2 class="text-center">Add Form Conference</h2>
        </div>
    </div>
</div>
<div class="container d-flex  justify-content-sm-center">
    <form name="add" id="frmAdd" novalidate action="add" method="POST" enctype="multipart/form-data"
          class="d-flex flex-column justify-content-sm-center" onsubmit="validation(event)">
        <div class="row justify-content-center">
            <div class="form-group col-xl-10">
                <label>Title</label> <span id="title-info" class="invalid-feedback"></span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" minlength="2" maxlength="255" size="75" placeholder="2-255 characters"
                           class="form-control text-center" name="title" id="title"
                           required>
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
                    <?php
                    echo '<input type="date" id="inputDate" name="inputDate" class="form-control text-center" 
                           placeholder="y-M-d" min="' . $nowDate . '" value="' . $nowDate . '" required/>';
                    ?>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="form-group col-xl-10">
                <label>Country</label> <span id="country-info" class="invalid-feedback"></span>
                <div class="input-group">
                    <div class="input-group-prepend w-100">
                        <span class="input-group-text"></span>
                        <select class="form-control text-center c-pointer" id="country" name="country" required>
                            <option value="" selected>Select a country</option>
                        </select>

                    </div>

                </div>

                <div class="d-flex justify-content-center text-center">
                    <div class="w-50 p-3">
                        <input type="submit" name="create" class="btn bg-primary text-white w-100 p-2"
                               value="Create Conference"/>
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
            <input type="checkbox" id="marker" form="frmAdd" name="marker" class="text-right mr-2"/>Show marker
        </label>
    </div>
    <div id="map"></div>
</div>

<script src="/js/add.js"></script>
<script src="/js/functionalForm.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?
key=????????????????&callback&libraries=places&callback=initMap&solution_channel=
GMP_guides_locatorplus_v2_a" defer>
</script>
