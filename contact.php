<?php
//database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "mascotsb";

$conn = mysqli_connect($servername , $username ,$password ,$database);

  $message_sent = false;
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    if ($name && $email && $subject && $message) {
      $to = "your-email@example.com"; 
      $headers = "From: $email\r\n";
      $headers .= "Reply-To: $email\r\n";
      $headers .= "Content-type: text/html\r\n";

      //Inserting data
      $sql = "INSERT INTO inquiry (name, email, subject, message, date) VALUES ('$name', '$email',' $subject',' $message', current_timestamp())";

      $result = mysqli_query($conn,$sql);

      //Submited done or not
      if($result){
        echo "Submmitted success.";
      }

      $body = "
        <h2>New Contact Form Message</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong><br>$message</p>
      ";

      if (mail($to, $subject, $body, $headers)) {
        $message_sent = true;
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact Us - MascotsB</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    h2, h3 {
      color: #fe3f40;
    }
    .text-primary {
      color: #fe3f40 !important;
    }
    .btn-primary {
      background-color: #fe3f40 !important;
      border: none;
    }
  </style>
</head>
<body class="font-sans text-gray-800 bg-white">

<!-- Navbar (you can copy the exact navbar HTML from index/about page) -->
<header class="header-area header-sticky bg-white border-b shadow-sm">
  <div class="container py-3 d-flex justify-content-between align-items-center">
    <a href="index.html" class="fw-bold fs-4" style="color: #007bff; text-decoration: none">
      Mascots<span style="color: #fe3f40">B</span>
    </a>
    <ul class="nav d-none d-lg-flex">
      <li><a href="index.html" class="nav-link">Home</a></li>
      <li><a href="about.html" class="nav-link">About</a></li>
      <li><a href="spoken.html" class="nav-link">Spoken English</a></li>
      <li><a href="contact.php" class="nav-link active">Contact</a></li>
    </ul>
  </div>
</header>

<div style="height: 80px"></div>

<section class="py-16 px-4 bg-gray-50">
  <div class="max-w-3xl mx-auto text-center">
    <h2 class="text-4xl font-bold text-primary mb-4">Get in Touch</h2>
    <p class="text-gray-600 mb-10">We would love to hear from you. Please fill out the form below.</p>

    <?php if ($message_sent): ?>
      <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
        ✅ Your message has been sent successfully!
      </div>
    <?php endif; ?>

    <form method="POST" action="" class="space-y-6 text-left">
      <div>
        <label class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Subject</label>
        <input type="text" name="subject" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Message</label>
        <textarea name="message" rows="5" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg"></textarea>
      </div>
      <div>
        <button type="submit" class="btn btn-primary text-white px-5 py-2 rounded-lg">
          Send Message
        </button>
      </div>
    </form>
  </div>
</section>

<footer class="text-center py-4 bg-primary text-white mt-12">
  &copy; 2025 MascotsB. Designed by <a href="https://www.linkedin.com/in/divyeshrupala157" class="underline">Divyesh Rupala</a>
</footer>

</body>
</html>