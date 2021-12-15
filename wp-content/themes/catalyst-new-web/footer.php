<footer>
  <div class="footer-background-img" style="background-image: url('https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Footer-BG-1.svg')">
      <div class="container footer-wrapper">
          <div class="row footer-section">
             <div class="col-sm-3 col-6">
                <div class="footer-widget-area">
                    <?php dynamic_sidebar('footer1'); ?>
                </div>
             </div>
             <div class="col-sm-3 col-6">
                <div class="footer-widget-area">
                    <?php dynamic_sidebar('footer2'); ?>
                </div>
             </div>
             <div class="col-sm-3 col-6">
                <div class="footer-widget-area">
                    <?php dynamic_sidebar('footer3'); ?>
                </div>
             </div>
             <div class="col-sm-3 col-6">
                <div class="footer-widget-area">
                    <?php dynamic_sidebar('footer4'); ?>
                </div>
             </div>
          </div>  <!--row #e1e2e6-->
          <div class="footer-logo">
             <?php dynamic_sidebar('footer5'); ?>
          </div>
      </div>
</div>
</footer>


<!--ttttttttttttttttttttttttttttttttttttttt-->

<!-- timeline -->

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $('.cntl').cntl({
                revealbefore: 300,
                anim_class: 'cntl-animate',
                onreveal: function(e) {
                    console.log(e);
                }
            });
        });
    </script>








  

































<?php wp_footer();?>

</body>
    </html>