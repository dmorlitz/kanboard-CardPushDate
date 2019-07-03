<?php
    $CardPushDate_show_comment_in_collapsed = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_comment_in_collapsed");
?>

<div class="
        task-board
        <?= $task['is_draggable'] ? 'draggable-item ' : '' ?>
        <?= $task['is_active'] == 1 ? 'task-board-status-open '.($task['date_modification'] > (time() - $board_highlight_period) ? 'task-board-recent' : '') : 'task-board-status-closed' ?>
        color-<?= $task['color_id'] ?>"
     data-task-id="<?= $task['id'] ?>"
     data-column-id="<?= $task['column_id'] ?>"
     data-swimlane-id="<?= $task['swimlane_id'] ?>"
     data-position="<?= $task['position'] ?>"
     data-owner-id="<?= $task['owner_id'] ?>"
     data-category-id="<?= $task['category_id'] ?>"
     data-due-date="<?= $task['date_due'] ?>"
     data-task-url="<?= $this->url->href('TaskViewController', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>">

    <div class="task-board-sort-handle" style="display: none;"><i class="fa fa-arrows-alt"></i></div>

    <?php if ($this->board->isCollapsed($task['project_id'])): ?>
        <!--Switch to expanded to allow titles to wrap <div class="task-board-collapsed">-->
        <div class="task-board-expanded">
            <div class="task-board-saving-icon" style="display: none;"><i class="fa fa-spinner fa-pulse"></i></div>
            <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
                <?= $this->render('task/dropdown', array('task' => $task, 'redirect' => 'board')) ?>
                <?= $this->modal->large('edit', '', 'TaskModificationController', 'edit', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
            <?php else: ?>
                <strong><?= '#'.$task['id'] ?></strong>
            <?php endif ?>

            <?php if (! empty($task['assignee_username'])): ?>
                <span title="<?= $this->text->e($task['assignee_name'] ?: $task['assignee_username']) ?>">
                    <?= $this->text->e($this->user->getInitials($task['assignee_name'] ?: $task['assignee_username'])) ?>
                </span> -
            <?php endif ?>

            <?= $this->url->link($this->text->e($task['title']), 'TaskViewController', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, '', $this->text->e($task['title'])) ?>
        </div>

        <?php //Display the last comment on the card - if requested by settings ?>
        <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>

            <?php if (! empty($task['date_due'])): ?>
                <p>
                <span class="task-date
                    <?php if (time() > $task['date_due']): ?>
                         task-date-overdue
                    <?php elseif (date('Y-m-d') == date('Y-m-d', $task['date_due'])): ?>
                         task-date-today
                    <?php endif ?>
                    ">
                    <i class="fa fa-calendar"></i>
                    <?= $this->dt->datetime($task['date_due']) ?>
                </span>
            <?php endif ?>

            <?php
                if ($CardPushDate_show_comment_in_collapsed == "1") {
                    $comments = $this->task->commentModel->getAll($task['id'], 'ASC');
                    foreach ($comments as $comment):
                        $display_comment = date("m/d/Y", $comment['date_creation']) . ': ' . $comment['comment']; //Keep overwriting the displayed comment until we reach the last one
                    endforeach;
                    if (isset($display_comment)) {
                        echo "<hr>" . $display_comment;
                    }
                }
            ?>
            <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
                <?= $this->modal->small('comment-o', t(''), 'CommentController', 'create', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
            <?php endif ?>

        <?php endif; ?>
    <?php else: ?>
        <div class="task-board-expanded">
            <div class="task-board-saving-icon" style="display: none;"><i class="fa fa-spinner fa-pulse fa-2x"></i></div>
            <div class="task-board-header">
                <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
                    <?= $this->render('task/dropdown', array('task' => $task, 'redirect' => 'board')) ?>
                    <?= $this->modal->large('edit', '', 'TaskModificationController', 'edit', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
                <?php else: ?>
                    <strong><?= '#'.$task['id'] ?></strong>
                <?php endif ?>

                <?php if (! empty($task['owner_id'])): ?>
                    <span class="task-board-assignee">
                        <?= $this->text->e($task['assignee_name'] ?: $task['assignee_username']) ?>
                    </span>
                <?php endif ?>

                <?= $this->render('board/task_avatar', array('task' => $task)) ?>
            </div>

            <?= $this->hook->render('template:board:private:task:before-title', array('task' => $task)) ?>
            <div class="task-board-title">
                <?= $this->url->link($this->text->e($task['title']), 'TaskViewController', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
            </div>
            <?= $this->hook->render('template:board:private:task:after-title', array('task' => $task)) ?>

            <?php // Display the last comment
               $comments = $this->task->commentModel->getAll($task['id'], 'ASC');
               foreach ($comments as $comment):
                  $display_comment = date("m/d/Y", $comment['date_creation']) . ': ' . $comment['comment']; //Keep overwriting the displayed comment until we reach the last one
               endforeach;
               if (isset($display_comment)) {
                  echo "<hr>" . $display_comment;
               }
            ?>

            <?= $this->render('board/task_footer', array(
                'task' => $task,
                'not_editable' => $not_editable,
                'project' => $project,
            )) ?>
        </div>
    <?php endif ?>
</div>
