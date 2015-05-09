<?php
if (isset($_SESSION['messages'])) {
    foreach ($_SESSION['messages'] as $msg) {
        echo '<div class="alert alert-info text-center ' . $msg['type'] . '">';
        echo htmlspecialchars($msg['text']);
        echo '</div>';
    }
    unset($_SESSION['messages']);
}
