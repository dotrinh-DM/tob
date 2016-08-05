<script type="text/javascript" src="http://topofbeauty.local/public/home/js/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
    // Load this script once the document is ready
    $(document).ready(function () {

        // Get all the thumbnail
        $('div.thumbnail-item').mouseenter(function (e) {

            // Calculate the position of the image tooltip
            x = e.pageX - $(this).offset().left;
            y = e.pageY - $(this).offset().top;

            // Set the z-index of the current item,
            // make sure it's greater than the rest of thumbnail items
            // Set the position and display the image tooltip
            $(this).css('z-index', '15')
            .children("div.tooltip")
            .css({'top': y + 10, 'left': x + 20, 'display': 'block'});

            }).mousemove(function (e) {

            // Calculate the position of the image tooltip
            x = e.pageX - $(this).offset().left;
            y = e.pageY - $(this).offset().top;

            // This line causes the tooltip will follow the mouse pointer
            $(this).children("div.tooltip").css({'top': y + 10, 'left': x + 20});

            }).mouseleave(function () {

            // Reset the z-index and hide the image tooltip
            $(this).css('z-index', '1')
            .children("div.tooltip")
            .animate({"opacity": "hide"}, "fast");
            });

    });


    </script>
    <style>

        .thumbnail-item {
    /* position relative so that we can use position absolute for the tooltip */
    position: relative;
    float: left;
    margin: 0px 5px;
        }

        .thumbnail-item a {
    display: block;
}

        .thumbnail-item img.thumbnail {
    border: 3px solid #ccc;
        }

        .tooltip {
    /* by default, hide it */
    display: none;
    /* allow us to move the tooltip */
    position: absolute;
    /* align the image properly */
    padding: 8px 0 0 8px;
            z-index: 9999;
        }

        .tooltip span.overlay {
    /* the png image, need ie6 hack though */
    background: url("<?php echo base_url(); ?>/public/home/images/overlay.png") no-repeat;
            /* put this overlay on the top of the tooltip image */
            position: absolute;
            top: 0px;
            left: 0px;
            display: block;
            width: 350px;
            height: 200px;
        }
        .img-in-tooltips{
    float: right;
    position: absolute;
    left: 216px;
            top: 21px;
        }
        .tooltip p{
    width: 200px;
            margin-left: 16px;
        }
        }
    </style>
    <div class="thumbnail-item">
        <a href="#">Hay lam</a>
        <div class="tooltip">
            <p>At vero eos et accusamus et iusto odio dolores et quas molesti</p>
            <img class="img-in-tooltips" src="<?php echo base_url(); ?>public/home/images/big1.jpg" alt="" width="110" height="110"/>
            <span class="overlay"></span>
        </div>
    </div>