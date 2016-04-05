<?php   $servername = "localhost";$username = "root";$password = "";$dbname = "supermarket";$mid="";// Create connection$conn = new mysqli($servername, $username, $password, $dbname);// Check connectionif ($conn->connect_error) {    die("Connection failed: " . $conn->connect_error);}      $mid = $_COOKIE['id'];$mname= "";$sql = "select * from customer where C_ID ='".$mid."' ";$result = $conn->query($sql); if($result->num_rows > 0)    {             while($row = $result->fetch_assoc() ){          $mname = $row['Name'];       }    } ?>
<html>
<head><link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="jquery-2.2.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../Semantic/semantic.css">
        <link rel="stylesheet" type="text/css" href="../Semantic/semantic.min.css">
        <script src="../Semantic/semantic.js"></script>
        <script src="../Semantic/semantic.min.js"></script>  
		<link rel="stylesheet" type="text/css" href="../semantic1/semantic.min.css">
		<script src="../semantic1/semantic.min.js"></script>
        <script src="../Semantic/package.js">
		</script>
		<link href="style1.css" type="text/css" rel="stylesheet" />
		
		<script>
			function f()
			{
				d = document.getElementById("mmenu");	
				d.addEventListener("click",g);
			}
			function g()
			{
				d1 = document.getElementById("shop");
				d2 = document.getElementById("shop2");
				if(d1.style.display=="none")
					d1.style.display = "block";
				
				else
					d1.style.display = "none";
				
			}			function init() {     // document.getElementById("cart").innerHTML = "s";   	   if (window.XMLHttpRequest) {            // I_ID for IE7+, Firefox, Chrome, Opera, Safari            xmlhttp = new XMLHttpRequest();        } else {            // I_ID for IE6, IE5            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");        }        xmlhttp.onreadystatechange = function() {            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {               document.getElementById("cart").innerHTML = xmlhttp.responseText;            }        };		//v=document.getElementById("addc").value ;        xmlhttp.open("GET","beginc.php",true);        xmlhttp.send();    }
		</script>
		</head>
<style>

div#policy
{
position:absolute;
margin-left:15px;
}
ul
{
list-style:none;

}
li
{
padding-bottom:5px;

}

.uiv2-left-nav-container
{
	margin-left:-25px;
	margin-top:-30px;
}
div#shop
{
	position:absolute;
	background:white;
	width:220px
}
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
#tb{
	cellpadding:10;
	cellspacing:5;
	
}
#card{
width:1100px;
left:200px;
height:1000px;
}
#ad{
width:250px;
left:10px;
border:2px;
border-color:grey;
border-style: solid;
}
#mmenu{
top:-50px;

}
#ad2{
border:2px;
border-color:grey;
border-style: solid;
}
#ad1{
width:280px;
border:2px;
border-color:grey;
border-style: solid;
}
#cart{
left:-400px;
width:50px;
}
#search{
left:100px;
width:600px;
top:50px;
}
#s{
height:35px;
width:50px;
top:-10px;
}
#logo{
width:300px;
}
#myCarousel{
height:232px;
width:720px;
left:40px;
top:-30px;
}
#hb{
left:-50px;

}
#l{
width:160px;
left:8px;
top:-32px;
height:40px;
background-color:grey;
}
#r{
width:160px;
left:20px;
top:-32px;
height:40px;
background-color:black;
}
#m{
width:160px;
left:20px;
top:-32px;
height:40px;
background-color:black;

}

 #mf{
 width:160px;
left:15px;
top:-32px;
height:40px;
background-color:black;

 }  
#umenu{
left:214px;
} 
#umenu,#umenu1,#umenu2,#umenu3#menu5{

height:35px;
}
#p1{
left:400px;
}
		body{
              background:url('bg2.png');
          
          }
</style>
<script>
$('.ui.dropdown')
  .dropdown()
;</script>
<body onload="init()">
<div class="ui inverted menu">
  <a class="item">
    Location:
  </a>
  <a class="item">
    Bangalore
  </a>
  <a class="item ">
    <img src="ph.png">08024567543</img>
  </a>
  <a class="item ">
    <img src="images.png">Favourites</img>
  </a>
<div class="right menu">
    <div class="ui simple dropdown item">
      New User? <i class="dropdown icon"></i>
      <div class="menu">
        <a href="WhatIsWhatsUMarket.html" class="item">What is "what's Up market"</a>        <a href="About Us1.html" class="item">About Us</a>        <a href="Product quality.html" class="item">Product Quality</a>
      </div>
    </div>

<div class="item">
         <label>Welcome &nbsp <?php echo $mname;?></label>
    </div>
</div>

<div class="item">
        <a href="../login/login.php"><div class="ui primary button">Log out</div></a>
    </div>
</div>
<!--<div class="four wide column"></div>
<div class="ui grid container">
<div class="ui card" width="800px" height="800px"></div>
<a img="cart.png"></a>!-->
<div class="ui card" style="box-shadow: 10px 10px 5px #888888; height:2500px;" id = "card" >
<div class="ui grid container">
<div class="row">

<div class="three wide column">
    <div class="column">
<img src="logo.png" id="logo">
</div>
 
</div>
    <div class="column">
	
	<form class="navbar-form" role="search" >
	
    <div class="input-group add-on" id="search">
	
      <input type="text" class="form-control input-input-xxlarge" placeholder="Search" name="srch-term" id="srch-term"style="box-shadow: 0px 10px 5px #888888;" >
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" id="s" ><i class="glyphicon glyphicon-search"></i></button>

	  </div>
	  
	         <div class="column">

	<a href="../cart/cart1.php" ><img src="cart.png" ><span id="cart">Cart(0)</span>	</a>
	</div>
	  </div>
	  
	   </form>
	  </div>
	 
    
 

</div>
	
<div class="row">
<div class="three wide column">
<div class="ui secondary vertical menu" >
<br>

  <div class="ui fitted divider"></div>
  <a class="active item" id="mmenu" onclick="f()">
  <i class="dropdown icon"></i>
    Shops
  </a>
  
  
   <div id="shop" style="display:none" >
	  <div class="ui fitted divider"></div>
	  <div class="ui simple dropdown item" id="mmenu" style="background-color:white">
		<i class="dropdown icon"></i>
		Fruits
		<div class="menu">
		  <div class="header">Fruits</div>
		  <a class="item">Small</a>
		  <a class="item">Medium</a>
		  <a class="item">Large</a>
		</div>
	  </div>
	   <div class="ui fitted divider"></div>
	  
	  <div class="ui simple dropdown item"id="mmenu">
		<i class="dropdown icon"></i>
		Staples
		<div class="menu">
		  <div class="header">Text Size</div>
		  <a class="item">Small</a>
		  <a class="item">Medium</a>
		  <a class="item">Large</a>
		</div>
	  </div>
	   <div class="ui fitted divider"></div>
	  <div class="ui simple dropdown item"id="mmenu">
		<i class="dropdown icon"></i>
		Diary
		<div class="menu">
		  <div class="header">Text Size</div>
		  <a class="item">Small</a>
		  <a class="item">Medium</a>
		  <a class="item">Large</a>
		</div>
	  </div>
	   <div class="ui fitted divider"></div>
	<div class="ui simple dropdown item"id="mmenu">
		<i class="dropdown icon"></i>
		Meat
		<div class="menu">
		  <div class="header">Text Size</div>
		  <a class="item">Small</a>
		  <a class="item">Medium</a>
		  <a class="item">Large</a>
		</div>
	  </div>
	   <div class="ui fitted divider"></div>
	<div class="ui simple dropdown item"id="mmenu">
		<i class="dropdown icon"></i>
		Household
		<div class="menu">
		  <div class="header">Text Size</div>
		  <a class="item">Small</a>
		  <a class="item">Medium</a>
		  <a class="item">Large</a>
		</div>
	  </div>
	   <div class="ui fitted divider"></div>
	<div class="ui simple dropdown item"id="mmenu">
		<i class="dropdown icon"></i>
		Personal Care
		<div class="menu">
		  <div class="header">Text Size</div>
		  <a class="item">Small</a>
		  <a class="item">Medium</a>
		  <a class="item">Large</a>
		</div>
	</div>
  </div>
  
 <div class="uiv2-left-nav-container">	<div class="uiv2-left-nav-block">	<ul>		<li><a class="active" href="WhatIsWhatsUMarket.php">About What's Up Market!</a>			<ul  style="margin-left:-19px; margin-top:5px">				<li><a href="WhatIsWhatsUMarket.php">- What is What's Up &nbsp;&nbsp;Market ?</a></li>				<li><a href="WhatIsWhatsUMarket.php">- Why shop here ?</a></li>								<li><a href="WhatIsWhatsUMarket.php">- How to Order ?				</a></li>				<li><a href="WhatIsWhatsUMarket.php">- Who all can use ?</a></li>							</ul>		</li>				<li><a href="privacy_Plocy.php">Privacy Policy</a></li>		<li><a href="TermsConditions.php">Terms &amp; Conditions</a></li>		<li><a href="FAQ.php">FAQ's</a></li>		<li><a href="About Us1.php">Contact Us</a></li>	</ul></div>	</div>

  </div>

</div>

<div id="policy">
<p ><h3>&nbsp;Privacy Policy</h3></p>
Privacy Policy
We value the trust you place in us. That's why we insist upon the highest standards for secure transactions and customer information privacy. Please read the following statement to learn about our information gathering and dissemination practices.
Note:
Our privacy policy is subject to change at any time without notice. To make sure you are aware of any changes, please review this policy periodically.

By visiting this Website you agree to be bound by the terms and conditions of this Privacy Policy. If you do not agree please do not use or access our Website.

By mere use of the Website, you expressly consent to our use and disclosure of your personal information in accordance with this Privacy Policy. This Privacy Policy is incorporated into and subject to the Terms of Use.</p>
<p><h4>1. Collection of Personally Identifiable Information and other Information</h4>
When you use our Website, we collect and store your personal information which is provided by you from time to time. Our primary goal in doing so is to provide you a safe, efficient, smooth and customized experience. This allows us to provide services and features that most likely meet your needs, and to customize our Website to make your experience safer and easier. More importantly, while doing so we collect personal information from you that we consider necessary for achieving this purpose.
<br/><br/>
In general, you can browse the Website without telling us who you are or revealing any personal information about yourself. Once you give us your personal information, you are not anonymous to us. Where possible, we indicate which fields are required and which fields are optional. You always have the option to not provide information by choosing not to use a particular service or feature on the Website. We may automatically track certain information about you based upon your behaviour on our Website. We use this information to do internal research on our users' demographics, interests, and behaviour to better understand, protect and serve our users. This information is compiled and analysed on an aggregated basis. This information may include the URL that you just came from (whether this URL is on our Website or not), which URL you next go to (whether this URL is on our Website or not), your computer browser information, and your IP address.
<br/><br/>
We use data collection devices such as "cookies" on certain pages of the Website to help analyse our web page flow, measure promotional effectiveness, and promote trust and safety. "Cookies" are small files placed on your hard drive that assist us in providing our services. We offer certain features that are only available through the use of a "cookie".
<br/><br/>
We also use cookies to allow you to enter your password less frequently during a session. Cookies can also help us provide information that is targeted to your interests. Most cookies are "session cookies," meaning that they are automatically deleted from your hard drive at the end of a session. You are always free to decline our cookies if your browser permits, although in that case you may not be able to use certain features on the Website and you may be required to re-enter your password more frequently during a session.
<br/><br/>
Additionally, you may encounter "cookies" or other similar devices on certain pages of the Website that are placed by third parties. We do not control the use of cookies by third parties.
<br/><br/>
If you choose to buy on the Website, we collect information about your buying behaviour.
<br/><br/>
If you transact with us, we collect some additional information, such as a billing address, a credit / debit card number and a credit / debit card expiration date and/ or other payment instrument details and tracking information from cheques or money orders.
<br/><br/>
If you choose to post messages on our message boards, chat rooms or other message areas or leave feedback, we will collect that information you provide to us. We retain this information as necessary to resolve disputes, provide customer support and troubleshoot problems as permitted by law.
<br/><br/>
If you send us personal correspondence, such as emails or letters, or if other users or third parties send us correspondence about your activities or postings on the Website, we may collect such information into a file specific to you.
<br/><br/>
We collect personally identifiable information (email address, name, phone number, credit card / debit card / other payment instrument details, etc.) from you when you set up a free account with us. While you can browse some sections of our Website without being a registered member, certain activities (such as placing an order) do require registration. We do use your contact information to send you offers based on your previous orders and your interests.</p>


<p><h4>2. Use of Demographic / Profile Data / Your Information</h4>
We use personal information to provide the services you request. To the extent we use your personal information to market to you, we will provide you the ability to opt-out of such uses. We use your personal information to resolve disputes; troubleshoot problems; help promote a safe service; collect money; measure consumer interest in our products and services, inform you about online and offline offers, products, services, and updates; customize your experience; detect and protect us against error, fraud and other criminal activity; enforce our terms and conditions; and as otherwise described to you at the time of collection.
<br/><br/>
In our efforts to continually improve our product and service offerings, we collect and analyse demographic and profile data about our users' activity on our Website.
<br/><br/>
We identify and use your IP address to help diagnose problems with our server, and to administer our Website. Your IP address is also used to help identify you and to gather broad demographic information.
<br/><br/>
We will occasionally ask you to complete optional online surveys. These surveys may ask you for contact information and demographic information (like zip code, age, or
income level). We use this data to tailor your experience at our Website, providing you with content that we think you might be interested in and to display content according to your preferences
</p>
<p><h4>3. With whom your information will be shared</h4> We will not use your financial information for any purpose other than to complete a transaction with you. WQe do not rent, sell or share your personal information and will not disclose any of your personally identifiable information to third parties. In cases where it has your permission to provide products or services you've requested and such information is necessary to provide these products or services the information may be shared with our business associates and partners. <br><br/>We may use this information for promotional offers, to help investigate, prevent or take action regarding unlawful and illegal activities, suspected fraud, potential threat to the safety or security of any person, violations of the Site’s terms of use or to defend against legal claims; special circumstances such as compliance with subpoenas, court orders, requests/order from legal authorities or law enforcement agencies requiring such disclosure.</p>
<p><h4>4. Security Precautions</h4>
Our Website has stringent security measures in place to protect the loss, misuse, and alteration of the information under our control. Whenever you change or access your account information, we offer the use of a secure server. Once your information is in our possession we adhere to strict security guidelines, protecting it against unauthorized access.</p>
<p>
<h4>5. Your Consent</h4>
By using the Website and/ or by providing your information, you consent to the collection and use of the information you disclose on the Website in accordance with this Privacy Policy, including but not limited to Your consent for sharing your information as per this privacy policy.
<br/><br/>
If we decide to change our privacy policy, we will post those changes on this page so that you are always aware of what information we collect, how we use it, and under what circumstances we disclose it.
</p>
</div>
<!--end!-->
</div>
</div>
</body>
</html>