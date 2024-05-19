<div class="d-flex  justify-content-end align-items-center">
    <?php echo "<div class=''> Usuario: " . $_SESSION["usuario"] . '</div>'; ?>
    <form action="logout.php" method="POST">
        <button class="btn btn-outline-success ms-2" type="submit" name="cerrar_sesion">Cerrar sesión</button>
    </form>
</div>