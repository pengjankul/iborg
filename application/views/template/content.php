<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout Horizontal - Mazer Admin Dashboard</title>
    
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    
    <link rel="stylesheet" href="assets/css/shared/iconly.css">
    <?php echo $this->template->stylesheet; ?>

</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            
            <?=$this->load->view('template/header');?>

            <div class="content-wrapper container">
                <?php echo $this->template->content; ?>
            </div>

            <?=$this->load->view('template/footer');?>
        </div>
    </div>
    
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/app.js"></script>
    <script src="assets/js/pages/horizontal-layout.js"></script>
    <script>
    var domain = '<?=base_url();?>'
    </script>
    <?php echo $this->template->javascript; ?>
</body>

</html>
