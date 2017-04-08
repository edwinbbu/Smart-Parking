<html>
<head>
	<title>Google Sign in</title>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="1017732594166-dqk5npqjengpiq2p3nqvh5jttu2803th.apps.googleusercontent.com">
</head>
<body>
	<h2>Google Sign In</h2>
	<form action="success.php" method="POST">
	<div class="g-signin2" data-onsuccess="onSignIn"></div>
	</form>
	<script type="text/javascript">
  	function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
</script>
<a href="#" onclick="signOut();">Sign out</a>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script>
</body>
</html>