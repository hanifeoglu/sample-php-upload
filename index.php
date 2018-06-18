<?php include_once "layout_header.php"; ?>

    <form action="upload.php" method="post" enctype="multipart/form-data">


        <table class="table table-hover table-responsive table-bordered">

            <tbody>

            <tr>
                <td>Files</td>
                <td><input type="file" name="image" /></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Upload File
                    </button>
                </td>
            </tr>

            </tbody>
        </table>
    </form>

</div>

<?php include_once "layout_footer.php"; ?>

