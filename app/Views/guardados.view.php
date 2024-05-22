<!--Inicio HTML -->
<div class="row">       
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="get" action="/proveedores">
                <input type="hidden" name="order" value="1"/>
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Buscar</h6>                                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--<form action="./?sec=formulario" method="post">                   -->
                    <div class="row">
                        <div class="form-inline">
                            <div id="field_wrapper">
                                <div class="my-class-form-control-group">
                                    <input type="text" class="form-control mr-2" name="jugador" placeholder="Nombre jugador"/>
                                    <input type="submit" class="btn btn-info" name="buscar" value="Buscar" />
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
            <div class="card-body">
                <div id="button_container" class="mb-3"></div>
                <table id="tabladatos" class="table table-striped">                    
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Nacionalidad</th>
                            <th>Nacimiento</th>
                            <th>Equipo </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (count($jugadores) > 0){
                        foreach($jugadores as $jugador){
                            
                    ?>
                        <tr class="">
                            <td><?php echo $jugador['nombre'] ?? '' ?></td>
                            <td><?php echo $jugador['nacionalidad'] ?? '' ?></td>
                            <td><?php echo $jugador['fecha_nacimiento'] ?? '' ?></td>
                            <td><?php echo $jugador['equipo'] ?? '' ?></td>
                        </tr>
                    
                    <?php 
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <nav aria-label="Navegacion por paginas">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=1&order=1" aria-label="First">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">First</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=2&order=1" aria-label="Previous">
                                <span aria-hidden="true">&lt;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        <li class="page-item active"><a class="page-link" href="#">3</a></li>   
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=4&order=1" aria-label="Next">
                                <span aria-hidden="true">&gt;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=8&order=1" aria-label="Last">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Last</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>                        
</div>
<!--Fin HTML -->
