<style>

body {
    background-color: #101123; ; /* Dark navy blue background */
	color: wheat;
	font-fami
}

header {
    text-align: center;
    padding: 20px 0;
}

.box {
    background-color: #444; /* Dark grey box background */
    padding: 20px;
    border-radius: 10px;
}

.num {
    font-size: 24px;
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

<!-- Chart -->



