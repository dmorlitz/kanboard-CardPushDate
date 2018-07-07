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
        <?= $this->form->checkbox('CardPushDate_interval_1_randomize', t('Randomize between 0 and interval 1'), 1, isset($values['CardPushDate_interval_1_randomize']) && $values['CardPushDate_interval_1_randomize'] == 1 ? true : false) ?><br/>

        <?= $this->form->label(t('Push interval 2 (0 or blank disables this icon)'), 'Card_PushDate_push_2') ?>
        <?= $this->form->text('CardPushDate_interval_2', $values, $errors, array('required', 'autofocus', 'tabindex="2"')) ?>
        <?= $this->form->checkbox('CardPushDate_interval_2_randomize', t('Randomize between interval 1 and interval 2'), 1, isset($values['CardPushDate_interval_2_randomize']) && $values['CardPushDate_interval_2_randomize'] == 1 ? true : false) ?><br/>

        <?= $this->form->label(t('Push interval 3 (0 or blank disables this icon)'), 'CardPushDate_push_3') ?>
        <?= $this->form->text('CardPushDate_interval_3', $values, $errors, array('required', 'autofocus', 'tabindex="3"')) ?>
        <?= $this->form->checkbox('CardPushDate_interval_3_randomize', t('Randomize between interval 2 and interval 3'), 1, isset($values['CardPushDate_interval_3_randomize']) && $values['CardPushDate_interval_3_randomize'] == 1 ? true : false) ?><br/>

        <?= $this->form->checkbox('CardPushDate_show_comment', t('Show last comment on card'), 1, isset($values['CardPushDate_show_comment']) && $values['CardPushDate_show_comment'] == 1 ? true : false) ?>

        <?= $this->form->checkbox('CardPushDate_show_add_comment', t('Show add comment icon'), 1, isset($values['CardPushDate_show_add_comment']) && $values['CardPushDate_show_add_comment'] == 1 ? true : false) ?>

        <?= $this->form->checkbox('CardPushDate_show_edit', t('Show edit task icon'), 1, isset($values['CardPushDate_show_edit']) && $values['CardPushDate_show_edit'] == 1 ? true : false) ?>

        <?= $this->form->checkbox('CardPushDate_show_close', t('Show close task icon'), 1, isset($values['CardPushDate_show_close']) && $values['CardPushDate_show_close'] == 1 ? true : false) ?>

<br><b>NOTE:</b> Randomized dates will be between the specified interval and the previous interval.  Interval 3 must be the greatest and interval 1 the smallest.

    </fieldset>
    
    <?= $this->modal->submitButtons(array('tabindex' => 4)) ?>

</form>
