<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      
      <form action="{{ $url }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="Fist Name" class="form-label">First Name</label>
          <input type="text" name="first_name" class="form-control" id="first_name" value="{{ $user->first_name }}">
        </div>
  
        <div class="mb-3">
          <label for="Last Name" class="form-label">Last Name</label>
          <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $user->last_name }}">
        </div>
  
        <div class="mb-3">
          <label for="Email" class="form-label">Email</label>
          <input type="text" name="Email" class="form-control" id="Email" value="{{ $user->Email}}">
        </div>
  
        <div class="mb-3">
          <label for="Password" class="form-label">Password</label>
          <input type="text" name="password" class="form-control" id="Password">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status (Active: 0 / Inactive: 1)</label>
            <input type="number" name="status" class="form-control" id="status" value="{{ $user->status }}">
        </div>
  
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
