<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
	$errors = [];

	$image = $_FILES['image'];

	$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
	if (!in_array($image['type'], $allowedTypes)) {
		$errors[] = 'This file type is not allowed';
	}

	if ($image['size'] > 10000000) {
		$errors[] = 'The file size exceeds the allowed limit (10 MB)';
	}

	if (empty($errors)) {
		$uploadDir = 'uploads/';
		$uploadFile = $uploadDir . uniqid() . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
		if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
			$link = 'https://yourdomains.com/' . $uploadFile;
			echo '<input type="text" id="link-input" value="' . $link . '" readonly>';
			echo '<button type="button" id="copy-button" onclick="copyLink()">Copy the link</button>';
		} else {
			echo 'An error occurred while sending the file';
		}
	} else {
		foreach ($errors as $error) {
			echo $error . '<br>';
		}
	}
}
?>

<script>
function copyLink() {
	var linkInput = document.getElementById("link-input");
	linkInput.select();
	document.execCommand("copy");
	alert("The link has been copied to the clipboard!");
}
</script>
