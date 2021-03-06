

<!-- PDF -->
<div id="contenedorPdfEntreFechas" class="animate__animated">
    <form action="" id="formPdfEntreFechas" method="POST">
        <label for="fechaInicial">Fecha Inicial</label>
        <input type="date" name="fechaInicial" id="fechaInicial" class="form-control mb-3">
        <label for="fechFinal">Fecha Final</label>
        <input type="date" name="fechaFinal" id="fechaFinal" class="form-control mb-3">
        <input type="submit" value="Generar pdf" class="btn btn-teal btn-block">
    </form>
</div>

<div id="contenedorPdfGasto" class="animate__animated">

    <select name="selectPdfGasto" id="selectPdfGasto" class="form-control mb-3">
        <option value="null" disabled selected>-- Selecciona Gasto --</option>
        <?php foreach ($data['gastos'] as $gasto) : ?>
            <option value="<?php echo $gasto['id'] ?>"><?php echo $gasto['nombre'] ?> </option>
        <?php endforeach; ?>
    </select>

</div>
<div id="contenedorPdfAnio" class="animate__animated">

    <?php $anioAcutual = date('Y'); ?>
    <select name="selectPdfAnio" id="selectPdfAnio" class="form-control mb-3">
        <option selected disabled>--Selecciona un año--</option>
        <?php for ($i = $anioAcutual; $i >= 2010; $i--) : ?>
            <option value="<?php echo $i ?>"><?php echo $i ?> </option>
        <?php endfor; ?>
    </select>

</div>