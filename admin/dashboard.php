<style>

body {
    background-color: whitesmoke; ; /* Dark navy blue background */
	color: #444;
}

header {
    text-align: center;
    padding: 20px 0;
}

.box {
    background-color: #0E0C0C; /* Dark grey box background */
    padding: 20px;
    border-radius: 10px;
}

.num {
    font-size: 24px;
}

.showTable{
	border: 2px solid #333;
	border-radius: 12px;
	margin-top: 20px;
    padding: 20px;
}



.showTable table{
	align-items: center;
	width: 100%;
    border-collapse: collapse;
	border-radius: 10px;
}

.showTable th, .showTable td {
    padding: 8px;
    border: 1px solid #333;
    text-align: left;
	font-weight: 600;
}

.showTable th {
    background-color: #444;
	color: wheat;
}

</style>

<header>
	<h1>
		Administrator Dashboard
	</h1>
</header>

<div class="row no-gutters">
	<div class="col-md-3 d-flex justify-content-center">
		<div class="box rounded">
			<h2>Pending Request</h2>
			<span class="num">
				<?php 
					require_once('../includes/accounts.php'); // Adjust the path accordingly
					$pending_requests_count = User::countPendingRequests();
					echo $pending_requests_count;
				?>
			</span>
		</div>
	</div>

	<div class="col-md-3 d-flex justify-content-space-around">
		<div class="box rounded">
			<h2>Client Requests</h2>
			<span class="num">
				<?php 
					require_once('../includes/accounts.php'); // Adjust the path accordingly
					$pending_requests_count = User::countPendingClientRequests();
					echo $pending_requests_count;
				?>
			</span>
		</div>
	</div>

	<div class="col-md-3 d-flex justify-content-space-around">
		<div class="box rounded">
			<h2>Pending Request</h2>
			<span class="num">
				<?php 
					require_once('../includes/accounts.php'); // Adjust the path accordingly
					$pending_requests_count = User::countPendingRequests();
					echo $pending_requests_count;
				?>
			</span>
		</div>
	</div>

	<div class="col-md-3 d-flex justify-content-space-around">
		<div class="box rounded">
			<h2>Pending Request</h2>
			<span class="num">
				<?php 
					require_once('../includes/accounts.php'); // Adjust the path accordingly
					$pending_requests_count = User::countPendingRequests();
					echo $pending_requests_count;
				?>
			</span>
		</div>
	</div>


</div>



<div class="showTable">
	
<?php 
    // Fetch pending client requests
    $pending_requests = User::getPendingClientRequests();

    // Check if there are any pending requests
    if (!empty($pending_requests)) {
        // Display table headers
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Request</th>";
        echo "<th>Status</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Display each pending request as a table row
        foreach ($pending_requests as $request) {
            echo "<tr>";
            echo "<td>" . $request->Fname . "</td>";
            echo "<td>" . $request->Lname . "</td>";
            echo "<td>" . $request->Request . "</td>";
            echo "<td>" . $request->Status . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        // If there are no pending requests, display a message
        echo "No pending requests found.";
    }
    ?>
	
</div>



