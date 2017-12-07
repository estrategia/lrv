<table class="table table striped">
    <thead>
        <tr>
            <th>Estado</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($estados as $key => $estado): ?>
            <tr>
                <td>
                    <?php echo $estado->estado->nombre; ?>
                </td>
                <td>
                    <?php echo $estado->fechaCreacion; ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>

</table>