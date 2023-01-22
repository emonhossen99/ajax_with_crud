<?php
include('connetion.php');
$sql = 'SELECT * FROM datatable';
$query = mysqli_query($con, $sql);
$output = '';
while ($result = mysqli_fetch_assoc($query)) {
        $output .= '
                <tr>
                        <td>' . $result['id'] . '</td>
                        <td>' . $result['name'] . '</td>
                        <td>' . $result['email'] . '</td>
                        <td>
                        <button type="button" class="btn btn-info" onclick="UpdateUser(' . $result['id'] . ')">Update</button>
                        <button type="button" class="btn btn-danger" onclick="deleteUser(' . $result['id'] . ')">Delete</button>
                        </td>
                        </tr>';
}

echo $output;

?>