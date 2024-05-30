<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';
$serie_id = filter_input(INPUT_GET, 'serie_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation', FILTER_SANITIZE_STRING);
($operation == 'edit') ? $edit = true : $edit = false;
$db = getDbInstance();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serie_id = filter_input(INPUT_GET, 'serie_id', FILTER_SANITIZE_STRING);
    $data_to_update = filter_input_array(INPUT_POST);
    $data_to_update['updated_at'] = date('Y-m-d H:i:s');
    $db = getDbInstance();
    $db->where('id', $serie_id);
    $stat = $db->update('series', $data_to_update);
    if ($stat) {
        $_SESSION['success'] = "Serie updated successfully!";
        header('location: series.php');
        exit();
    }
}
if ($edit) {
    $db->where('id', $serie_id);
    $serie = $db->getOne("series");
}
?>
<?php
include_once 'includes/header.php';
?>
    <div id="page-wrapper">
        <div class="row">
            <h2 class="page-header">Update Serie</h2>
        </div>
        <?php
        include('./includes/flash_messages.php')
        ?>
        <form class="" action="" method="post" enctype="multipart/form-data" id="serie_form">
            <?php
            require_once('./forms/series_form.php');
            ?>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#serie_form").validate({
                rules: {
                    director: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    type: {
                        required: true
                    }
                }
            });
        });
    </script>
<?php include_once 'includes/footer.php'; ?>