<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
		<?= $this->modal->confirm(
			'thermometer-0',
			'',
			'CardPushDateController',
			'push',
			array(
				'plugin' => 'CardPushDate',
				'task_id' => $task['id'],
				'project_id' => $task['project_id'],
                                'push_days' => 7
			)
		) ?>

<?php endif ?>

<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
		<?= $this->modal->confirm(
			'thermometer-1',
			'',
			'CardPushDateController',
			'push',
			array(
				'plugin' => 'CardPushDate',
				'task_id' => $task['id'],
				'project_id' => $task['project_id'],
                                'push_days' => 30
			)
		) ?>

<?php endif ?>

<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
		<?= $this->modal->confirm(
			'thermometer-4',
			'',
			'CardPushDateController',
			'push',
			array(
				'plugin' => 'CardPushDate',
				'task_id' => $task['id'],
				'project_id' => $task['project_id'],
                                'push_days' => 365
			)
		) ?>

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
