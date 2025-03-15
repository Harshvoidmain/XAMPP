<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
  // Configure/customize these variables.
  var showChar = 1500; // How many characters are shown by default
  var ellipsestext = ".......";
  var moretext = "Show more >";
  var lesstext = "Show less";

  $(".more").each(function() {
    var content = $(this).html();

    if (content.length > showChar) {
      var c = content.substr(0, showChar);
      var h = content.substr(showChar, content.length - showChar);

      var html =
          c +
          '<span class="moreellipses">' +
          ellipsestext +
          '&nbsp;</span><span class="morecontent"><span>' +
          h +
          '</span>&nbsp;&nbsp;<a href="" class="morelink">' +
          moretext +
          "</a></span>";

      $(this).html(html);
    }
  });

  $(".morelink").click(function() {
    if ($(this).hasClass("less")) {
      $(this).removeClass("less");
      $(this).html(moretext);
    } else {
      $(this).addClass("less");
      $(this).html(lesstext);
    }
    $(this)
      .parent()
      .prev()
      .toggle();
    $(this)
      .prev()
      .toggle();
    return false;
  });
});

</script>
        <style>
.morecontent span {
    display: none;
}
.morelink {
    display: block;
}

</style>

<div class="banner">

    <div class="">

        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">
                    <ol class="breadcrumb">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="javascript::">Excellence</a></li>
                        <li class="active">About Excellence</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <h2 style="text-align:center;">About Excellence Awards</h2>
    <hr class="style17">
</div>
<div class="container" style="padding-bottom: 40px;text-align: justify;padding-left: 80px;padding-right: 80px;">
<!--<span class="more">-->
<p>For more information about IEI-BLC FCRIT Excellence Awards Brochure, <a href="../download/IEI_BLC_FCRIT_Excellence_Awards_Brochure.pdf" target="_blank" style="color: #000080; text-decoration: underline;">Click here</a> </p>
<p>For more information about Guidelines for Submission (Excellence Awards), <a href="../download/Guidelnes_for_submission_excellence_awards_2021.pdf" target="_blank" style="color: #000080; text-decoration: underline;">Click here</a> </p>
<p>For information about final awardees of IEI-BLC FCRIT Excellence Awards, <a href="../download/List of final awardees.pdf" target="_blank" style="color: #000080; text-decoration: underline;">Click here</a> </p>
</div>

<hr class="style17" style="margin-top: 10px;">

<div class="container">
    <div class="row" style="padding:50px 0px;text-align:center;padding-bottom: 0;">        <h2>IEI-BLC FCRIT Excellence Awards</h2>
    </div>
</div>
<div class="container" >
    <div style="align:center;margin-left:10px;">        
        <div>
            <?php echo "<embed src='../download/IEI_BLC_FCRIT_Excellence_Awards_Brochure.pdf' width='1200px' height='900px' align='center' />"; ?>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        </div>  
    </div> 
</div>
<!-- The Institution of Engineers (India) and Fr. C. Rodrigues Institute of Technology, Vashi (Navi Mumbai) have jointly instituted ‘IEI-FCRIT Excellence Awards’ for recognising and appreciating the excellence of Academicians and Industries in their respective domains. The major categories and sub-categories of the award are as follows. 
<br>
<br>
<div class="container">
    <div class="col-md-1"></div>
    <div class="agenda col-md-8" >
        <div class="table-responsive"  style="width:100%;margin:auto;">
            <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Award Category</th>
						<th>Award Sub-Category </th>
					</tr>
			    </thead>
                <tbody>
                 <tr>
                        <th>1</th>
                        <th>Research Excellence</th>
						<th>- Students (UG)<br>- Students (PG)<br> - Students (PhD)<br> - Teaching Faculty<br> - Researcher from Industry <br>- Researcher from Govt. Organization</th> 
						
                 </tr>
				 <tr>
                        <th>2</th>
                        <th>Academic Excellence</th>
						<th>- Student <br>- Teaching Faculty <br> - Head of the Department <br>- Principal </br>- Institute</th>
                 </tr>
				 <tr>
                        <th>3</th>
                        <th>Industry Excellence</th>
						<th>- Contribution towards Technology Development <br>- Contribution towards Society<br> - Contribution towards Education</th>
                 </tr>

                 <tr>
                        <th>4</th>
                        <th>Start-up Excellence</th>
						<th>- New category to encourage start up ventures</th>
                 </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>


<ul style="list-style-type:square margin-left:50px">
<li> The awards will be given during the 4th IEEE & IAS Technically co-sponsored Biennial International
Conference on Nascent Technologies in Engineering 2021 (ICNTE 2021) to be held at Fr. C.
Rodrigues Institute of Technology, Vashi on January 15-16, 2021.</li><br>
<li>In each sub-category, only one award will be given after the blind review of the
application/proposal received. Award consists of memento and certificate.</li><br>
<li>Age of the candidates submitting nominations in the Students' categories should not be more than 35 years.</li><br>
<li>The credentials of the shortlisted candidates will be verified by the review committee.</li><br>
<li>A nomination fee of Rs. 1,180/- (including 18% GST) will be charged to each proposal in every sub-category to take
care of the logistics and honorarium.</li><br>
<li>The interested and deserving candidates can submit their nominations online (Visit
https://icnte.fcrit.ac.in and look for Additional Events Under ICNTE 2021).</li><br>
<li>The Excellence Award Laureates will be intimated through email for the valedictory function of ICNTE 2021 on 15-16 January 2021.</li><br>
<li>Last date of application is 20/11/2020.</li><br>
<li>In case of any doubts/clarifications, please mail to megha.kolhekar@fcrit.ac.in (Contact No. +919892346193).</li><br>
 
</ul>
</div>

<h4><b><center>Information Required from the Nominees in each Category/Sub-Category </center></b></h4>

<div class="container">
    <div class="col-md-1"></div>
    <div class="agenda col-md-8" >
        <div class="table-responsive"  style="width:125%;margin:auto;">
            <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                        <th style="width:5%;">Sr.No</th>
                        <th style="width:20%;">Award Category</th>
						<th style="width:30%;">Award Sub-Category </th>
						<th style="width:70%;">Information Required</th>
                    </tr>
			    </thead>
                <tbody>
				<tr>
                 <tr>
                        <th rowspan=4 style="margin-left:5px">1</th>
                        <th rowspan=4>Research Excellence</th>
						<th style="width:35%;">- Students (UG)<br>- Students (PG)<br> - Students (PhD)</th>
						<th > Project/Dissertation/Thesis details, patents filed, papers published in the Journals (give impact factor of the Journal), and other research based achievements.</th>
				</tr>	
				 <tr>
					<th> - Teaching Faculty</th>
					<th> Research/consultancy projects handled, laboratories developed, patents filed, papers published in the Journals (give impact factor of the Journal), and other research based achievements.</th>
					
                 </tr>
				<tr>
					<th>- Researcher from Industry <br> - Researcher form Govt.Organization </th>
					<th>Research projects handled, patents filed, papers published in the Journals (give impact factor of the Journal), and other research based achievements. </th>
				</tr>
				</tr>
				<tr>
				<tr>
                        <th rowspan=6 style="margin-left:5px">2</th>
                        <th rowspan=6>Academic Excellence</th>
						<th style="width:35%;">- Students (UG)</th>
						<th > Results of all the semesters, ranks, scholarships received, and other academics based achievements</th>
				</tr>	
				 <tr>
					<th>- Teaching Faculty </th>
					<th> New teaching methods developed, special contribution in academics, new courses developed, awards received, and other academics based achievements.</th>
					
                 </tr>
				<tr>
					<th>-Head of the Department </th>
					<th>Special contribution in academics, awards received in the capacity of HOD, new schemes implemented in the department to motivate faculty and improve quality of academics, and other academics based achievements as a HOD. </th>
				</tr>
				<tr>
					<th>- Principal </th>
					<th>Special contribution in academics, awards received in the capacity of Principal, new schemes implemented in the institute to motivate faculty and improve quality of academics, and other academics based achievements as a Principal.</th>
				</tr>
				
				<tr>
					<th>- Institute</th>
					<th>Special contribution in academics, NIRF rank, and other academics based achievements at the institute level.</th>
				</tr>
				</tr>
				<tr>
				<tr>
                        <th rowspan=3 style="margin-left:5px">3</th>
                        <th rowspan=3>Industry Excellence</th>
						<th style="width:35%;">- Contribution towards Technology Development </th>
						<th > Patents and other detailed relevant information with adequate proofs which may be web-link or other references. Photos of the information printed in newspaper or magazine can be uploaded to support the text filled in the Nomination Form.</th>
				</tr>	
				 <tr>
					<th> - Contribution towards Society </th>
					<th> Detailed relevant information with adequate proofs which may be web-link or other references. Photos of the information printed in newspaper or magazine can be uploaded to support the text filled in the Nomination Form. </th>
					
                 </tr>
				<tr>
					<th>- Contribution towards Education </th>
					<th>Awards sponsored to the educational institutes for students and other detailed relevant information with adequate proofs which may be web-link or other references. Photos of the information printed in newspaper or magazine can be uploaded to support the text filled in the Nomination Form. </th>
				</tr>
				
				</tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container" style="padding-bottom: 40px;text-align: justify;padding-left: 80px;padding-right: 80px;">
Compile the information supporting the candidature for an award in single PDF document and submit it along with the Nomination Form 
</div> -->

  	    <?php include 'footer.php'; ?>
</html>