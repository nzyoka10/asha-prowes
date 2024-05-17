<?php
// Start a new session or resume the existing session
session_start(); 

// Function to check if the user is logged in
function logged_in() {
    // Check if the session variable 'USERID' is set
    return isset($_SESSION['USERID']);
}

// Function to redirect to login.php if the user is not logged in
function confirm_logged_in() {
    if (!logged_in()) { ?>
        <script type="text/javascript">
            window.location = "login.php";
        </script>
    <?php
    }
}

// Function to redirect to login.php if the admin is not logged in
function admin_confirm_logged_in() {
    if (!isset($_SESSION['USERID'])) { ?>
        <script type="text/javascript">
            window.location = "login.php";
        </script>
    <?php
    }
}

// Function to check if the student is logged in
function studlogged_in() {
    // Check if the session variable 'IDNO' is set
    return isset($_SESSION['IDNO']);
}

// Function to redirect to index.php if the student is not logged in
function studconfirm_logged_in() {
    if (!studlogged_in()) { ?>
        <script type="text/javascript">
            window.location = "index.php";
        </script>
    <?php
    }
}

// Function to set or get a message
function message($msg = "", $msgtype = "") {
    if (!empty($msg)) {
        // Set the message and message type in session variables
        $_SESSION['message'] = $msg;
        $_SESSION['msgtype'] = $msgtype;
    } else {
        // Return the message (note: this part of the function doesn't actually return the message; you might need to adjust it based on your usage)
        return $message;
    }
}

// Function to check for and display a message
function check_message() {
    if (isset($_SESSION['message'])) {
        if (isset($_SESSION['msgtype'])) {
            // Display the message based on its type
            switch ($_SESSION['msgtype']) {
                case "info":
                    echo '<div class="alert alert-info">' . $_SESSION['message'] . '</div>';
                    break;
                case "error":
                    echo '<div class="alert alert-danger">' . $_SESSION['message'] . '</div>';
                    break;
                case "success":
                    echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
                    break;
            }
            // Unset the session variables after displaying the message
            unset($_SESSION['message']);
            unset($_SESSION['msgtype']);
        }
    }
}

// Function to set or get the active key
function keyactive($key = "") {
    if (!empty($key)) {
        // Set the active key in a session variable
        $_SESSION['active'] = $key; 
    } else {
        // Return the active key (note: this part of the function doesn't actually return the key; you might need to adjust it based on your usage)
        return $keyactive;
    }
}

// Function to check and set the active tab based on the session or GET variable
function check_active() {
    if (isset($_SESSION['active'])) {
        switch ($_SESSION['active']) {
            case 'basicInfo':
                $_SESSION['basicInfo'] = "active";
                break;
            case 'otherInfo':
                $_SESSION['otherInfo'] = 'active';
                break;
            case 'work':
                $_SESSION['work'] = 'active';
                break;
        }
    } else {
        // Set the active tab based on the 'active' GET parameter
        $active = (isset($_GET['active']) && $_GET['active'] != '') ? $_GET['active'] : '';
        switch ($active) {
            case 'otherInfo':
                $_SESSION['otherInfo'] = 'active';
                break;
            case 'work':
                $_SESSION['work'] = 'active';
                break;
            default:
                $_SESSION['basicInfo'] = "active";
                break;
        }
    }
}
?>
