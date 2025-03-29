<?php
if (isset($_GET['elem'])) {
    if ($_GET['elem'] == 'add') {
        require('add.php');
    } elseif ($_GET['elem'] == 'delete') {
        require('delete.php');
    } elseif ($_GET['elem'] == 'menu') {
        require('header.php');
        $mysqli = mysqli_connect('localhost', 'root', '', 'notebook');
        if (mysqli_connect_errno()) {
            echo mysqli_connect_error();
        }
        
        $sql = "SELECT * FROM `notes`";
        $res = mysqli_query($mysqli, $sql);
        if (!$res) {
            echo mysqli_error($mysqli);
        }
        ?>
        
        <table class="table">
            <thead> 
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">Name</th>
                    <th scope="col">LastName</th>
                    <th scope="col">Date</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Comment</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($res)): ?>
                    <tr>
                        <th scope="row"><?=$row['id'];?></th>
                        <td><?=$row['firstname'];?></td>
                        <td><?=$row['name'];?></td>
                        <td><?=$row['lastname'];?></td>
                        <td><?=$row['date'];?></td>
                        <td><?=$row['email'];?></td>
                        <td><?=$row['phone'];?></td>
                        <td><?=$row['comment'];?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <?php
        require('footer.php');
    }
}
?>