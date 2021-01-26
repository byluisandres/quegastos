<!-- add gasto-->
<div class="modal fade right" id="addGastos" tabindex="-1" role="dialog" aria-labelledby="addGastos" aria-hidden="true">
    <div class="modal-dialog modal-full-height modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGastos">Añadir Gasto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- formulario de los gastos -->
                <form class="" method="POST" id="formAddGasto">
                    <!-- cantidad -->
                    <label for="cantidad">Cantidad</label>
                    <input type="text" id="cantidad" name="cantidad" class="form-control mb-3" placeholder="Escribe la cantidad">
                    <!-- gastos -->
                    <label for="gasto">Gastos</label>
                    <select class="browser-default custom-select mb-3" id="gasto" name="gasto">
                        <option selected disabled>--Selecciona--</option>
                        <?php foreach ($data['gastos'] as $gasto) : ?>
                            <option value="<?php echo $gasto['id'] ?>"><?php echo strtoupper($gasto['nombre']) ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <!-- tipo de gasto -->
                    <label for="TipoGsto">Tipo de gastos</label>
                    <select name="tipoGasto" id="tipoGasto" class="browser-default custom-select mb-3"></select>

                    <!-- butón para añdir el gasto -->
                    <button class="btn btn-teal btn-block my-3" type="submit">Añadir</button>
                </form>
            </div>
        </div>
    </div>
</div>