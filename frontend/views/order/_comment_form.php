<?php
/* @var $order_id integer */
\frontend\assets\CommentAsset::register($this);
?>

<h3>
    Комментарий
    </h3>
    
    <textarea name="message" class="comment-message" data-order-id="<?= $order_id ?>"></textarea>


<button class="send-comment">Отправить</button>
