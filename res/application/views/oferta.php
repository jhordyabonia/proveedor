<html>

<head>

    <title>plantilla</title>

    <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <style >     

    img{

        width: 100%;

    }
    </style>


</head>

<body>

    <div class="well">

        <div  class="container">

            <img  src="<?php echo base_url() ?>assets/img/email/header_oferta.png" >

                <div class="col-md-4">

                    <div class="span4">

                        Nombre:
                        
                        
                    </div>

                    <div class="span4">

                      Mensaje:


                    </div>

                </div>




                <div class="col-md-8">

                    <div class="span4">

                        <?php echo  $mensaje_user?> 

                    </div>

                    <div class="span4">

                        <?php echo  $autor_email?>

                    </div>

                </div>

            <img src="<?php echo base_url() ?>assets/img/email/footer.png" >

        </div>

    </div>

</body>

</html>