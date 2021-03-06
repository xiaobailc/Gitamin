<?php

/*
 * This file is part of Gitamin.
 *
 * Copyright (C) 2015-2016 The Gitamin Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gitamin\Events\Comment;

use Gitamin\Models\Comment;

class CommentWasRemovedEvent implements CommentEventInterface
{
    /**
     * The comment that has been removed.
     *
     * @var \Gitamin\Models\Comment
     */
    public $comment;

    /**
     * Create a new comment was removed event instance.
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
}
