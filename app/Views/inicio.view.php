<!--Inicio HTML -->
<div class="row">       
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="get">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Buscar</h6>                                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="form-inline">
                            <div id="field_wrapper">
                                <div class="my-class-form-control-group">
                                    <input type="text" class="form-control mr-2" name="jugador" placeholder="Nombre jugador"/>
                                    <button type="submit" class="btn btn-info">Buscar</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="col-6 text-left">                     
                    <h6 class="m-0 font-weight-bold text-primary">Jugadores</h6>
                </div>
                <div class="col-6 text-right">                     
                    <input type="submit" value="Guardar" name="guardar" class="btn btn-primary ml-2"/>
                </div>
            </div>
            <!-- Card Body -->
            <div class="d-flex justify-content-around flex-wrap">
                <?php 
                if(isset($jugadores) && count($jugadores) > 0){ 
                    foreach ($jugadores as $jugador) {
                        
                ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo $jugador['imagen'] ?? '' ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $jugador['nombre'] ?? '' ?></h5>
                                <p class="card-text">Nacionalidad: <?php echo $jugador['nacionalidad'] ?? '' ?></p>
                                <p class="card-text">Fecha de nacimiento: <?php echo $jugador['nacimiento'] ?? '' ?></p>
                                <p class="card-text">Equipo: <?php echo $jugador['equipo'] ?? '' ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>                        
</div>
<!--Fin HTML -->
