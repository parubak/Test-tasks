<?php
?>
<html  lang="">
<head>
    <title>CRUD</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <script src="../crudEvent.js"></script>

</head>
<body>
<div class="conferences-container">
<div>

    <div class="form-container">
        <form method="POST">
            <div class="form-group">
                <div class="row">
                    <label for="title">Title</label> <input type="text"
                                                name="title" id="title" class="form-control"
                                                required>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description"
                              name="description" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label for="url">URL</label> <input type="text" name="url"
                                              id="url" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label for="category">Category</label> <input type="text"
                                                                                 name="category" id="category"
                                                                                 class="form-control" required>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <button class="btn btn-primary" name="add">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>
</div>

</body>
</html>