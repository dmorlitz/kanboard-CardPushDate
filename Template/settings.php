<?php if ($this->app->isAjax()): ?>
    <div class="page-header">
        <h2><?= $this->text->e($project['name']) ?> &gt; <?= t('Edit project card push settings') ?></h2>
    </div>
<?php else: ?>
    <div class="page-header">
        <h2><?= t('Edit project card push settings') ?></h2>
    </div>
<?php endif ?>


<form method="post" action="<?= $this->url->href('CardPushSettingsController', 'save', array('plugin' => 'CardPushDate', 'project_id' => $project['id'], 'redirect' => 'show')) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('id', $values) ?>

    <fieldset>
        <legend><?= t('Card due date push settings') ?></legend>

        <!--DEBUG
	<?=  print_r($destination, TRUE) ?>
	</br>
	<?= var_dump($values) ?>
	</br>
        DEBUG -->

        <?= $this->form->label(t('Push interval 1 (0 or blank disables this icon)'), 'CardPushDate_push_1') ?>
        <?= $this->form->text('CardPushDate_interval_1', $values, $errors, array('required', 'autofocus', 'tabindex="1"')) ?>

        <?= $this->form->label(t('Push interval 2 (0 or blank disables this icon)'), 'Card_PushDate_push_2') ?>
        <?= $this->form->text('CardPushDate_interval_2', $values, $errors, array('required', 'autofocus', 'tabindex="2"')) ?>

        <?= $this->form->label(t('Push interval 3 (0 or blank disables this icon)'), 'CardPushDate_push_3') ?>
        <?= $this->form->text('CardPushDate_interval_3', $values, $errors, array('required', 'autofocus', 'tabindex="3"')) ?>

    </fieldset>
    
    <?= $this->modal->submitButtons(array('tabindex' => 4)) ?>

</form>
