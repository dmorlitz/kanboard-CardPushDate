<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
         <?php
             if ($CardPushDate_interval_1_randomize != "0") {
                 $CardPushDate_interval_1 = rand(1,$CardPushDate_interval_1);
             }
             if ($CardPushDate_interval_2_randomize != "0") {
                 $CardPushDate_interval_2 = rand(1,$CardPushDate_interval_2);
             }
             if ($CardPushDate_interval_3_randomize != "0") {
                 $CardPushDate_interval_3 = rand(1,$CardPushDate_interval_3);
             }
         ?>

         <?php if ($CardPushDate_interval_1 > 0): ?>
<?php //echo "<pre>";var_dump($CardPushDate_interval_1_randomize);echo "</pre>"; ?>
                  <?=
                       $this->modal->confirm(
		       'thermometer-0',
		       '',
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
			'thermometer-1',
			'',
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
			'thermometer-4',
			'',
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
