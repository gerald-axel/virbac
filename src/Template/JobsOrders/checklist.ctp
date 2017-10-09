<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Progreso'); ?>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">                
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Orden de Trabajo'); ?></h3>
                    </div>
                    <form id="formSteps" action="<?php echo $this->request->webroot . "steps/edit/$id";?>" method="POST" >                        
                        <div class="box-body">
                            <fieldset>
                                <div class="form-group">
                                    <label for="Sku" class="required">SKU</label>
                                    <input type="number" id="Sku" name="sku" class="form-control input-sm" value="<?php echo $jobsOrder[0]['sku'];?>" disabled >
                                </div>
                                <div class="form-group">
                                    <label for="Description" class="required">Descripción</label>
                                    <input type="text" id="Description" maxlength="128" name="description" class="form-control input-sm" value="<?php echo $jobsOrder[0]['description'];?>" disabled >
                                </div>
                                <div class="form-group">
                                    <label for="Presentation" class="required">Presentación</label>
                                    <input type="text" id="Presentation" maxlength="128" name="presentation" class="form-control input-sm" value="<?php echo $jobsOrder[0]['presentation'];?>" disabled >
                                </div>
                                <div class="form-group">
                                    <label for="JobNumber">Número de orden</label>
                                    <input type="number" id="JobNumber" maxlength="128" name="job_number" class="form-control input-sm" value="<?php echo $jobsOrder[0]['job_number'];?>" disabled >
                                </div>                                
                                <div class="form-group">
                                    <label for="Pieces">Cantidad</label>
                                    <input type="number" id="Pieces" maxlength="128" name="pieces" class="form-control input-sm" value="<?php echo $jobsOrder[0]['pieces'];?>" disabled >
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-3">
                                        <label>Pasos</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Completado</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Reasignado</label>
                                    </div>                                
                                    <div class="col-md-3">
                                        <label>Comentario</label>
                                    </div>
                                </div>
                                <br/>
                                <?php foreach($jobsOrder as $steps): ?>
                                    <div class="row text-center" style="margin-bottom: 15px">
                                        <div class="col-md-3" style="margin-top:-5px">
                                            <div class="col-md-offset-<?php echo $steps['step_id'] == $steps['substep_id'] ? '0' : '4'; ?> col-md-8">
                                                <label><?php echo $steps['name']; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <div class="pretty circle primary">
                                                <input class="steps" type="radio" name="<?php echo $steps['id']; ?>[status]" value="completed" <?php echo $steps['status'] == 'completed' ? 'checked': '';?> <?php echo $steps['status'] != 'missing' ? 'disabled': '';?> >
                                                <label><i class="fa fa-check"></i></label>
                                            </div>                                    
                                        </div>                                
                                        <div class="col-md-3">
                                            <div class="pretty circle warning">
                                                <input class="steps" type="radio" name="<?php echo $steps['id']; ?>[status]" value="reassigned" <?php echo $steps['status'] == 'reassigned' ? 'checked': '';?> <?php echo $steps['status'] != 'missing' ? 'disabled': '';?> >
                                                <label><i class="fa fa-check"></i></label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <textarea class="form-control" rows="2" id="comment" name="<?php echo $steps['id']; ?>[comment]"  value="<?php echo $steps['comment'];?>" disabled><?php echo $steps['comment'];?></textarea>
                                        </div>
                                        <input type="hidden" name="<?php echo $steps['id']; ?>[id]" value="<?php echo $steps['id']; ?>" <?php echo $steps['status'] != 'missing' ? 'disabled': '';?> />                                        
                                        <input class="users" type="hidden" name="<?php echo $steps['id']; ?>[user_id]" <?php echo $steps['status'] != 'missing' ? 'disabled': '';?> />
                                    </div>
                                <?php endforeach; ?> 
                                <div class="box-footer">
                                    <div class="text-right">
                                        <input type="button" value="Aceptar" class="btn btn-info" data-toggle="modal" data-target="#usersModal">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</aside>
<div class="modal fade" id="usersModal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Persona que realizó los pasos</h4>
        </div>
        <div class="modal-body">
            <form id="modalInfo">
                <div class="form-group">
                    <label>Usuarios</label>
                    <select id="user" class="form-control input-sm" name="user">
                        <option value=""></option>                       
                        <?php foreach ($users as $user): ?>
                            <option value="<?php echo $user['id']; ?>"><?php echo $user['name'] . ' ' . $user['paternal_last_name'] . ' ' . $user['maternal_last_name']; ?></option>
                        <?php endforeach ?>                                
                    </select>
                </div>
            </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="save">Guardar</button>
        </div>
      </div>
    </div>
</div>
<?= $this->Html->css('pretty.min.css') ?>
<?= $this->Html->script('validation_checklist.js') ?>
<script type="text/javascript">
    $(".steps").on('change', function(event){
        var reference;

        if ($(this).val() == 'reassigned') {
            reference = $(this).parent().parent().next().children().eq(0);
            reference.attr('disabled', false);
        } else {
            reference = $(this).parent().parent().next().next().children().eq(0);
            reference.attr('disabled', true);
            reference.val('');
        }
    });

    $('#usersModal').on('shown.bs.modal', function (e) {
        $('#user').val('');
        $('#modalInfo').validate().resetForm();     
    });

    $('#save').on('click', function(){
        if ($('#modalInfo').valid()) {
            $('.users').val($('#user').val());
            $('#formSteps').submit();
        }
    });
</script>