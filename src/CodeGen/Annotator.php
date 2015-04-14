<?php
namespace CodeGen;
use CodeGen\Comment;
use CodeGen\CommentBlock;

trait Annotator {  
    public $comment;

    public function annotate($comment) {
        $lines = explode("\n", $comment);
        if (count($lines) === 0) {
            return;
        }
        if (count($lines) == 1) {
            $this->comment = new Comment($comment);
        } else {
            $this->comment = new CommentBlock($comment);
        }
    }

    public function renderAnnotate(array $args = array())
    {
        return $this->comment->render($args) . "\n";
    }

}



