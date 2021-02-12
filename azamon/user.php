<?php
include ('templates/header.php');
if (!isset($_SESSION['admin'])) {
    header('Location:index.php');
}
?>
<style type="text/css">
    table{
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 80%;

    }
    tr {
        border: 1px solid #dddddd;
    }
    td {
        text-align: center;
        padding: 8px;

    }

    th {

        padding-top: 12px;
        padding-bottom: 12px;
        background-color: black;
        color: white;
        text-align: center;
    }

    tr:hover {background-color: #1c427f;}

</style>
<?php
    $sql = "SELECT * FROM user";
    if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<h1 align='center'>You can click the user for change the user information</h1>";
    echo "<table align='center'>";
    echo "<tr >";
        echo "<th style=''>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Surname</th>";
        echo "<th>E-mail</th>";
        echo "</tr>";
    while($row = mysqli_fetch_array($result)){
    echo "<tr>";
        echo "<td><a href='update.php?id=".$row['user_id']."'>" . $row['user_id'] . "</a></td>";
        echo "<td><a href='update.php?id=".$row['user_id']."'>" . $row['user_name'] . "</a></td>";
        echo "<td><a href='update.php?id=".$row['user_id']."'>" . $row['user_surname'] . "</a></td>";
        echo "<td><a href='update.php?id=".$row['user_id']."'>" . $row['user_email'] . "</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    // Free result set
    mysqli_free_result($result);
    } else{
    echo "No records matching your query were found.";
    }
    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }


include ('templates/footer.php');
?>