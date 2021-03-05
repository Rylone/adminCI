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
                                        <h4 class="card-title">Editer un artiste </h4>
                                        <form action='<?php echo base_url('admin/roles/edit/'.$oneRole['id_acteur'].'/'.$oneRole['id_film']) ?>' method="POST">
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
                                        <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="prenom" type="hidden" value="" class="validate">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">account_circle</i>
                                                    <input id="name" type="text" name="nomRole"  class="validate">
                                                    <label for="name"></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">account_circle</i>
                                                    <input id="acteur" type="text" name="nameArtiste" class="validate" >
                                                    <label for="acteur">Nom de l'Artiste</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">date_range</i>
                                                    <input id="film" type="number" name='nameFilm' class="validate" >
                                                    <label for="film">Date de Naissance de l'Artiste</label>
                                                </div>
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