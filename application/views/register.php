<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 align="center">GPS Tracking</h1>
        <h2>Save Data</h2>
        <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
        </div>
        <button type="submit" class="btn btn-primary" id="btnSave">Submit</button>
    </div>
    <script>
    $(document).ready(function() {
        $('#btnSave').on('click', function() {
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var phone = $('#phone').val();
            var city = $('#city').val();

            if (name != "" && email != "" && password != "" && phone != "" && city != "") {
                $("#btnSave").attr("disabled", "disabled");
                $.ajax({
                    url: "<?php echo base_url("Crud/savedata"); ?>",
                    type: "POST",
                    data: {
                        type: 1,
                        name: name,
                        email: email,
                        password: password,
                        phone: phone,
                        city: city
                    },
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        
                        if (dataResult.statusCode == 200) {
                            $("#btnSave").removeAttr("disabled");
                            $('#success').find('input:text').val('');
                            $("#success").show();
                            $('#success').html('Data added successfully !');

                        } else if (dataResult.statusCode == 201) {
                            alert("Error occurred !");
                        }

                    }
                });
            } else {
                alert('Please fill all the field !');
            }
        });
    });
    </script>
</body>

</html>