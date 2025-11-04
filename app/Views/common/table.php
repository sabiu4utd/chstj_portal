<div class="table-responsive">
    <table class="table table-hover table-mobile">
        <thead>
            <tr>
                <?php foreach ($headers as $header): ?>
                <th><?php echo $header; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($rows)): ?>
                <?php foreach ($rows as $row): ?>
                <tr>
                    <?php foreach ($row as $key => $value): ?>
                    <td data-label="<?php echo $headers[$key]; ?>"><?php echo $value; ?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="<?php echo count($headers); ?>" class="text-center">No data available</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>