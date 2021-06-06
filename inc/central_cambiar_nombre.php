<main role="main" class="container">

    <div class="starter-template">
        <h1>Cambiar nombre de Usuario</h1>
        <p class="lead">En esta página puedes cambiar tu nombre de usuario.</p>
        <br>
        <br>


        <form method="post">
            <div class="form-group">
                <label for="nombre">Nombre de Usuario: </label>

                <?php
                    echo '<input type="text" id="nombre" name="nombre" class="form-control col-md-7  mx-auto" maxlength="30" placeholder="'.$_SESSION["nombreUsuario"].'" required>';
                    echo '<input type="hidden" id="inputIdUsuario" name="inputIdUsuario" value="'.$_SESSION["idUsuario"].'">';
                ?>
                <br>

                <input type="button" class="btn btn-primary my-4 btn-block col-md-3 mx-auto" value="Cambiar Nombre" id="btnCambiar"/>
            </div>
        </form>

    </div>
</main>

<script type="text/javascript" src="js/central_cambiar_nombre.js"></script>