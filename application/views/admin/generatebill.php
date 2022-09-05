  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="<?= USER_PATH?>images/icon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">

  .table1 {
  /*border-collapse: collapse;*/
  width: 100%;
  }

  th, td {
  padding: 5px;
  }

  tr:nth-child(even){background-color: #f2f2f2}

  th {
      background-color:  #3399ff;
      color: white;
  }
  .table2 {
    width: 50%;
   }
</style>
<table class="table1">
    <tr>
      <td>
          <h3>&nbsp;  &nbsp; D 103, DentShine Clinic,<br>
          &nbsp;  &nbsp;  Opp. Town Hall,<br>
          &nbsp;   &nbsp; Sardar Patel Road,piplod<br>
          &nbsp;  &nbsp; Surat - 395007</h3>
      </td>
      <td align="right"><img  src="<?= ASSETS_PATH?>img/logo.png"></td>
    </tr>

    <tr>
      <td colspan="2" align="center"><font><h2><b><u>Billing summary</u></b></h2></font></td>
    </tr>

    <tr>     
        <td>
            <?php 
            $no=1;
            foreach ($bill_data as $bill)
            { ?> 
              <font size="4px"> 
            &nbsp; &nbsp; <b>Patient name : </b><?php echo $bill['patient_name'];?><br>
            &nbsp;  &nbsp; <b>Addresss : </b><?php echo $bill['address'];?><br>
            &nbsp;  &nbsp; <b>Email ID : </b><?php echo $bill['email_id'];?><br>
            </font>
        </td>
    </tr>
    <tr>
        <td align="right"  colspan="2">
          <b>Date : </b>                              
           <?php $date=getdate(date("U"));
           echo "$date[weekday], $date[month] $date[mday], $date[year]";?>
        </td>
    </tr>
</table>
<Br>
<table border="1" align="center" class="table2">
  <tr>
      <th>No</th>
      <th>Description</th> 
      <th> Qty </th>
      <th> total </th>
  </tr>
  <?php $no=1;
      $medicine_total = 0;
      foreach($bill_data as $bill)
        { ?>
          <tr>
              <td><?php echo $no++?></td>
              <td><b>Treatment-</b><?php echo $bill['treatment_name'];?></td>
              <td>-</td>
              <td><?php echo '₹'.$bill['treatment_charges'];?></td>
          </tr>

          <tr>
              <td><?php echo $no++?></td>
              <td><b>doctor charges</b></td>
              <td>-</td>
              <td><?php echo '₹'.$bill['consolation_charges'];?></td>
          </tr>
           <?php
             $medicine_total = 0;
            foreach($bill_data1 as $bill1)
            { ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $bill1['medicine_name'];?></td>
                <td><?php echo $bill1['qty'];?></td>
                <td ><b></b><?php echo  '₹'.$bill1['price']; 
                $medicine_total += $bill1['price']; ?></td>
            </tr>
            <?php } } } ?>  
            <tr>
                <td colspan="4" align="right"><b>Total Amount:<?php $Total_Amount=(int)$bill['treatment_charges'] +(int)$bill['consolation_charges'] + $medicine_total;
                  echo '₹'.$Total_Amount;?></b>
                </td>            
            </tr>
</table>            
            
 <br> 
 &nbsp;                
 &nbsp;                
<button type="button">
  <a href="javascript:window.print();"><i class="fa fa-print" style="font-size: 20px"></i>Print</a>
</button>
                  
                    
                       
                     
           

