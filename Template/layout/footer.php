<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
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

             $CardPushDate_interval_1_randomize = ( intval($CardPushDate_interval_1_randomize) > 0 ) ? 1 : 0;
             $CardPushDate_interval_2_randomize = ( intval($CardPushDate_interval_2_randomize) > 0 ) ? 1 : 0;
             $CardPushDate_interval_3_randomize = ( intval($CardPushDate_interval_3_randomize) > 0 ) ? 1 : 0;

             $CardPushDate_show_add_comment = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_add_comment");
             $CardPushDate_show_comment = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_comment");
             $CardPushDate_show_edit = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_edit");
             $CardPushDate_show_close = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_close");
             $CardPushDate_show_move = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_move");

             $CardPushDate_show_add_comment = ( intval($CardPushDate_show_add_comment) > 0 ) ? 1 : 0;
             $CardPushDate_show_comment = ( intval($CardPushDate_show_comment) > 0 ) ? 1 : 0;
             $CardPushDate_show_edit = ( intval($CardPushDate_show_edit) > 0 ) ? 1 : 0;
             $CardPushDate_show_close = ( intval($CardPushDate_show_close) > 0 ) ? 1 : 0;
             $CardPushDate_show_move = ( intval($CardPushDate_show_move) > 0 ) ? 1 : 0;

             if ($CardPushDate_interval_1_randomize == "1") {
                 $CardPushDate_interval_1 = rand(1,$CardPushDate_interval_1);
             }
             if ($CardPushDate_interval_2_randomize == "1") {
                 $CardPushDate_interval_2 = rand($CardPushDate_interval_1 + 1,$CardPushDate_interval_2);
             }
             if ($CardPushDate_interval_3_randomize == "1") {
                 $CardPushDate_interval_3 = rand($CardPushDate_interval_2 + 1,$CardPushDate_interval_3);
             }
         ?>

<?php //Display the last comment on the card - if requested by settings ?>
<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
         <?php
             if ($CardPushDate_show_comment == "1") {
                 $comments = $this->task->commentModel->getAll($task['id'], 'ASC');
                 foreach ($comments as $comment):
                     $display_comment = date("m/d/Y", $comment['date_creation']) . ': ' . $comment['comment']; //Keep overwriting the displayed comment until we reach the last one
                 endforeach;
                 if ($display_comment != "") {
                     echo $display_comment . "<br>";
                 }
             }
         ?>
<?php endif; ?>

<?php //echo "<pre>";var_dump($task);echo "</pre>"; ?>
         <?php if ($CardPushDate_interval_1 > 0): ?>
                  <?=
                       $this->modal->confirm(
		       'clock-o',
		       '+' . $CardPushDate_interval_1,
		       'CardPushDateController',
		       'push',
		       array(
			       'plugin' => 'CardPushDate',
			       'task_id' => $task['id'],
	  	       	       'project_id' => $task['project_id'],
                               'push_days' => $CardPushDate_interval_1,
	   	       )
       	       ) ?>
         <?php endif ?>
<?php endif ?>

<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
         <?php if ($CardPushDate_interval_2 > 0) : ?>
		<?= $this->modal->confirm(
			'clock-o',
			'+' . $CardPushDate_interval_2,
			'CardPushDateController',
			'push',
			array(
				'plugin' => 'CardPushDate',
				'task_id' => $task['id'],
				'project_id' => $task['project_id'],
                                'push_days' => $CardPushDate_interval_2,
			)
		) ?>

         <?php endif ?>
<?php endif ?>

<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
         <?php if ($CardPushDate_interval_3 > 0) : ?>
		<?= $this->modal->confirm(
			'clock-o',
			'+' . $CardPushDate_interval_3,
			'CardPushDateController',
			'push',
			array(
				'plugin' => 'CardPushDate',
				'task_id' => $task['id'],
				'project_id' => $task['project_id'],
                                'push_days' => $CardPushDate_interval_3,
			)
		) ?>

         <?php endif ?>
<?php endif ?>

<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
         <?php if ($CardPushDate_show_add_comment == 1) : ?>
                <?= $this->modal->small('comment-o', t(''), 'CommentController', 'create', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
         <?php endif ?>
<?php endif ?>

<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
         <?php if ($CardPushDate_show_edit == 1) : ?>
		<?= $this->modal->large('edit', t(''), 'TaskModificationController', 'edit', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
         <?php endif ?>
<?php endif ?>

<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
         <?php if ($CardPushDate_show_close == 1) : ?>
                <?= $this->modal->confirm('times', t(''), 'TaskStatusController', 'close', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
         <?php endif ?>
<?php endif ?>

<? // DMM: Move icon - temporarily forced on until parameter created ?>
<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
         <?php if ($CardPushDate_show_move == 1) : ?>
		<?= $this->modal->confirm(
		'arrows-h',
		'',
		'TaskDuplicationController',
		'move',
		array(
			'task_id' => $task['id'],
			'project_id' => $task['project_id'],
			'dst_project_id' => $task['project_id'],
			)
		) ?>
	<?php endif ?>
<?php endif ?>

<style>
.fa.fa-times.fa-fw{
        color: gray;
}
.fa.fa-times.fa-fw:hover{
        color: black;
}

.fa.fa-ban.fa-fw{
        color: gray;
}
.fa.fa-ban.fa-fw:hover{
        color: black;
}

.fa.fa-edit.fa-fw{
        color: gray;
}
.fa.fa-edit.fa-fw:hover{
        color: black;
}

.fa.fa-trash-o.fa-fw{
        color: gray;
}
.fa.fa-trash-o.fa-fw:hover{
        color: black;
}
</style>
