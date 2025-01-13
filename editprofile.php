<?php include 'app/inc/header.php'; ?>


<!--====== Start Main Wrapper Section======-->
<section class="d-flex" id="wrapper">

   <?php include 'app/inc/sidebar.php'; ?>

   <?php 


    $edituser = isset($_GET['edituser']) ? $_GET['edituser'] : '';
  if (!isset($edituser) && isset($edituser) === NULL) {
     // header("Location:users.php");
      echo "<script>location.href='users.php';</script>";
      
  }else{
     $edituser = preg_replace('/[^a-zA-Z0-9-]/', '', $edituser);
      $useredit = $usr->editUserById($edituser);
  }

  

 ?>





   <?php 

    if ($useredit) {
        while ($result = $useredit->fetch_assoc()) {
    

 ?>
   <div class="page-content-wrapper">
      <!--  Header BreadCrumb -->
      <div class="content-header">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="dec_add.php"><i class="material-icons">home</i>Acceuil</a></li>
               <li class="breadcrumb-item"><a href="users.php">Utilisateurs</a></li>
               <li class="breadcrumb-item active" aria-current="page"><?php echo $result['name']; ?></li>
            </ol>
         </nav>
         <div class="create-item">

            <!-- <a href="users.php" class="btn btn-secondary"><i class="material-icons md-18">arrow_back</i>Back To
               Userlist</a> -->
         </div>
      </div>
      <!--  Header BreadCrumb -->
      <?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $updateUser = $usr->updateUserById($_POST, $_FILES, $edituser);


}


 ?>
      <?php 

            if (isset($updateUser)) {
              echo $updateUser;
            }

           ?>
      <!-- Create New User -->
      <div class="main-content">

         <div class="card editprofile bg-white">
            <div class="card-body mt-5 mb-5">

               <form action="" method="POST" enctype="multipart/form-data">

                  <div class="form-group row">
                     <div class="col-md-2">Name</div>
                     <div class="col-md-8">
                        <input id="name" type="text" value="<?php echo $result['name']; ?>" class="form-control"
                           name="name" value="" autofocus="">

                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-2">Phone number</div>
                     <div class="col-md-4">
                        <input id="phone" type="text" value="<?php echo $result['phone']; ?>" class="form-control"
                           name="phone" value="" autofocus="">

                     </div>
                  </div>

               
                  <div class="form-group row">
                     <div class="col-md-2">E-Mail Address</div>
                     <div class="col-md-4">
                        <input id="email" type="email" readonly="readonly" value="<?php echo $result['email']; ?>"
                           class="form-control" name="email" value="" autofocus="">

                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-2">Service</div>
                     <div class="col-md-4">
                        <!-- <input id="city" type="text" value="<?php //echo $result['city']; ?>" class="form-control"
                           name="city" value="" autofocus=""> -->
                           <select class="form-control" id="city" name="city">
                           <option <?php if ($result['userid'] == $result['userid']) { ?> selected="selected" <?php }?>
                              value="<?php echo $result['city']; ?>"><?php echo $result['city']; ?></option>
                        <option>Sélectionnez votre fonction</option>
                           <option value="Chef de service">Chef de service</option>
                           <option value="Major">Major</option>
                           <option value="Technicien">Technicien</option>
                           <option value="Surveillant">Surveillant</option>
                           </select>

                     </div>
                  </div>

                  <div class="form-group row">
                     <div class="col-md-2">Country</div>
                     <div class="col-md-4">
                        <select class="form-control" id="country" name="country">


                           <option <?php if ($result['userid'] == $result['userid']) { ?> selected="selected" <?php }?>
                              value="<?php echo $result['country']; ?>"><?php echo $result['country']; ?></option>
                              <option value="Médecine générale">Médecine générale</option>
                           <option value="Chirurgie">Chirurgie</option>
                           <option value="Pédiatrie">Pédiatrie</option>
                           <option value="Gynécologie">Gynécologie</option>
                           <option value="Psychiatrie">Psychiatrie</option>
                           <option value="Urgences">Urgences</option>
                           <option value="Radiologie">Radiologie</option>
                           <option value="Anesthésie">Anesthésie</option>
                           <option value="Cardiologie">Cardiologie</option>
                           <option value="Oncologie">Oncologie</option>
                           <option value="Néphrologie">Néphrologie</option>
                           <option value="Dermatologie">Dermatologie</option>
                           <option value="Orthopédie">Orthopédie</option>
                           <option value="Oto-rhino-laryngologie (ORL)">Oto-rhino-laryngologie (ORL)</option>
                           <option value="Réhabilitation">Réhabilitation</option>
                           <option value="Pharmacologie">Pharmacologie</option>
                           <option value="Médecine interne">Médecine interne</option>
                           <option value="Soin intensif">Soin intensif</option>
                           <option value="Médecine d'urgence">Médecine d'urgence</option>
                           <option value="Service de transfusion sanguine">Service de transfusion sanguine</option> 
                        </select>
                     </div>
                  </div>
                  <?php if ( isset($access) == '$access' ) { ?>
                  <div class="form-group row">
                     <div class="col-md-2">Role</div>
                     <div class="col-md-4">


                        <select class="form-control" id="rolename" name="rolename">
                           <option>Select user Role</option>
                           <?php 

                                    $rolelist = $rol->selectAllRole();
                                    if ($rolelist) {
                                        
                                        while ($roleitem = $rolelist->fetch_assoc()) {
                                            
                                          

                                 ?>



                           <option <?php if ($result['rolename'] == $roleitem['rolename']) { ?> selected="selected"
                              <?php }?> value="<?php echo $roleitem['rolename']; ?>">

                              <?php if (isset($roleitem['rolename'])) {
                                      echo $roleitem['rolename'];
                                    } ?>

                           </option>

                           <?php }}else{  ?>

                           <option>No user Role created Yet !</option>
                           <?php } ?>

                        </select>
                     </div>
                  </div>
                  <?php }else{ ?>
                  <div class="form-group row">
                     <div class="col-md-2">Role</div>
                     <div class="col-md-4">


                        <select class="form-control" id="rolename" name="rolename">


                           <option value="<?php echo $result['rolename']; ?>"><?php echo $result['rolename']; ?>
                           </option>

                        </select>
                     </div>
                  </div>

                  <?php } ?>
                  <div class="form-group row">
                     <div class="col-md-2">Status</div>
                     <div class="col-md-4">
                        <select class="form-control" id="status" name="status">

                           <?php if ( Session::get("userid") == $result['userid']) { ?>
                           <?php if ($result['status'] == '0') {?>
                           <option value="0" selected="selected">Active</option>

                           <?php }elseif($result['status'] == '1'){  ?>
                           <option value="1" selected="selected">Deactive</option>

                           <?php } ?>
                           <?php }else{ ?>
                           <?php if ( isset($edit) == '$edit') { ?>
                           <?php if ($result['status'] == '0') {?>
                           <option value="0" selected="selected">Active</option>
                           <option value="1">Deactive</option>
                           <?php }elseif($result['status'] == '1'){  ?>
                           <option value="1" selected="selected">Deactive</option>
                           <option value="0">Active</option>
                           <?php } ?>
                           <?php } else{?>

                           <?php if ($result['status'] == '0') {?>
                           <option value="0" selected="selected">Active</option>
                           <?php }elseif($result['status'] == '1'){  ?>
                           <option value="1" selected="selected">Deactive</option>
                           <?php } ?>
                           <?php } ?>
                           <?php } ?>





                        </select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-2">Gendar</div>
                     <div class="col-md-4">
                        <select class="form-control" id="gendar" name="gendar">
                           <?php if ($result['gendar'] == 'male') {?>
                           <option value="male" selected="selected">Male</option>
                           <option value="female">Female</option>
                           <?php }elseif($result['gendar'] == 'female'){  ?>
                           <option value="female" selected="selected">Female</option>
                           <option value="male">Male</option>
                           <?php }else{ ?>
                           <option>Select your gendar</option>
                           <option value="male">Male</option>
                           <option value="female">Female</option>

                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-2">Account update Date</div>
                     <div class="col-md-4">

                        <div class="input-group date" id="id_0">
                           <input type="text" name="create_date" value="<?php echo $result['create_date']; ?>"
                              class="form-control" required />
                           <div class="input-group-addon input-group-append">
                              <div class="input-group-text">
                                 <i class="icofont-ui-calendar"></i>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-2 pt-5">Upload profile photo</div>
                     <div class="col-md-4">
                        <div class="add-photo">
                           <div id='img_contain'>
                              <?php 

                                           $photo_u =  $result['profilePhoto'];
                                          
                                           if(is_file($photo_u)){ ?>
                              <img id="preview-thumb" align='middle' src="<?php echo $photo_u; ?>" alt="your image"
                                 title='' />
                              <?php }else{?>
                              <img id="preview-thumb" align='middle' src="app/uploads/userAvatar/dev.jpg"
                                 alt="your image" title='' />
                              <?php } ?>

                           </div>
                           <div class="fileUploadInput">
                              <input type="file" name="profilePhoto" id="file-input-profile" />
                              <button class="input-file-btn"><i class="material-icons"> cloud_upload </i></button>
                           </div>
                        </div>

                     </div>
                  </div>
                  <div class="form-group pt-2 row">
                     <div class="col-md-2"></div>
                     <div class="col-md-4">
                        <button class="theme-primary-btn btn btn-success" type="submit" name="update">Update
                           User</button>
                     </div>
                  </div>

               </form>

            </div>
         </div>
      </div>
      <!-- Create New User-->

      <?php
        }}else{
          echo "<script>window.location='users.php';</script>";
        }
      ?>


      <div class="row mt-3">

         <div class="col-md-12">
            <div class="card ">
               <div class="card-body footer-p">
                  <p>Design and developed by Abdelhak MOUSSII send a thanks giving mail or do you want any support :)
                     <a href="mailto:nababurdev@gmail.com">nababurdev@gmail.com</a>
                  </p>
                  <p>Do you want to develop any php or laravel or wordpress project ? send a mail:) <a
                        href="mailto:nababurdev@gmail.com">nababurdev@gmail.com</a> </p>
                  <p>CEO of GridTemaplate: <a target="_blank"
                        href="https://www.gridtemplate.com/">https://www.gridtemplate.com/</a>
                  </p>
                  <p>Connect with Github: <a target="_blank"
                        href="https://github.com/nababur">https://github.com/nababur</a>
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