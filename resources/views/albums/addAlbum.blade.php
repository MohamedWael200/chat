<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{asset('form/style.css')}}">

	<title> Add Admin Info</title>
</head>
<body>


		<!-- MAIN -->
		<main>
			<!-- form Add Info -->
			<div class="contact-box">
			<div class="lefts"></div>
                <form action="{{route('add-albom')}}" method="post">
                    @csrf
                    <div class="right">
                        <h2>Info</h2>
                        <input type="text" name="name" class="field" placeholder="Album Name">
                        <button class="btn">Send</button>
                    </div>
                </form>

            </div>


		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="{{asset('form/script.js')}}"></script>
</body>
</html>
