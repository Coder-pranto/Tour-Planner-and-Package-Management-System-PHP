<table class="table table-borderless table-sm " style="width:100%">
    <tr>
        <th style="font-size:28px">Admin Links</th>
    </tr>

    <?php if ($_SESSION["usertype"] == "admin") { ?>

    <tr>
        <td><a href="adduser.php">Add User</a></td>
    </tr>
    <tr>
        <td><a href="updateuser.php">Update User</a></td>
    </tr>
    <tr>
        <td><a href="deleteuser.php">Delete User</a></td>
    </tr>

    <?php } ?>

    <tr>
        <td><a href="addcategory.php">Add Category</a></td>
    </tr>


    <?php if ($_SESSION["usertype"] == "admin") { ?>
    <tr>
        <td><a href="updatecategory.php">Update Category</a></td>
    </tr>
    <tr>
        <td><a href="deletecategory.php">Delete Category</a></td>
    </tr>
    <?php } ?>
    <tr>
        <td><a href="viewcategory.php">View Category</a></td>
    </tr>
    <tr>
        <td><a href="addsubcategory.php">Add Subcategory</a></td>
    </tr>
    <?php if ($_SESSION["usertype"] == "admin") { ?>
    <tr>
        <td><a href="updatesubcategory.php">Update Subcategory</a></td>
    </tr>
    <tr>
        <td><a href="deletesubcategory.php">Delete Subcategory</a></td>
    </tr>
    <?php } ?>

    <tr>
        <td><a href="viewsubcategory.php">View Subcategory</a></td>
    </tr>
    <tr>
        <td><a href="addpackage.php">Add Package</a></td>
    </tr>

    <?php if ($_SESSION["usertype"] == "admin") { ?>
    <tr>
        <td><a href="updatepackage.php">Update Package</a></td>
    </tr>
    <tr>
        <td><a href="deletepackage.php">Delete Package</a></td>
    </tr>

    <?php } ?>

    <tr>
        <td><a href="viewpackage.php">View Package</a></td>
    </tr>

    <tr>
        <td><a href="viewenquiry.php">View Enquiry</a></td>
    </tr>
</table>