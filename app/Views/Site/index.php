

    <!-- BEGIN: SideNav-->
    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light navbar-full sidenav-active-rounded">
       
       
        <div class="navigation-background "></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
        <div class="content-wrapper-before gradient-45deg-deep-orange-orange gradient-shadow white-text"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Cards Extended</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Cards</a>
                  </li>
                  <li class="breadcrumb-item active">Cards Extended
                  </li>
                </ol>
              </div>
              <div class="col s2 m6 l6"><a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!" data-target="dropdown1"><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl">Settings</span><i class="material-icons right">arrow_drop_down</i></a>
                <ul class="dropdown-content" id="dropdown1" tabindex="0">
                    <?php foreach($allGenres as $genre)
                    { ?>
                       <li tabindex="0"><a class="grey-text text-darken-2" href="user-profile-page.html"><?php echo $genre['code'];?></a></li>
              <?php }?>
                </ul>
              </div>
            </div>
          </div>
        </div>
                    <!--Gradient Card-->
                   
              

                        <!-- Card With Analytics -->
                     

                        <!--Gradient Chart Card-->

                  

                        <!--Blog Card-->
                        

                        <!--Social Card-->
                        <div class="input-field col s12">

                        <!--Flat Card With Redio & chips-->
                        <div id="card-with-radio-chips" class="section">
                            <h4 class="header">Les films a vous proposer </h4>
                            <div class="row">
                            <?php foreach($tabFilms as $film) {
                                $artiste = $artisteModel->where("id", $film['id_realisateur'])->first();
                            ?>
                               <div class="col s12 m6 l4 ">
                                   <div class="card box-card-height  gradient-45deg-light-blue-cyan" ">
                                       <div class="card-content white-text center-align pr-0">
                                           <img class="responsive-img" src="<?php echo base_url('app-assets/images/moviedefault.png') ?>" width="170" height="170" alt="images" />
                                       </div>
                                       <div class="card-action pt-0">
                                           <p class="white-text"><?php echo $film['titre'];?></p>
                                           <div class="chip"><?php echo $film['code_pays'];?> <i class="close material-icons">close</i></div>
                                           <div class="chip"><?php echo $film['genre'];?> <i class="close material-icons">close</i></div>
                                           <div class="chip"><?php echo $film['annee'];?> <i class="close material-icons">close</i></div>
                                           <div class="chip"><a href="<?php echo base_url("home/index/realisateur/".$film["id_realisateur"])?>"><?php if(isset($artiste['nom']) && !empty($artiste['nom']) && isset($artiste['prenom']) && !empty($artiste['prenom'])){ echo $artiste['nom']." ".$artiste['prenom'];}?> <i class="close material-icons">face</i></div>
                                       </div>
                                       <div class="card-action pt-0">
                                           <p class="white-text"><?php if(isset($film['resume']) && !empty($film['resume'])) {echo substr($film['resume'], 0, 40)." ...";} else { echo "Ce film ne contient pas de résumé ...";}?></p>
                                           <div class="switch">
                                               <label> Off <input type="checkbox" /> <span class="lever"></span> On </label>
                                           </div>
                                       </div>
                                    </div>
                                 </div>
                                    <?php } ?>
                                </div>
                                <?php echo $pager->links() ?>
                                </div>
                            </div>
                        

                        <div class="divider mt-2"></div>

                        <!--E-commerce Card-->
                        
                        <!--Food Card-->
                       
                        </div>
                   
                  
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->

    <!-- BEGIN: Footer-->
