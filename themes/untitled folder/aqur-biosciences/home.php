<?php
/*
Template Name: Home page
*/
?>

<div class="mainBlockMainPage">
	<?php
		get_header();
	?>
	<img src="<?php echo get_template_directory_uri();?>/inc/images/ImageForMainPage.png" alt="" class="imageForMainPage">
    <div class="mainPageText">
        <h1>Aqur Biosciences, Inc.</h1>
        <p>Clinical-stage biopharmaceutical company that seeks to discover, develop, and commercialize the next-generation of affordable non-statin prescription medicines to reduce Low-Density Lipoprotein Cholesterol (LDL-C), which are the number one prescribed pharmaceuticals in the United States. Aqur's proprietary compounds are a PCSK9 inhibitor, which potentially may, subject to further testing and approval, significantly lower LDL-C.</p>
    </div>
</div>


<?php
    get_footer();
?>