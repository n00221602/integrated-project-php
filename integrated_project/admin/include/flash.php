<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}
if (isset($_SESSION["flash-message"])) {
?>
    <div class="flash-message">
        <?= $_SESSION["flash-message"] ?>
        <?php unset($_SESSION["flash-message"]); ?>
    </div>
<?php } ?>