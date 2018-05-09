<div class="page-header">
    <h2><?= t('Push a task') ?></h2>
</div>

<div class="confirm">
    <p class="alert alert-info">
        <?= t('Do you really want to push the due date of task "%s" %s days out?', $task['title'], $_REQUEST['push_days']) ?>
    </p>

    <?= $this->modal->confirmButtons(
        'CardPushDateController',
        'push',
        array('plugin' => 'CardPushDate',
              'task_id' => $task['id'],
              'project_id' => $task['project_id'],
              'push_days' => $_REQUEST['push_days'],
              'confirmation' => 'yes')
    ) ?>
</div>
