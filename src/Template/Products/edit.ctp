<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Productos'); ?>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i> <?php echo __('Inicio'); ?></li>
            <li><i class="fa fa-users"></i><?php echo __('Productos'); ?></li>
            <li class="active"><?php echo __('Editar'); ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">                
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Editar producto'); ?></h3>
                    </div>                    
                    <?= $this->Form->create($product) ?>
                        <div class="box-body">
                            <fieldset>
                                <div class="form-group">
                                    <label for="Sku" class="required">SKU</label>
                                    <input type="text" value="<?php echo $product['sku']; ?>""  id="Sku" name="sku" class="form-control input-sm">
                                </div>
                                <div class="form-group">
                                    <label for="Description" class="required">Descripción</label>
                                    <input type="text" value="<?php echo $product['description']; ?>"" id="Description" maxlength="128" name="description" class="form-control input-sm" >
                                </div><div class="form-group">
                                    <label for="Presentation" class="required">Presentación</label>
                                    <input type="text" value="<?php echo $product['presentation']; ?>"" id="Presentation" maxlength="128" name="presentation" class="form-control input-sm">
                                </div>
                            </fieldset>
                        </div> 
                        <div class="box-footer">
                            <div class="text-right">
                                <input type="submit" value="Aceptar" class="btn btn-info">
                            </div>
                        </div>
                    <?= $this->Form->end() ?>                                       
                </div>
            </div>
        </div>
    </section>
</aside>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>      
<?= $this->Html->script('validation_products.js') ?>
