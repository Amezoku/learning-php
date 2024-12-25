<?php declare(strict_types=1); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            body {
                background-color: #1e1e1e;
                color: #f5f5f5;
                font-family: Arial, sans-serif;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
                background-color: #2c2c2c;
            }

            table tr th, table tr td {
                padding: 10px;
                border: 1px solid #444;
            }

            thead tr th {
                background-color: #3d3d3d;
            }

            tbody tr:nth-child(even) {
                background-color: #2a2a2a;
            }

            tbody tr:nth-child(odd) {
                background-color: #333;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
                background-color: #3d3d3d;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php if (! empty($transactions)): ?>
                    <?php foreach($transactions as $transaction): ?>
                        <tr>
                            <td><?= formatDate($transaction['date'])    // Такой тег это аналог <?php echo ?></td>
                            <td><?= $transaction['checkNumber'] ?></td>
                            <td><?= $transaction['description'] ?></td>
                            <td>
                                <?php if ($transaction['amount'] < 0): ?>
                                    <span style="color: #ff1919;">
                                        <?= formatDollarAmount($transaction['amount']) ?>
                                    </span>
                                <?php elseif ($transaction['amount'] > 0): ?>
                                    <span style="color: #00d800;">
                                        <?= formatDollarAmount($transaction['amount']) ?>
                                    </span>
                                <?php else: ?>
                                    <?= formatDollarAmount($transaction['amount']) ?>
                                <?php endif; ?>
                                </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><?= formatDollarAmount($totals['totalIncome'] ?? 0) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?= formatDollarAmount($totals['totalExpense'] ?? 0) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><?= formatDollarAmount($totals['netTotal'] ?? 0) ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
