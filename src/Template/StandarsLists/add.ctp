<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Standars Lists'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="standarsLists form large-9 medium-8 columns content">
    <?= $this->Form->create($standarsList) ?>
    <fieldset>
        <legend><?= __('Add Standars List') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('presentation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
    var 
    $('#add').on('click', function(){

    });
</script>