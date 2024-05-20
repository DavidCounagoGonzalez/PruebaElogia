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
                            <th><a href="/proveedores?order=1">Alias</a> <i class="fas fa-sort-amount-down-alt"></i></th>
                            <th><a href="/proveedores?order=2">Nombre Completo</a> </th>
                            <th><a href="/proveedores?order=3">Tipo</a> </th>
                            <th><a href="/proveedores?order=4">Continente</a> </th>
                            <th><a href="/proveedores?order=5">Año fundación</a> </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td>CuCoMa</td>
                            <td>Custom Comp. Mov. Martínez</td>
                            <td>Componentes móviles</td>
                            <td>Europa</td>
                            <td>1992</td> 
                            <td>                                        
                                <a href="tel: 931506210" target="_blank" class="btn btn-success ml-1" data-toggle="tooltip" data-placement="top" title="931506210"><i class="fas fa-phone"></i></a>
                                <a href="mailto: info@cucoma.net" target="_blank" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="info@cucoma.net"><i class="fas fa-envelope"></i></a>                                        
                                <a href="http://cucoma.net" target="_blank" class="btn btn-light ml-1"><i class="fas fa-globe-europe"></i></a>
                            </td>
                        </tr>
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
