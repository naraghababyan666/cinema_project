<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo e(env('APP_NAME')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
</head>

<style>
    p {
        font-family: 'Poppins', sans-serif;
        font-size: 1.1em;
        font-weight: 400;
        line-height: 1.5em;
        color: rgb(76, 0, 190);
    }

    a {
        color: #007bff;
        text-decoration: none;
    }
</style>

<body>
<table cellpadding="1" cellspacing="1" style="width: 100%">
    <tbody>
    <tr>
        <td colspan="3" style="background-color: #eeeeee; text-align: center; height: 75px;">



        </td>
    </tr>
    <tr>
        <td width="10%">&nbsp;</td>
        <td style="width: 800px; text-align: center">
            <?php echo $__env->yieldContent('content'); ?>
        </td>
        <td width="10%">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3" style="background-color: #eeeeee; text-align: center; height: 75px;">
            <a href="<?php echo e(env('APP_URL')); ?>">© <?php echo e(date('Y')); ?> <?php echo e(env('APP_NAME')); ?></a>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/emails/_layout.blade.php ENDPATH**/ ?>