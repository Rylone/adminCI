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
                        <div class="invoice-create-btn">
                            <a href="<?php echo base_url('admin/roles/edit')?>" class="btn waves-effect waves-light invoice-create border-round z-depth-4">
                                <i class="material-icons">add</i>
                                <span class="hide-on-small-only">Create User</span>
                            </a>
                        </div>
                 
                        <div class="responsive-table">
                   

                            <table class="table invoice-data-table white border-radius-4 pt-1">
                                <thead>
                                    <tr>
                                        <!-- data table responsive icons -->
                                        <th></th>
                                        <!-- data table checkbox -->
                                        <th></th>
                                        <th>Nom du role</th>
                                        <th>Nom de l'auteur</th>
                                        <th>Nom du film</th>
                                        <th>Actions</th>
                    
                                    </tr>
                                </thead>

                                <tbody>
                             
                                    <?php 
                                    if(isset($tabRoles) && !empty($tabRoles))
                                    {
                                        foreach($tabRoles as $role)
                                        { 
                                            /**** * On selectionne l'artiste associé a cet identifiant *** */
                                           $artiste = $artisteModel->where("id", $role['id_acteur'])->first();
                                            /**** * On selectionne le film associé a cet identifiant *** */
                                           $film = $filmModel->where("id", $role['id_film'])->first();
                                    ?>       
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><span class="invoice-amount"><?php echo $role['nom_role']; ?></span></td>
                                        <td><span class="invoice-customer"><?php echo $artiste['prenom']." ".$artiste['nom']; ?></span></td>
                                        <td><span class="invoice-customer"><?php echo $film["titre"]; ?></span></td>
                                        <td>
                                            <div class="invoice-action">
                                                <a href="<?php echo base_url('admin/roles/edit/'.$role['id_acteur'].'/'.$role['id_film'])?>" class="invoice-action-view mr-4">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <?php if(isset($_GET['page']) && !empty($_GET['page'])) { ?>
                                                    <a href="<?php echo base_url('admin/roles/delete/'.$role['id_acteur'].'/'.$role['id_film']."/".$_GET['page'])?>" class="invoice-action-edit">
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url('admin/roles/delete/'.$role['id_acteur'].'/'.$role['id_film'])?>" class="invoice-action-edit">
                                                <?php } ?>
                                                    <i class="material-icons">delete_forever</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php 
                                        }
                                }
                                 ?>
                                   
                                </tbody>

                            </table>
                        </div>
                        
                        <?php echo $pager->links() ?>
                
                    </section>
                    
                </div>
            </div>
        </div>
    </div>
</div>               