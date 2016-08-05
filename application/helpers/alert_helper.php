<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function successAlert($alert)
{
    if ($alert) {
        ?>

        <div class="alert alert-success">
            <button data-dismiss="alert" data-href="" class="close" type="button">×</button>
            <?php echo $alert; ?>
        </div><!--alert-->
    <?php
    }
}

function errorAlert($alert)
{
    if ($alert) {
        ?>
        <div class="alert alert-error">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <?php echo $alert; ?>
        </div><!--alert-->
    <?php
    }
}


function successAlert_home($alert)
{
    if ($alert) {
        ?>

        <div class="alert-success">
            <button data-dismiss="alert" data-href="" class="close" type="button"></button>
            <?php echo $alert; ?>
        </div><!--alert-->
    <?php
    }
}

function errorAlert_home($alert)
{
    if ($alert) {
        ?>
        <div class="alert-error">
            <button data-dismiss="alert" class="close" type="button"></button>
            <?php echo $alert; ?>
        </div><!--alert-->
    <?php
    }
}

function status($status)
{
    if ($status == 1) {
        echo ' Hiện';
    } else {
        echo ' Ẩn';
    }
}

function divAlert($var = '')
{ ?>
    <div class="alert alert-success">
                <button data-dismiss="alert" class="close" type="button">×</button>
                <?php echo $var; ?>
    </div>
<?php } ?>
