<?php 
	session_start();
	include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Privacy Policy</title>
<link href="Content/bootstrap.css" rel="stylesheet"/>
<script src="Scripts/jquery-1.9.1.js"></script>
<script src="Scripts/bootstrap.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$("#test").keyup(function() {
    var val = $("#test").val();
    if (parseInt(val) < 0 || isNaN(val)) {
        alert("Please Enter Only Numeric Values");
        $("#test").val("");
        $("#test").focus();
    }
});
});

</script>

</head>
<form action="privacypolicy.php" method="post">
<body>
<div class="row">
<div class="col-md-12 col-sm-12">
<?php 
if(isset($_SESSION["email"]))
{
	require 'headerwithlogin.php';
	
}
else
{
	require 'header.php';
}

?>	
</div>
</div>
<div class="row">
<div class="col-md-12 col-sm-12">
<?php 
require 'catheader.php';
?> 
</div>
</div>


<div class="container"> 
<div class="row">
	<h1 style="color:blue; font-size:50px;"><center>Privacy Policy</center></h1>
</div>
</div>

<br>

<h3> Our Privacy Philosophy </h3>

CITYHUB values your privacy and respects your personal sphere of life. We are committed to maintaining your confidence and trust with respect to the information we collect about you. We maintain strict confidentiality and the data collected is only used to serve you better and to improve your overall experience.

<h3> Privacy for the organiser </h3>

We collect information related to your event through ‘do it yourself’ mode. The information you provide to host your event includes your organization details, details of the representative, details of the event and pricing for your event. Through the process, information related to saleability, etc of your event is collected. As part of the process, we also collect information of your Bank account, Tax identification number, etc., to facilitate payments. Sometimes we might also collect your information from external agencies or websites.<br><br>

In order to access features and services of CITYHUB, You must register and obtain a personalised username and password. Your personal information can only be retrieved by supplying the correct username and password linked to your profile.<br><br>

We understand that your privacy is important, and therefore, we endeavour to keep your personal information secured. The personal information of each organiser is stored on servers that are behind a firewall and are housed within secured data centres provided by established global players.<br><br>

We use the data collected only to improve features, research and to facilitate secured payments.<br><br>

Our internal policies and systems protect your privacy by limiting unauthorized employee access to use of your personal information.<br>

<h3> Privacy for the attendee </h3>

We collect your personal information, location, contact details, interests, etc. As part of our policy, we also collect information about your credit and debit cards to facilitate payments. However, we do not store your card details. We only use services of established third party players for all payment-related services.<br><br>

As part of our marketing campaigns, we also collect your information from external agencies or websites, which, in turn, is used for client servicing and marketing.<br><br>

In order to access features and services of CITYHUB, You must register and obtain a personal username and password. Your personal information can only be retrieved by supplying the correct username and password linked to your profile.<br><br>

We understand that your privacy is important, and therefore, we endeavour to keep your personal information secured. The personal information of each attendee is stored on servers that are behind a firewall and are housed within secured data centres provided by established global players.<br><br>

We use the data collected to improve our features, research and to facilitate secured payments.<br><br>

Our internal policies and systems protect your privacy by limiting unauthorized employee access to use of your personal information.<br>

<h3> Cookies </h3>

CITYHUB also collects information through the use of cookies. Cookies are anonymous, and unique alphanumeric identifiers sent from our website and stored in your web browser while you are browsing. With the use of these cookies, we collect your Internet Protocol (IP) address used to connect your computer to internet. We collect information such as your browser type and version, operating system and the content you viewed or searched on the CITYHUB website.<br>

<h3> Personalization </h3>

We use the above information along with a stream of algorithms for tailoring and customizing content or design of CITYHUB website. We also use the information such as interests, characteristics, etc., for our research and development in order to enhance product features, recommendations, saleability, etc.<br>

<h3> Exclusions </h3>

I-n the event of you voluntarily disclosing personally identifiable information along with any substantive content on your social media page or CITYHUB social media page, such activities are beyond the control of CITYHUB. CITYHUB does not monitor or secure such information that can be collected, correlated and used by third parties from sources that are not secured. This may also result in unsolicited messages from third parties.<br><br>

CITYHUB may contain links to other websites that are beyond our control, being a DIY platform. In the event of you choosing to access such websites, CITYHUB is not responsible for any actions or policies of such third parties. We recommend to you to check the privacy policy of such websites before submitting any information with them.<br>

<h3> Children </h3>

CITYHUB is a DIY (Do It Yourself) platform and meant for general audience. We do not specifically intend to service children under the age of 13 years and hence do not collect any information in this regard, unless it is an event for all age groups and is permitted by law. CITYHUB usually targets an audience that is over the age of 18. If you are a parent or guardian of a child under 13 and believe that he or she has disclosed personal information to us, please contact us.<br>

<h3> Modification </h3>

We review our policies from time to time and make necessary changes whenever required. Any changes to our privacy policy will be posted on this page so that you are always aware of our policies.<br>

<h3> Contact </h3>

We always invite your comments and questions about CITYHUB website, its services and user interface. Please Contact Us for any queries, feedback and issues.<br><br>

If at any time you believe that we have not adhered to this Privacy Policy, please write to us. CITYHUB will put reasonable efforts to promptly investigate and resolve disputes.<br>
<br><br><br>

<?php include'footer.php'; ?>

</body>
</form>
</html>