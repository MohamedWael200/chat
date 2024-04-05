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
                <form action="{{route('updatePicture',$Pictures->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="right">
                        <h2>Info</h2>
                        <input type="text" name="name" value="{{$Pictures->name}}" class="field" placeholder="Picture Name">
                        <input type="file" name="photo" value="{{$Pictures->path}}" class="field" >
                        <select name="albom" id="res" class="field" width="100" >
                            @foreach($albom as $alboms)
                                <option @if($alboms->id ==$Pictures->id) selected @endif value="{{$alboms->id}}">
                                    {{$alboms->name}}
                                </option>
                            @endforeach
                        </select>
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
