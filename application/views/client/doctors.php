<?php include 'includes/header.php';?>
<?php include 'includes/main.php';?>

<h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Well Experienced Doctors </h1>
</div>
</div>
</div>
</section>

<style type="text/css">
img{
  border-radius: 50%;
}
</style>
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center mb-5 pb-5">
<div class="col-md-7 text-center heading-section ftco-animate">
<h2 class="mb-3">Meet Our Experience Dentist</h2>
<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences</p>
</div>
</div>

<div class="row">
  <?php foreach($doctor_data as $doctor)
  { ?>
<div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
<div class="staff">
<div class="img mb-4"><img src="<?php echo base_url().$doctor['doctor_image'];?>" style="width:190px; height: 200px;" ></div>
<div class="info text-center">
<h3><a href="teacher-single.html"><?php echo $doctor['doctor_name'];?></a></h3>
<span class="position">Dentist</span>
<div class="text">
<p><?php echo $doctor['degree'];?></p>
<ul class="ftco-social">


<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
</ul>
</div>
</div>
</div>
</div>

<?php } ?>
</div>
</div>
</section>

<?php include 'includes/footer.php';?>