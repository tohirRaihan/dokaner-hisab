<?php
require_once '../../../private/initialize.php';

?>
<table id="items-table" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th class="text-center">price /kg</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Rice</td>
            <td class="text-center">55</td>
            <td class="text-center">
                <div class="btn-group" role="group">
                    <button class="btn btn-xs bg-gradient-warning">Edit</button>
                    <button class="btn btn-xs bg-gradient-danger">Delete</button>
                </div>
            </td>
        </tr>
    </tbody>
</table>
