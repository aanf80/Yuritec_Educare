<?php  

if ($this->session->userdata('site_lang')=="spanish" ||$this->session->userdata('site_lang')==null ){
        $rights = "Todos los derechos reservados";  
}else{
    $rights = "All rights reserved";
}



?>
</div><!-- /container-->
<div class="foot-nav">
    <div class="container">
        <ul>
            <div class="clearfix"></div>
        </ul>
    </div>
</div>
<!-- footer-bottom -->
<div class="copyright">
    <div class="container">
        <p>© 2017 Yuritec Educare: Revista Científica del Instituto Tecnológico de Tepic. <?php echo $rights; ?>.</p>


    </div>
</div>


</body>
</html>