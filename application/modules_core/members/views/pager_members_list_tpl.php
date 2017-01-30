<div class='w-box-content'>
<table class='table table-striped'>
    <thead>
        <tr>
            <th>Name</th> 
            <th>Last Logged In</th>
            <th>Business Name</th>
            <th>Level</th>
            <th>Admin</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php
        if ($info == FALSE):

            echo '
                        <tr>
                            <td colspan="5">You have no members saved!</td>
                        </tr>
                            ';
        else:

            foreach ($info as $row):
                echo "<tr>
                    <td>" . $row['contact'] . "</td>
                    <td>" . $row['loggedIn'] . "</td>
                    <td>" . $row['business_name'] . "</td>
                    <td>";
                if ($row['privilege'] == 0):
                    echo "<span class='label label-info'>Public Only</span>";
                else:
                    echo "<span class='label label-info'>Full Access</span>";
                endif;
                echo "</td>";
                if ($row['level'] == 2):
                    echo "<td><span class='label label-warning'>Admin</span></td>";
                else:
                    echo "<td></td>";
                endif;
                echo "
                    <td>
                        <a href='";
                echo site_url('/members/details/' . $row['id']);
                echo "' style=\"margin-left:5px\"><i class=\"icon-edit\"></i></a>
                        <a href='javascript:void()' style=\"margin-left:5px\" onclick=\"deleteMember('" . $row['id'] . "')\"><i class=\"icon-trash\"></i></a>
                    </td> 
                </tr>";
            endforeach;

        endif;
        ?>


    </tbody>
</table>
</div>
<?=$links?>