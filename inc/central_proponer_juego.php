<main role="main" class="container">

    <div class="starter-template">
        <h1>Propón un juego</h1>
        <p class="lead">Aquí puedes proponernos un juego que quieras añadir a nuestra lista</p>
        <br>
        <br>


        <form method="post">
            <div class="form-group">
                <input type="text" id="titulo" name="titulo" class="form-control col-md-7 mx-auto" placeholder="Título del juego: " maxlength="30" required>
                
                <br>

                <textarea id="descripcion" name="descripcion" class="col-md-7" rows="4" maxlength="90" placeholder="Escribe aquí una breve descripción del juego" required></textarea>
                


                <?php 
                echo '<input type="hidden" id="inputIdUsuario" name="inputIdUsuario" value="'.$_SESSION["idUsuario"].'">';
                ?>
                <button class="btn btn-primary my-4 btn-block col-md-3 mx-auto" id="btnProponer">Proponer juego</button>
            </div>
        </form>

    </div>
</main>

<script type="text/javascript" src="js/central_proponer_juego.js"></script>