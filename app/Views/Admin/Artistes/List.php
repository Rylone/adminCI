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
                            <a href="<?php echo base_url('admin/artistes/edit')?>" class="btn waves-effect waves-light invoice-create border-round z-depth-4">
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
                                        <th>
                                            <span>ID</span>
                                        </th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Naissance</th>
                                        <th>Nombre de films</th>
                                        <th>Actions</th>
                    
                                    </tr>
                                </thead>

                                <tbody>
                             
                                    <?php 
                                    if(isset($tabArtistes) && !empty($tabArtistes))
                                    {
                                        foreach($tabArtistes as $artiste)
                                        { 
                                    ?>       
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="app-invoice-view.html"><?php echo $artiste['id']; ?></a>
                                        </td>
                                        <td><span class="invoice-amount"><?php echo $artiste['nom']; ?></span></td>
                                        <td><span class="invoice-customer"><?php echo $artiste['prenom']; ?></span></td>
                                        <td><span class="invoice-customer"><?php echo $artiste['annee_naissance']; ?></span></td>
                                        <td><span class="invoice-customer">8</span></td>
                                        <td>
                                            <div class="invoice-action">
                                                <a href="<?php echo base_url('admin/artistes/edit/'.$artiste['id'])?>" class="invoice-action-view mr-4">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="<?php echo base_url('admin/artistes/delete/'.$artiste['id'])?>" class="invoice-action-edit">
                                                    <i class="material-icons">delete_forever</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php 
                                        }
                                    } ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>               