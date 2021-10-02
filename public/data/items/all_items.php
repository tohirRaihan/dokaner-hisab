<?php

use App\Item;

require_once '../../../private/initialize.php';

$items = Item::getAll();
$count = 1;

?>
<table id="items-table" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th class="text-center">price</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($items as $item): ?>
            <tr>
                <td><?= $count++ ?></td>
                <td><?= $item['name'] ?></td>
                <td class="text-center"><span class="h5">&#2547;</span> <?= $item['price'] ?><span class="text-muted"> / <?= $item['unit_name'] ?></span></td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <button class="btn btn-xs bg-gradient-warning">Edit</button>
                        <button class="btn btn-xs bg-gradient-danger">Delete</button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
