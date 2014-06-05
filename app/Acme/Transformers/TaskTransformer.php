<?php namespace Acme\Transformers;

class TaskTransformer extends Transformer {

    public function transform($task)
    {
        return [
            'title' => $task['title'],
            'content' => $task['content'],
            'active' => (boolean) $task['completed'],
            'date_posted' => $task['created_at'],
            'price' => $task['price'],
            'task_id' => $task['id'],
            'deadline' => $task['deadline']
        ];
    }
}