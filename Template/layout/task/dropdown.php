<?php
     // PUSH INTERVAL 1
?>
<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])) {
		$CardPushDate_interval_1 = $this->task->projectMetadataModel->get($task['project_id'] , 'CardPushDate_interval_1');
                if ($CardPushDate_interval_1 == "") {
                     $CardPushDate_interval_1 = 0;
                } else {
                     $CardPushDate_interval_1 = intval($CardPushDate_interval_1);
                }
      }
?>

<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
         <?php if ($CardPushDate_interval_1 > 0) : ?>
		<li>
		<?= $this->modal->confirm(
			'thermometer-0',
			'Push the task ' . $CardPushDate_interval_1 . ' days',
			'CardPushDateController',
			'push',
			array(
				'plugin' => 'CardPushDate',
				'task_id' => $task['id'],
				'project_id' => $task['project_id'],
                                'push_days' => $CardPushDate_interval_1,
			)
		) ?>
		</li>
         <?php endif ?>
<?php endif ?>

<?php
/************************************************************************************************************************/
/************************************************************************************************************************/
/************************************************************************************************************************/
?>
<?php
     // PUSH INTERVAL 2
?>
<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])) {
		$CardPushDate_interval_2 = $this->task->projectMetadataModel->get($task['project_id'] , 'CardPushDate_interval_2');
                if ($CardPushDate_interval_2 == "") {
                     $CardPushDate_interval_2 = 0;
                } else {
                     $CardPushDate_interval_2 = intval($CardPushDate_interval_2);
                }
      }
?>

<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
         <?php if ($CardPushDate_interval_2 > 0) : ?>
		<li>
		<?= $this->modal->confirm(
			'thermometer-2',
			'Push the task ' . $CardPushDate_interval_2 . ' days',
			'CardPushDateController',
			'push',
			array(
				'plugin' => 'CardPushDate',
				'task_id' => $task['id'],
				'project_id' => $task['project_id'],
                                'push_days' => $CardPushDate_interval_2,
			)
		) ?>
		</li>
         <?php endif ?>
<?php endif ?>

<?php
/************************************************************************************************************************/
/************************************************************************************************************************/
/************************************************************************************************************************/
?>
<?php
     // PUSH INTERVAL 3
?>
<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])) {
		$CardPushDate_interval_3 = $this->task->projectMetadataModel->get($task['project_id'] , 'CardPushDate_interval_3');
                if ($CardPushDate_interval_3 == "") {
                     $CardPushDate_interval_3 = 0;
                } else {
                     $CardPushDate_interval_3 = intval($CardPushDate_interval_3);
                }
      }
?>

<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
         <?php if ($CardPushDate_interval_3 > 0) : ?>
		<li>
		<?= $this->modal->confirm(
			'thermometer-4',
			'Push the task ' . $CardPushDate_interval_3 . ' days',
			'CardPushDateController',
			'push',
			array(
				'plugin' => 'CardPushDate',
				'task_id' => $task['id'],
				'project_id' => $task['project_id'],
                                'push_days' => $CardPushDate_interval_3,
			)
		) ?>
		</li>
         <?php endif ?>
<?php endif ?>

<?php
/************************************************************************************************************************/
/************************************************************************************************************************/
/************************************************************************************************************************/
?>
