<main role="main" class="container">

    <div class="starter-template">
        <h1>Propón una mejora</h1>
        <p class="lead">Aquí puedes proponernos una mejora que te gustaría añadir a la página</p>
        <br>
        <br>


        <form method="post">
            <div class="form-group">
                <input type="text" id="asunto" name="asunto" class="form-control col-md-7 mx-auto" placeholder="Asunto de la mejora: " maxlength="30" required>
                
                <br>

                <textarea id="descripcion" name="descripcion" class="col-md-7" rows="4" maxlength="90" placeholder="Escribe aquí una breve descripción de la mejora" required></textarea>
                


                <?php 
                echo '<input type="hidden" id="inputIdUsuario" name="inputIdUsuario" value="'.$_SESSION["idUsuario"].'">';
                ?>
                <button class="btn btn-primary my-4 btn-block col-md-3 mx-auto" id="btnProponerMejora">Proponer mejora</button>
            </div>
        </form>

    </div>
</main>

<script type="text/javascript" src="js/central_proponer_mejoras.js"></script>