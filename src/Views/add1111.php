<div class="container">
    <div class="row py-4">
        <div class="col">
            <h2>Bootstrap Add Form</h2>
        </div>
    </div>
    <form name="frmAdd" id="frmAdd" method="post" action=""
          enctype="multipart/form-data" novalidate>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Title</label> <span id="title-info"
                                          class="invalid-feedback"></span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" class="form-control" name="title"
                           id="title" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Email</label> <span id="userEmail-info"
                                           class="invalid-feedback"></span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="email" name="userEmail" id="userEmail"
                           class="form-control" required>
                </div>
                <small id="emailHelp" class="form-text text-muted">Your email will
                    not be shared.</small>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8">
                <label>Subject</label> <span id="subject-info"
                                             class="invalid-feedback"></span>
                <div class="input-group">

                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" name="subject" id="subject"
                           class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8">
                <label>Message</label> <span id="content-info"
                                             class=" invalid-feedback"></span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                    </svg>
                    <textarea class="form-control" rows="5" name="message"
                              id="message" required></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" name="send" class="btn btn-primary"
                       value="Send Message" />
            </div>
        </div>
        <?php
        if (! empty($displayMessage)) {
            ?>
            <div class="row">
                <div class="col-md-8">
                    <div id="statusMessage" class="alert alert-success mt-3"
                         role="alert"><?php echo $displayMessage; ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </form>
</div>
<script type="text/javascript" src="./js/validation.js"></script>


