<div id="main">
        <div class="row">
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container">
                    <!-- invoice list -->
                    <section class="invoice-list-wrapper section">
                        <!-- create invoice button-->
                        <!-- Options and filter dropdown button-->
                      
                        <!-- create invoice button-->
    
                        <div class="responsive-table">
                            <!-- Mon formulaire d'édition -->
                        
                            <div class="col-12 s12 m6 l6">
                                <div id="validation" class="card card card-default scrollspy">
                                    <div class="card-content">
                                        <h4 class="card-title">Editer un rôle </h4>
                                        <form action='<?php  echo base_url('admin/roles/edit/'.$oneRole['id_acteur'].'/'.$oneRole['id_film']) ?>' method="POST" enctype="multipart/form-data" >
                                        <!-- Je cache mon champs pour dire que je suis dans le mode modifier  -->
                                        <!-- Si save = update je sauvegarder les modifications -->
                                        <?php if(isset($oneRole['id_acteur']) && isset($oneRole['id_film']) && !empty($oneRole['id_acteur']) && !empty($oneRole['id_film'])) 
                                       { 
                                        ?>
                                        <input type="hidden" name='save' value='update' >
                    
                                       <?php 
                                       } else {
                                        ?>
                                         <!-- Si save = create je crée une nouvelle entree -->
                                        <input type="hidden" name='save' value='create' >
                                        <?php 
                                    } 
                                        ?>
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">assignment_ind</i>
                                                    <input id="name" type="text" name="nameRole" placeholder='<?php echo $oneRole['nom_role'];?>'value='<?php echo $oneRole['nom_role'];?>' class="validate">
                                                    <label for="name"> Quel role ?</label>
                                                </div>
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">account_circle</i>
                                                    <select name="nameArtiste">
                                                    <option value="" disabled selected>Choississez un acteur</option>
                                                    <?php foreach($selectActeurs as $acteur) 
                                                    { 
                                                       /* $selected = '';
                                                        if($acteur['id'] == $oneRole['id_acteur'])
                                                        {
                                                           $selected = 'selected';
                                                        } */

                                                        $selected =($acteur['id'] == $oneRole['id_acteur'])? 'selected': '';
                                                    ?>
                                                        <option value="<?php echo $acteur['id']; ?>"  <?php echo $selected; ?>><?php echo $acteur['nom']." ".$acteur['prenom']; ?></option>
                                              <?php }?>
                                                        </select>
                                                        <label>Quel acteur ? </label>
                                                        </div>
                                                  
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">local_movies</i>
                                                    <select name="nameFilm" >
                                                        <option value="" disabled selected>Choississez un film </option>
                                                        <?php foreach($selectFilms as $film) 
                                                         {
                                                            /* $selected = '';
                                                             if($film['id'] == $oneRole['id_film'])
                                                             {
                                                                $selected = 'selected';
                                                             } */
                                                             $selected =($film['id'] == $oneRole['id_film'])? 'selected': '';
                                                        ?>
                                                        <option value="<?php echo $film['id']; ?>" <?php echo $selected; ?>><?php echo $film['titre']; ?></option>
                                                   <?php }
                                                   ?>
                                                        </select>
                                                        <label>Quel film ?</label>
                                            </div>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Enregistrer
                                                            <i class="material-icons right">send</i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Mon formulaire d'édition -->
                            
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>               