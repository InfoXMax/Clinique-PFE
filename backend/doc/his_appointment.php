<?php
	session_start();
	include('assets/inc/config.php');

        include('assets/inc/checklogin.php');
        check_login();
        $aid=$_SESSION['doc_id'];
?>
<!DOCTYPE html>
<html lang="en">
<?php include('assets/inc/head.php');?>
<style>
    table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  border: 1px solid #ddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

</style>
<body>

<div id="wrapper">
<?php include('assets/inc/nav.php');?>

                <?php include('assets/inc/sidebar.php');?>
                <?php
                $aid=$_SESSION['ad_id'];
                $ret="select * from his_admin where ad_id=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$aid);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
                {
            ?>

<?php }?>
<div class="content-page">
    <!-- start content/ -->
    <?php
// start the session

// check if the doctor is logged in and has a session
if(isset($_SESSION['doc_id'])) {

    // retrieve the doctor's appointments using the session variable
    $doc_id = $_SESSION['doc_id'];
    $query = "SELECT * FROM appointment_list WHERE doc_id = $doc_id";

    // execute the query and display the results
    // ...

    // Number of records to display per page
    $records_per_page = 10;

    // Get the total number of record
    $result = $mysqli->query("SELECT COUNT(*) AS total_records FROM appointment_list WHERE doc_id = $doc_id");
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total_records'];

    // Calculate the total number of pages
    $total_pages = ceil($total_records / $records_per_page);

    // Get the current page number
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }

    // Calculate the offset for the SQL query
    $offset = ($current_page - 1) * $records_per_page;

    // Fetch data from the appointment_list table
    $result = $mysqli->query("SELECT *FROM appointment_list WHERE doc_id = {$_SESSION['doc_id']} ORDER BY date_created DESC LIMIT $offset, $records_per_page");

    if (mysqli_num_rows($result) > 0) {
        // Output the table header
        echo "<table>";
        echo "<tr><th>Doctors</th><th>Name</th><th>Email</th><th>Schedule</th></tr>";

        // Loop through the rows and output the data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['doctor_name'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['schedule'] . "</td>";
            echo "<td>";
            echo "<div class='btn-group'>";
            echo "<a class='btn btn-secondary' href='./edit_appointment.php?id=" . $row['id'] . "' onclick='showPopup(this.href); return false;'>Edit</a>";
            echo "<a class='btn btn-danger' href='./delete_appointment.php?id=" . $row['id'] . "' onclick='return confirmDelete();'>Supprimer</a>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";

        // Display pagination links
        // ...
        if ($total_records > 0) {
            // Calculate total number of pages
            $total_pages = ceil($total_records / $records_per_page);
            // Output pagination links
            echo "<nav aria-label='...'>";
            echo "<ul class='pagination'>";
            // Previous page link
            if ($current_page > 1) {
                echo "<li class='page-item'>";
                echo "<a class='page-link' href='?page=".($current_page - 1)."' tabindex='-1'>Précédent</a>";
                echo "</li>";
            } else {
                echo "<li class='page-item disabled'>";
                echo "<a class='page-link' href='#' tabindex='-1'>Précédent</a>";
                echo "</li>";
            }
            // Page links
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $current_page) {
                    echo "<li class='page-item active'><a class='page-link' href='?page=".$i."'>".$i." <span class='sr-only'>(current)</span></a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='?page=".$i."'>".$i."</a></li>";
                }
            }
            // Next page link
            if ($current_page < $total_pages) {
                echo "<li class='page-item'>";
                echo "<a class='page-link' href='?page=".($current_page + 1)."'>Suivant</a>";
                echo "</li>";
            } else {
                echo "<li class='page-item disabled'>";
                echo "<a class='page-link' href='#'>Suivant</a>";
                echo "</li>";
            }
            echo "</ul>";
            echo "</nav>";}





    } else {
        echo "No records found.";
    }

} else {
    // redirect to login page if doctor is not logged in
    // ...
    header('Location: index.php');
    exit();
}
?>

    <script>
        function showPopup(url) {
            var popup = window.open(url, 'Edit Appointment', 'height=400,width=600');
            if (window.focus) {
                popup.focus();
            }
        }

        function confirmDelete() {
            return confirm("Are you sure you want to delete this appointment?");
        }
    </script>
    <!-- end content -->
</div>
</div>
                    <!-- Footer Start -->
                    <?php include("assets/inc/footer.php");?>
                    <!-- end Footer -->



        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
</body>
</html>