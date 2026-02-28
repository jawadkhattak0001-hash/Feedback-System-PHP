<?php
$conn = new mysqli("localhost","root","","feedback_db");
$success = "";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $conn->query("INSERT INTO feedback(name,email,message)
                  VALUES('$name','$email','$message')");

    $success = "Feedback submitted successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Professional Feedback System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

<style>
body{
    font-family:'Poppins',sans-serif;
    background: linear-gradient(135deg,#141E30,#243B55);
    min-height:100vh;
}
.card{
    border-radius:18px;
}
.btn-main{
    background:#ff7a18;
    border:none;
}
.btn-main:hover{
    background:#e56d12;
}
.view-btn{
    background:white;
    color:#141E30;
    font-weight:600;
    border-radius:8px;
}
.view-btn:hover{
    background:#f1f1f1;
}
</style>
</head>
<body>

<div class="container py-5">

<div class="row justify-content-center">
<div class="col-md-5">

<div class="card shadow-lg p-4">

<h3 class="text-center mb-1">Feedback Form</h3>
<p class="text-center text-muted mb-3">We value your opinion</p>

<?php if($success){ ?>
<div class="alert alert-success text-center">
<?php echo $success; ?>
</div>
<?php } ?>

<form method="POST">

<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Feedback</label>
<textarea name="message" rows="3" class="form-control" required></textarea>
</div>

<button type="submit" name="submit" class="btn btn-main text-white w-100 py-2">
Submit Feedback
</button>

</form>

<hr>

<div class="text-center">
<button class="btn view-btn px-4 py-2 shadow-sm"
        data-bs-toggle="modal"
        data-bs-target="#viewModal">
View All Feedback
</button>
</div>

</div>
</div>
</div>

</div>


<!-- POPUP WINDOW -->
<div class="modal fade" id="viewModal">
<div class="modal-dialog modal-lg modal-dialog-scrollable">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">All Feedbacks</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<table class="table table-hover">
<thead class="table-dark">
<tr>
<th>Name</th>
<th>Email</th>
<th>Feedback</th>
<th>Date</th>
</tr>
</thead>
<tbody>

<?php
$result = $conn->query("SELECT * FROM feedback ORDER BY id DESC");
while($row = $result->fetch_assoc()){
echo "<tr>
<td>{$row['name']}</td>
<td>{$row['email']}</td>
<td>{$row['message']}</td>
<td>{$row['created_at']}</td>
</tr>";
}
?>

</tbody>
</table>

</div>

</div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
