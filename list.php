<?php
session_start();
//require_once "Database/Database.php";
include('includes/global.php');

//Get Header
include('includes/header.php');
$_SESSION['username'] =1;
if ($_SESSION['username'] == 9) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
$query = mysqli_query($mysqli, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<body>

    <!-- <div class="container">
        <h1>Lista de Productos</h1>
        <h2>Has accedido como <?php echo $str = strtoupper($username) ?></h2>
    </div> -->
    <div class="table-product">
        <table>
            <tr>
                <th scope="col">Orden</th>
                <th scope="col">ID:Producto</th>
                <th scope="col">Nombre:Producto</th>
                <th scope="col">Cantidades</th>
                <th scope="col">Fecha:Registro</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
            <tbody>
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td scope="row"><?php echo $idpro ?></td>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['proname'] ?></td>
                        <td><?php echo $row['amount'] ?></td>
                        <td class="timeregis"><?php echo $row['time'] ?></td>
                        <td class="modify"><a name="edit" id="" class="bfix" href="fix.php?id=<?php echo $row['id'] ?>&message=<?php echo $row['proname'] ?>&amount=<?php echo $row['amount']; ?> " role="button">
                                Editar
                            </a></td>
                        <td class="delete"><a name="id" id="" class="bdelete" href="main/delete.php?id=<?php echo $row['id'] ?>" role="button">
                                Eliminar
                            </a></td>
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
        <a name="" id="" class="Addlist" style="float:right" href="addlist.php" role="button">Agregar Producto</a>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>
<?php include('includes/footer.php');?>
</html>
