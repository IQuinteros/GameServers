<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing: User</title>

    <?= require_once __DIR__.('/../../components/include.php'); ?>
</head>
<body>
    
    <h1>Testing User</h1>

    <h2>Add User</h2>
    <form id="add-form" name="add-form" method="post" enctype="multipart/form-data">
        <input id="add-name" name="name" type="text" placeholder="name" required>
        <input id="add-email" name="email" type="email" placeholder="email" required>
        <input id="add-pass" name="pass" type="password" placeholder="password" required>
        <input id="add-image" name="image" type="file" accept="image/x-png,image/gif,image/jpeg" required>
        <input id="add-members" name="membersNum" type="number" placeholder="Members" required>
        <input id="add-contact" name="contactNum" type="tel" placeholder="Contact Number" required>
        <input id="add-location" name="location" type="text" placeholder="Location" required>

        <input type="submit" value="Enviar">
    </form>

    <h2>Get users</h2>
    <input id="get-text" name="text" type="text" placeholder="search" required>

    <div id="get-table">

    </div>

    <h2>Login User</h2>
    <form id="search-form" name="search-form" method="post" enctype="multipart/form-data">
        <input id="search-email" name="email" type="email" placeholder="email" required>
        <input id="search-pass" name="pass" type="password" placeholder="password" required>

        <input type="submit" value="Enviar">
    </form>

    <h2>Result User</h2>
    <p>Nombre: <span id="display-name">Sin buscar</span></p>
    <p>Imagen:</p><img id="display-image" src="" alt="Sin buscar">
    
    <script>

        $(document).ready(function (e) {
            $("#add-form").on('submit',(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "../../responses/user/add_user_resp.php",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend : function(){
                        console.log('Loading');
                    },
                    success: function(data){
                        $("#add-form")[0].reset(); 
                        console.log(data);
                    },
                    error: function(e) {
                    }          
                });
            }));

            $("#search-form").on('submit',(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "../../responses/user/get_user_resp.php",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend : function(){
                    },
                    success: function(data){
                        console.log(data);
                        $('#display-name').text(data.name);
                        $('#display-image').attr("src",data.image);
                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }          
                });
            }));

            $("#get-text").on('keyup', function(e){
                $.ajax({
                    url: "../../responses/user/get_users_resp.php",
                    type: "POST",
                    data:  { text: $("#get-text").val() },
                    //contentType: false,
                    //cache: false,
                    //processData:false,
                    beforeSend : function(){
                    },
                    success: function(data){
                        $("#get-table").empty();
                        console.log(data);

                        for(let elem in data){
                            $("#get-table").append(data[elem].email);
                            $("#get-table").append(`<br>`);
                        }
                        
                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }          
                });
            });
        });

    </script>
</body>
</html>