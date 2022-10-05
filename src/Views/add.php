<?php
/** @var array $nowDate - Date */


?>
<div class="container d-flex flex-column mt-2">
<div class="text-right">
    <div class="col ">
        <a href="/"><input type="button" name="beak" class="btn btn-primary w-25 mr-5" value="beak"/></a>
    </div>
</div>
<div class="justify-content-sm-center">
    <div class="col">
        <h2 class="text-center">Add Form Conference</h2>
    </div>
</div>
</div>
<div class="container d-flex  justify-content-sm-center">

    <form name="frmAdd" id="frmAdd" method="post" class="d-flex flex-column justify-content-sm-center"  autocomplete="on" enctype="form_data">
        <div class="row justify-content-center">
            <div class="form-group col-xl-10">
                <label>Title</label> <span id="title-info" class="invalid-feedback"></span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" minlength="2" maxlength="255" class="form-control text-center" name="title" id="title"
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
                           placeholder="y-M-d" min="'.$nowDate.'" value="'.$nowDate.'" required/>';
                    ?>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="form-group col-xl-10">
                <label>Country</label> <span id="country-info" class="invalid-feedback"></span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    <input class="form-control text-center" size="75" id="autocomplete" name="country" type="text"
                                                             placeholder="Enter country"   required>
                </div>
            </div>

            <div class="d-flex justify-content-center text-center">
                <div class="w-50 p-3">
                    <input type="submit" name="send" class="btn bg-primary text-white w-100 p-2" value="Add Conference"/>
                </div>
            </div>

            <?php
            if (!empty($displayMessage)) {
                ?>
                <div class="row">
                    <div class="col-md-8">
                        <div id="statusMessage" class="alert alert-success mt-7" role="alert"><?php
                            echo $displayMessage; ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
    </form>
        <div id="map"></div>
</div>
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="-->
<!--        crossorigin="anonymous"></script>-->
    <script src="/js/google.js"></script>
<!--    <script src="/js/validation.js"></script>-->
<!--AIzaSyAgFxVevJK-v3gWt49uyDpB91g8g1IMVrQ-->
<script src="https://maps.googleapis.com/maps/api/js?key=1AIzaSyAgFxVevJK-v3gWt49uyDpB91g8g1IMVrQ&callback&libraries=places&callback=initMap&solution_channel=GMP_guides_locatorplus_v2_a"
        defer></script>
<!--    AIzaSyBee5qjls39bKldPctH6xET0ZtZ-a9RykE-->
