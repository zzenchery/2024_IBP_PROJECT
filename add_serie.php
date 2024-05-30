<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_to_store = array_filter($_POST);
    $data_to_store['created_at'] = date('Y-m-d H:i:s');
    $db = getDbInstance();
    $last_id = $db->insert('series', $data_to_store);
    if ($last_id) {
        $_SESSION['success'] = "Serie added successfully!";
        header('location: series.php');
        exit();
    } else {
        echo 'insert failed: ' . $db->getLastError();
        exit();
    }
}

$edit = false;
require_once 'includes/header.php';
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Add Serie</h2>
            </div>

        </div>
        <form class="form" action="" method="post" id="serie_form" enctype="multipart/form-data">
            <?php include_once('./forms/series_form.php'); ?>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#serie_form").validate({
                rules: {
                    author: {
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