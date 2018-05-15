<?php
     // PUSH INTERVAL 1
?>
<?php
             $CardPushDate_interval_1 = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_interval_1");
             $CardPushDate_interval_2 = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_interval_2");
             $CardPushDate_interval_3 = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_interval_3");

             $CardPushDate_interval_1 = ( intval($CardPushDate_interval_1) > 0 ) ? intval($CardPushDate_interval_1) : 0;
             $CardPushDate_interval_2 = ( intval($CardPushDate_interval_2) > 0 ) ? intval($CardPushDate_interval_2) : 0;
             $CardPushDate_interval_3 = ( intval($CardPushDate_interval_3) > 0 ) ? intval($CardPushDate_interval_3) : 0;

             $CardPushDate_interval_1_randomize = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_interval_1_randomize");
             $CardPushDate_interval_2_randomize = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_interval_2_randomize");
             $CardPushDate_interval_3_randomize = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_interval_3_randomize");

             $CardPushDate_interval_1_randomize = ( intval($CardPushDate_interval_1_randomize) > 0 ) ? intval($CardPushDate_interval_1_randomize) : 0;
             $CardPushDate_interval_2_randomize = ( intval($CardPushDate_interval_2_randomize) > 0 ) ? intval($CardPushDate_interval_2_randomize) : 0;
             $CardPushDate_interval_3_randomize = ( intval($CardPushDate_interval_3_randomize) > 0 ) ? intval($CardPushDate_interval_3_randomize) : 0;

?>
<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])) {
		$CardPushDate_interval_1 = $this->task->projectMetadataModel->get($task['project_id'] , 'CardPushDate_interval_1');
                if ($CardPushDate_interval_1 == "") {
                     $CardPushDate_interval_1 = 0;
                } else {
                   if ($CardPushDate_interval_1_randomize == "1") {
                       $CardPushDate_interval_1 = rand(1,$CardPushDate_interval_1);
                   } else {
                        $CardPushDate_interval_1 = intval($CardPushDate_interval_1);
                   }
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
                   if ($CardPushDate_interval_2_randomize == "1") {
                       $CardPushDate_interval_2 = rand(1,$CardPushDate_interval_2);
                   } else {
                        $CardPushDate_interval_2 = intval($CardPushDate_interval_2);
                   }
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
                   if ($CardPushDate_interval_3_randomize == "1") {
                       $CardPushDate_interval_3 = rand(1,$CardPushDate_interval_3);
                   } else {
                        $CardPushDate_interval_3 = intval($CardPushDate_interval_3);
                   }
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
