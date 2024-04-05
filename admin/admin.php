<?php require 'header.admin.php' ?>

<div>
    <h2>All products table</h2>

    <table>
        <tr>
            <th>Bill ID</th>
            <th>Date</th>
            <th>Total</th>
            <th>ID</th>
            <th>Name</th>
            <th>Show</th>
            <th>Send</th>
            <th>Delete</th>
        </tr>
        <?php
        $sql = "SELECT * FROM bill INNER JOIN user ON bill.user_id = user.user_id WHERE bill.status = 1";
        $rs = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($rs)) {
            $bill_id = $row['bill_id'];
            ?>
            <tr>
                <td>
                    <?php echo $row['bill_id'] ?>
                </td>

                <td>
                    <?php echo $row['bill_date'] ?>
                </td>
                <td>
                    <?php echo number_format($row['bill_total']), "฿"; ?>

                </td>
                <td>
                    <?php echo $row['user_id'] ?>
                </td>
                <td>
                    <?php echo $row['user_name'] ?>
                </td>
                <td><a href="Show.php?bill_id= <?php echo $bill_id ?>&id=<?php echo $row['user_id'] ?>"><Button>Show
                            Product</Button></td></a></td>
                <td><a href="status.php?status&status2=<?php echo $row['bill_id']; ?>"><button
                            class="sweetAlertButton">Sent</button></a></td>
                <td><a href="del.admin.php?delete=<?php echo $row['bill_id']; ?>"><button class="delete">Delete</button></a>
                </td>
            </tr>
        <?php } ?>

    </table>
</div>
</body>

</html>