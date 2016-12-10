<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test Vuejs</title>
</head>
<body>
		<div id="app">
			<H1>@{{ message }}</H1>
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.3/vue.js"></script>
		<script>
			
			new vue ({
				el: '#app',
				data = {
					message: 'Hello world!'
				}
			});
		</script>
</body>
</html>