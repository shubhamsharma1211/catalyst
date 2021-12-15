<footer>
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php dynamic_sidebar('footer-content'); ?>
                </div>
                <div class="col-sm-3">
                    <?php dynamic_sidebar('company-address'); ?>
                </div>
                <div class="col-sm-3">
                    <?php dynamic_sidebar('company-info'); ?>
                    <div class="social-icon-section-wrapper">
                        <?php dynamic_sidebar('social-link'); ?>
                    </div>
                </div>
            </div>                     
            <div class="copyright-section">
                <p>Copyright © CT Solutions Private Limited <?php echo date('Y'); ?>. All rights reserved.</p>
            </div>
        </div>
    </div> 
</footer>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6006f935c31c9117cb70368c/1esdjqudp';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<?php wp_footer(); ?>
</body>
</html>