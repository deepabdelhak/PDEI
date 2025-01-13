<?php include 'app/inc/header.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
   $inserUser = $usr->createNewUserData($_POST, $_FILES);

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
               <li class="breadcrumb-item"><a href="dashboard.php"><i class="material-icons">home</i>Acceuil</a></li>
               <li class="breadcrumb-item"><a href="users.php">Utilisateurs</a></li>
               <li class="breadcrumb-item active" aria-current="page">Ajouter un nouvel utilisateur</li>
            </ol>
         </nav>
         <div class="create-item">

            <a href="adduser.php" class="theme-primary-btn btn btn-primary"><i class="material-icons">add</i>Create
               user</a>



         </div>
      </div>
      <!--  Header BreadCrumb -->
      <?php

      if (isset($inserUser)) {
         echo $inserUser;

      }

      ?>
      <!-- Create New User -->
      <div class="main-content">

         <div class="card bg-white">
            <div class="card-body mt-5 mb-5">

               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                  <div class="form-group row">
                     <div class="col-md-2">Nom et Prénom </div>
                     <div class="col-md-8">
                        <input id="name" type="text" placeholder="Veuillez entrer votre nom" class="form-control"
                           name="name" value="" autofocus="">

                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-2">Numéro de télephone</div>
                     <div class="col-md-4">
                        <input id="phone" type="text" placeholder="Veuillez entrer votre numéro de téléphone" class="form-control"
                           name="phone" value="" autofocus="">

                     </div>
                  </div>

                  <!-- <div class="form-group row">
                     <div class="col-md-2">Address</div>
                     <div class="col-md-8">
                         <input id="address" type="text" placeholder="Please enter your Address" class="form-control"
                           name="address" value="" autofocus="">

                     </div>
                  </div> -->
                  <!-- <div class="form-group row">
                     <div class="col-md-2">About yourself</div>
                     <div class="col-md-8">
                        <textarea name="information" placeholder="About yourself" id="information" class="form-control"
                           cols="4" rows="4"></textarea>

                     </div>
                  </div> -->
                  <div class="form-group row">
                     <div class="col-md-2">Adresse Email </div>
                     <div class="col-md-4">
                        <input id="email" type="email" placeholder="Veuillez entrer votre email" class="form-control"
                           name="email" value="" autofocus="">

                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-2">Service</div>
                     <div class="col-md-4">
                        <!-- <input id="city" type="text" placeholder="Please enter your City" class="form-control"
                           name="city" value="" autofocus=""> -->

                           <select class="form-control" id="city" name="city">
                           <option>Sélectionnez votre fonction</option>
                           <option value="Chef de service">Chef de service</option>
                           <option value="Major">Major</option>
                           <option value="Technicien">Technicien</option>
                           <option value="Surveillant">Surveillant</option>
                         
                        </select>

                     </div>
                  </div>

                  <div class="form-group row">
                     <div class="col-md-2">Function</div>
                     <div class="col-md-4">
                        <select class="form-control" id="country" name="country">

                           
  
                        <option>Sélectionner un service</option>
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
                           
                           <!-- <option value="Médecine générale">Médecine générale</option>
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
                           <option value="Service de transfusion sanguine">Service de transfusion sanguine</option> -->
                        </select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-2">Mot de passe</div>
                     <div class="col-md-8">
                        <input id="password" type="password" placeholder="Entrez votre mot de passe" class="form-control"
                           name="password" value="" autofocus="">

                     </div>
                  </div>

                  <div class="form-group row">
                     <div class="col-md-2">Confirmez le Mot de passe</div>
                     <div class="col-md-8">
                        <input id="confirm_password" type="text" placeholder="Veuillez confirmer votre mot de passe"
                           class="form-control" name="confirm_password" value="" autofocus="">

                     </div>
                  </div>
                  <?php if (isset($access) == '$access') { ?>
                     <div class="form-group row">
                        <div class="col-md-2">Rôle</div>
                        <div class="col-md-4">
                           <select class="form-control" id="rolename" name="rolename">
                              <option>Sélectionner le rôle de l'utilisateur</option>
                              <?php

                              $rolelist = $rol->selectAllRole();
                              if ($rolelist) {

                                 while ($result = $rolelist->fetch_assoc()) {



                                    ?>

                                    <option value="<?php echo $result['rolename']; ?>"><?php echo $result['rolename']; ?>
                                    </option>
                                 <?php }
                              } else { ?>

                                 <option>No user Role created</option>
                              <?php } ?>

                           </select>
                        </div>
                     </div>
                  <?php } else { ?>

                     <input type="hidden" value="Only user" name="rolename">


                  <?php } ?>
                  <div class="form-group row">
                     <div class="col-md-2">Statu</div>
                     <div class="col-md-4">
                        <select class="form-control" id="status" name="status">
                           <option>Sélectionner le statut de l'utilisateur</option>
                           <option value="0">Active</option>
                           <option value="1">Deactive</option>

                        </select>
                     </div>
                  </div>


                  <div class="form-group row">
                     <div class="col-md-2">Gendar</div>
                     <div class="col-md-4">
                        <select class="form-control" id="gendar" name="gendar">
                           <option>Select your gendar</option>
                           <option value="male">Mâle</option>
                           <option value="female">Femelle</option>

                        </select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-2">Date de création du compte</div>
                     <div class="col-md-4">

                        <div class="input-group date" id="id_0">
                           <input type="text" name="create_date" value="" class="form-control" />
                           <div class="input-group-addon input-group-append">
                              <div class="input-group-text">
                                 <i class="icofont-ui-calendar"></i>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-2 pt-5">Télécharger la photo de profil</div>
                     <div class="col-md-4">
                        <div class="add-photo">
                           <div id='img_contain'>
                              <img id="preview-thumb" align='middle' src="app/uploads/userAvatar/dev.jpg"
                                 alt="your image" title='' />
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
                        <button class="theme-primary-btn btn btn-success" type="submit" name="submit">Créer un utilisateur</button>
                        <button class="btn btn-warning text-white" type="reset">Réinitialiser</button>
                     </div>
                  </div>

               </form>

            </div>
         </div>
      </div>
      <!-- Create New User-->


      <div class="row mt-3">

         <div class="col-md-12">
            <div class="card ">
               <div class="card-body footer-p">
                  <p>développé par Abdelhak MOUSSI envoyez un mail si vous souhaitez du support :)
                     <a href="mailto:abdelhakmoussi61@gmail.com">abdelhakmoussi61@gmail.com</a>
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