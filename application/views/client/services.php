<?php include 'includes/header.php'; ?>
<?php include 'includes/main.php'; ?>
<h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Our Services</h1>
</div>
</div>
</div>
</section>

<style type="text/css">
img{
  border-radius: 50%;
}
</style>

<section class="ftco-section ftco-services">
<div class="container">
<div class="row justify-content-center mb-5 pb-5">
<div class="col-md-7 text-center heading-section ftco-animate">
<h2 class="mb-2">Our Service Keeps you Smile</h2>
<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
</div>
</div>
<div class="row">
	<?php foreach($treatment_data as $treatment)
	{ ?>
<div class="col-md-3 d-flex align-self-stretch ftco-animate">
<div class="media block-6 services d-block text-center">
 <div class="icon d-flex justify-content-center align-items-center">

<span><img src="<?php echo base_url().$treatment['treatment_pic'];?>" style="width:150px; height: 130px;"></span>
</div>
	<div class="media-body p-2 mt-3">
    <h3 class="heading"><?php echo $treatment['treatment_name'];?></h3>
    <?php echo $treatment['description'];?>
</div>
</div>
</div>
<?php } ?>
</div>
</div>

</section>

<?php include 'includes/footer.php'; ?>
