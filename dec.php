<?php include 'app/inc/header.php'; ?>



<?php

$function = Session::get("function");
$city = Session::get("city");
$userName =Session::get(key: "userName");
$currentUserId = Session::get("userid"); // Adjust this if your session key is different
$isAdmin = $usr->isAdmin($currentUserId);

// Delete Event By Id 
if (isset($_GET['delid']) && isset($_GET['action']) && $_GET['action'] == 'delete') {
    $delid = preg_replace('/[^a-zA-Z0-9-]/', '', $_GET['delid']);
    $deleteEvent = $usr->deleteEventById($delid);
}

// Delete Event By Id 
if (isset($_GET['delid']) && isset($_GET['action']) && $_GET['action'] == 'delete') {
    $delid = preg_replace('/[^a-zA-Z0-9-]/', '', $_GET['delid']);
    $deleteEvent = $usr->deleteEventById($delid);
}
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




<!--====== Start Main Wrapper Section======-->
<section class="d-flex" id="wrapper">

    <?php include 'app/inc/sidebar.php'; ?>

    <div class="page-content-wrapper">
        <!--  Header BreadCrumb -->
        <div class="content-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="dashboard.php"><i class="material-icons">home</i>Home</a></li> -->

                    <li class="breadcrumb-item active" aria-current="page">Declaration</li>
                </ol>
            </nav>
            <div class="create-item">

            <a href="dec_add.php" class="theme-primary-btn btn btn-primary"><i class="material-icons">add</i>Ajoute
                        un declaration</a>
                <?php if (isset($create) == '$create') { ?>

                <?php } ?>



            </div>
        </div>

        <!--  main-content -->
        <div class="main-content">



            <!-- Users DataTable-->
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card bg-white">
                        <div class="card-body mt-3">
                            <div class="table-responsive">
                                <table id="usersTable" class="table table-striped table-borderless" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Declaration Id</th>
                                            <th>Nom de déclarant</th>

                                            <th>Service concerné</th>
                                            <th>Decalrant function</th>

                                            <th>Date de declaration</th>

                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php ?>
                                        <?php
                                      $userlist = $usr->selectAllDeclaration($currentUserId);

                                        if ($userlist && $userlist->num_rows > 0) {
                                            $i = 0;
                                            while ($userResult = $userlist->fetch_assoc()) {
                                                $i++;
                                                ?>

                                                <tr>
                                                    <td class="pt-4"><?php echo $userResult['event_id']; ?></td>
                                                    <td class="pt-4"><?php echo $userName ?></td>
                                                    <td class="pt-4">
                                                        <?php echo $function ?>
                                                    </td>
                                                    <td class="pt-4"><?php echo $function; ?><?php echo $city; ?></td>
                                                    <td class="pt-4"><?php echo $userResult['event_date']; ?></td>
                                                    <td>
                                                        <a href="generate_event_pdf.php?event_id=<?php echo $userResult['event_id']; ?>"
                                                            target="_blank" class="btn btn-primary">Generate PDF</a>
                                                            <a href="EditHomeDec.php?event_id=<?php echo $userResult['event_id']; ?>"
                                                            target="_blank" class="btn btn-primary">Modifier</a>
                                                    <td class="text-center">
                                                        <a href="?delid=<?php echo $userResult['event_id']; ?>&action=delete"
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="6" class="text-center">No declarations found for this user.
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                </table>

                                <div id="eventDetails" style="display:none;"></div>

                                <script>
                                    function showEventDetails(eventId) {
                                        const xhr = new XMLHttpRequest();
                                        xhr.open("GET", "fetch_event_details.php?event_id=" + eventId, true);
                                        xhr.onload = function () {
                                            if (this.status === 200) {
                                                document.getElementById('eventDetails').innerHTML = this.responseText;
                                                document.getElementById('eventDetails').style.display = 'block';
                                            }
                                        };
                                        xhr.send();
                                    }

                                </script>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Users DataTable-->


x²

            <div class="row mt-3">

                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-body footer-p">
                            <p>Design and developed by Abdelhak MOUSSII send a thanks giving mail or do you want any
                                support :)
                                <a href="mailto:nababurdev@gmail.com">nababurdev@gmail.com</a>
                            </p>
                       
                        </div>
                    </div>
                </div>


            </div>



        </div>
        <!--  main-content -->
    </div>

</section>

<!--====== End Main Wrapper Section======-->

<?php include 'app/inc/footer.php'; ?>