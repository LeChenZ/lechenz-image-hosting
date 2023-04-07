<!DOCTYPE html>
<html>
<head>
	<title>YourSiteName - Image Hosting</title>
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>
	<header>
		<h1>YourSiteName</h1>
		<p>Host your images for free and easily</p>
	</header>
	<main>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<label for="image">Select an image to host :</label>
			<input type="file" name="image" id="image" required>
			<button type="submit">Upload</button>
		</form>
		<div id="result"></div>
	</main>
	<footer>
		<p>© 2023 YourSiteName. All rights reserved.</p>
	</footer>
	<script src="assets/script.js"></script>
</body>
</html>
