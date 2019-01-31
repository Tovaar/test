<?php
require "header.php";


if (isset($_SESSION['rankUser']) && ($_SESSION['rankUser'] == 2)) {

require "includes/dbc.inc.php";
require "includes/user.inc.php";

require_once("includes/table.inc.php");

$fetch = new inc();
$returnData = $fetch->getQuery();

?>
<table  class="table  table-sm table-hover table-bordered " >
    <thead>
    <tr>
        <th style="width: 5%" scope="col">Id</th>
        <th style="width: 12%" scope="col">username</th>
        <th style="width: 20%" scope="col"></th>
        </tr>
    </thead>
    <tbody>

<?php

foreach ($returnData as $data) {
    ?>
    <tr>
        <td> <?php echo htmlspecialchars($data['idUsers']) ?> </td>
        <td> <?php echo htmlspecialchars($data['usernameUsers']) ?> </td>
        <td><?php echo " <a class = 'btn btn-dark' href='delete_users.php?idUsers=".$data['idUsers']."'>Look User</a>"?> </td>
    </tr>

    <?php
}?>
</tbody>
    </table>
<?php
}else{
    "You not allowed to get here!";
}