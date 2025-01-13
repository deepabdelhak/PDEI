<?php include 'app/inc/header.php'; ?>



<?php
// Delete Event By Id 
if (isset($_GET['delid']) && isset($_GET['action']) && $_GET['action'] == 'delete') {
    $delid = preg_replace('/[^a-zA-Z0-9-]/', '', $_GET['delid']);
    $deleteEvent = $usr->deleteEventById($delid);
}

// Delete Role By Id 
$delid = isset($_GET['delid']) ? $_GET['delid'] : '';
if (isset($_GET['delid']) && isset($_GET['remove']) == 'removeid') {
    $delid = preg_replace('/[^a-zA-Z0-9-]/', '', $_GET['delid']);
    $deUserByid = $usr->deleteUserById($delid);
}
?>

<?php
// Id disable method 
$disid = isset($_GET['disid']) ? $_GET['disid'] : '';
if (isset($_GET['disid'])) {
    $disid = preg_replace('/[^a-zA-Z0-9-]/', '', $_GET['disid']);
    $disableId = $usr->DisableUserById($disid);
}


// Id Enable method 
$enid = isset($_GET['enid']) ? $_GET['enid'] : '';
if (isset($_GET['enid'])) {
    $enid = preg_replace('/[^a-zA-Z0-9-]/', '', $_GET['enid']);
    $enableId = $usr->EnableUserById($enid);
}



?>



<div class="content-header" style="top:80px !important;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dec_add.php"><i class="material-icons">home</i>Home</a></li>

            <li class="breadcrumb-item active" aria-current="page">Declaration</li>
        </ol>
    </nav>
    <div class="create-item">

    <a href="dec.php" class="theme-primary-btn btn btn-primary"><i class="material-icons">add</i>Liste de Declaration</a>

        <?php if (isset($create) == '$create') { ?>
        <?php } ?>



    </div>
</div>
<!--====== Start Main Wrapper Section======-->
<section class="d-flex" id="wrapper">


    <div class="page-content-wrapper">

        <?php include 'test/Editdec.php'; ?>

    </div>

</section>

<!--====== End Main Wrapper Section======-->

<?php include 'app/inc/footer.php'; ?>