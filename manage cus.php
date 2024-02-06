<?php
// Database connection parameters
$con = new mysqli("localhost", "root", "", "musicshow");

if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
}

// Function to fetch customers from the database
function getCustomers() {
    global $con;

    // Check if the query was successful
    $result = mysqli_query($con, "SELECT * FROM customers");
    if (!$result) {
        die("Error fetching customers: " . mysqli_error($con));
    }

    $customers = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $customers[] = $row;
    }

    // Free the result set
    mysqli_free_result($result);

    return $customers;
}


// Function to add a new customer to the database
function addCustomer($customerId, $customerName, $customerEmail, $customerTicket) {
    global $con; // Change $connect to $con
    $sql = "INSERT INTO customers (customerId, customerName, customerEmail, customerTicket)
            VALUES ('$customerId', '$customerName', '$customerEmail', '$customerTicket')";

    return mysqli_query($con, $sql);
}

// Function to delete a customer from the database
function deleteCustomer($customerId) {
    global $con;
    $sql = "DELETE FROM customers WHERE id = '$customerId'";

    return mysqli_query($con, $sql);
}

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['deleteCustomerId'])) {
    $deleteCustomerId = $_GET['deleteCustomerId'];

    if (deleteCustomer($deleteCustomerId)) {
        echo "Customer deleted successfully!";
    } else {
        echo "Error deleting customer: " . mysqli_error($con);
    }
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addCustomer"])) {
        $customerId = $_POST["customerId"];
        $customerName = $_POST["customerName"];
        $customerEmail = $_POST["customerEmail"];
        $customerTicket = $_POST["customerTicket"];

        if (addCustomer($customerId, $customerName, $customerEmail, $customerTicket)) {
            echo "Customer added successfully!";
        } else {
            echo "Error adding customer: " . mysqli_error($con);
        }
    }
}


// Fetch existing customers
$customers = getCustomers();
?>

<!-- Your HTML structure with PHP integration -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
</head>
<body>

<section class="main">
    <div class="customer-list">
        <h1>Customer List</h1>

        <!-- Display existing customers -->
      <!-- Display existing customers -->
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Ticket</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?= $customer['id']; ?></td>
                <td><?= $customer['name']; ?></td>
                <td><?= $customer['email']; ?></td>
                <td><?= $customer['ticket']; ?></td>
                <td>
                    <a href="?deleteCustomerId=<?= $customer['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    </div>

</section>

</body>
</html>
