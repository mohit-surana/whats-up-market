<?php 
  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";
$mid="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 


$mid = $_COOKIE['id'];
$mname= "";
$sql = "select * from customer where C_ID ='".$mid."' ";
$result = $conn->query($sql);
 if($result->num_rows > 0)
    {
      
       while($row = $result->fetch_assoc() ){
          $mname = $row['Name'];
       }
    }

 
?>
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
				
			}
			function init() {
     // document.getElementById("cart").innerHTML = "s";
   
	   if (window.XMLHttpRequest) {
            // I_ID for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // I_ID for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("cart").innerHTML = xmlhttp.responseText;
            }
        };
		//v=document.getElementById("addc").value ;
        xmlhttp.open("GET","beginc.php",true);
        xmlhttp.send();
    
}
		</script>
		</head>
<style>

div#terms
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
        <a href="WhatIsWhatsUMarket.php" class="item">What is "what's Up market"</a>
        <a href="About Us1.php" class="item">About Us</a>
        <a href="Product quality.php" class="item">Product Quality</a>
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
<div class="ui card" style="box-shadow: 10px 10px 5px #888888; height:9000px;" id = "card" >
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

	<a href="../cart/cart1.php" ><img src="cart.png" ><span id="cart">Cart(0)</span>
	</a>
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
  
<div class="uiv2-left-nav-container">
	<div class="uiv2-left-nav-block">
	<ul>
		<li><a class="active" href="WhatIsWhatsUMarket.php">About What's Up Market!</a>
			<ul  style="margin-left:-19px; margin-top:5px">
				<li><a href="WhatIsWhatsUMarket.php">- What is What's Up &nbsp;&nbsp;Market ?</a></li>
				<li><a href="WhatIsWhatsUMarket.php">- Why shop here ?</a></li>
				
				<li><a href="WhatIsWhatsUMarket.php">- How to Order ?
				</a></li>
				<li><a href="WhatIsWhatsUMarket.php">- Who all can use ?</a></li>
				
			</ul>
		</li>
		
		<li><a href="privacy_Plocy.php">Privacy Policy</a></li>
		<li><a href="TermsConditions.php">Terms &amp; Conditions</a></li>
		<li><a href="FAQ.php">FAQ's</a></li>
		<li><a href="About Us1.php">Contact Us</a></li>
	</ul></div>
	</div>
  

  </div>

</div>
<!-- Insert your code here !-->





<div id="terms">
<h2>Terms of Use</h2>
<p>
<b>This document is an electronic record in terms of Information Technology Act, 2000 and rules there under as applicable and the amended provisions pertaining to electronic records in various statutes as amended by the Information Technology Act, 2000. This electronic record is generated by a computer system and does not require any physical or digital signatures.
</p><p>
This document is published in accordance with the provisions of Rule 3 (1) of the Information Technology (Intermediaries guidelines) Rules, 2011 that require publishing the rules and regulations, privacy policy and Terms of Use for access or usage of this website.</b>
</p>
<p>Your use of the Website and services and tools are governed by the following terms and conditions ("Terms of Use") as applicable to the Website including the applicable policies which are incorporated herein by way of reference. If You transact on the Website, You shall be subject to the policies that are applicable to the Website for such transaction. By mere use of the Website, You shall be contracting with What's Up Market! Internet Private Limited and these terms and conditions including the policies constitute Your binding obligations, with What's Up Market!.
</p>
<p>For the purpose of these Terms of Use, wherever the context so requires "You" or "User" shall mean any natural or legal person who has agreed to become a buyer on the Website by providing Registration Data while registering on the Website as Registered User using the computer systems. What's Up Market! allows the User to surf the Website or making purchases without registering on the Website. The term "We", "Us", "Our" shall mean What's Up Market! Internet Private Limited.
</p>
<p>When You use any of the services provided by Us through the Website, including but not limited to, (e.g. Product Reviews, Seller Reviews), You will be subject to the rules, guidelines, policies, terms, and conditions applicable to such service, and they shall be deemed to be incorporated into this Terms of Use and shall be considered as part and parcel of this Terms of Use. We reserve the right, at Our sole discretion, to change, modify, add or remove portions of these Terms of Use, at any time without any prior written notice to You. It is Your responsibility to review these Terms of Use periodically for updates / changes. Your continued use of the Website following the posting of changes will mean that You accept and agree to the revisions. As long as You comply with these Terms of Use, We grant You a personal, non-exclusive, non-transferable, limited privilege to enter and use the Website.
 </p>
<p><b>ACCESSING, BROWSING OR OTHERWISE USING THE SITE INDICATES YOUR AGREEMENT TO ALL THE TERMS AND CONDITIONS UNDER THESE TERMS OF USE, SO PLEASE READ THE TERMS OF USE CAREFULLY BEFORE PROCEEDING.</b> By impliedly or expressly accepting these Terms of Use, You also accept and agree to be bound by What's Up Market! Policies ((including but not limited to Privacy Policy available at Privacy) as amended from time to time.
</p>
<p>
<h4>Membership Eligibility</h4>
Use of the Website is available only to persons who can form legally binding contracts under Indian Contract Act, 1872. Persons who are "incompetent to contract" within the meaning of the Indian Contract Act, 1872 including minors, un-discharged insolvents etc. are not eligible to use the Website. If you are a minor i.e. under the age of 18 years, you shall not register as a User of the What's Up Market! website and shall not transact on or use the website. As a minor if you wish to use or transact on website, such use or transaction may be made by your legal guardian or parents on the Website. What's Up Market! reserves the right to terminate your membership and / or refuse to provide you with access to the Website if it is brought to What's Up Market!'s notice or if it is discovered that you are under the age of 18 years.
</p>
<h4>Your Account and Registration Obligations</h4>
<p>If You use the Website, You shall be responsible for maintaining the confidentiality of your Display Name and Password and You shall be responsible for all activities that occur under your Display Name and Password. You agree that if You provide any information that is untrue, inaccurate, not current or incomplete or We have reasonable grounds to suspect that such information is untrue, inaccurate, not current or incomplete, or not in accordance with the this Terms of Use, We shall have the right to indefinitely suspend or terminate or block access of your membership on the Website and refuse to provide You with access to the Website.
</p>
<h4>Communications</h4>
<p>When You use the Website or send emails or other data, information or communication to us, You agree and understand that You are communicating with Us through electronic records and You consent to receive communications via electronic records from Us periodically and as and when required. We may communicate with you by email or by such other mode of communication, electronic or otherwise.
</p>

<p>
<h4>Platform for Transaction and Communication</h4>
The Website is a platform that Users utilize to meet and interact with one another for their transactions. What's Up Market! is not and cannot be a party to or control in any manner any transaction between the Website's Users.</p>
<p>
<br>Henceforward:</br>
1. All commercial/contractual terms are offered by and agreed to between Buyers and Sellers alone. The commercial/contractual terms include without limitation price, shipping costs, payment methods, payment terms, date and period, warranties related to products and services and after sales services related to products and services. What's Up Market! does not have any control or does not determine or advise or in any way involve itself in the offering or acceptance of such commercial/contractual terms between the Buyers and Sellers.
 </p><p>
2. What's Up Market! does not make any representation or Warranty as to specifics (such as quality, value, salability, etc) of the products or services proposed to be sold or offered to be sold or purchased on the Website. What's Up Market! does not implicitly or explicitly support or endorse the sale or purchase of any products or services on the Website. What's Up Market! accepts no liability for any errors or omissions, whether on behalf of itself or third parties.
</p><p> 
3. What's Up Market! is not responsible for any non-performance or breach of any contract entered into between Buyers and Sellers. What's Up Market! cannot and does not guarantee that the concerned Buyers and/or Sellers will perform any transaction concluded on the Website. What's Up Market! shall not and is not required to mediate or resolve any dispute or disagreement between Buyers and Sellers.
 </p><p>
4. What's Up Market! does not make any representation or warranty as to the item-specifics (such as legal title, creditworthiness, identity, etc) of any of its Users. You are advised to independently verify the bona fides of any particular User that You choose to deal with on the Website and use Your best judgment in that behalf.
</p><p>
5. What's Up Market! does not at any point of time during any transaction between Buyer and Seller on the Website come into or take possession of any of the products or services offered by Seller nor does it at any point gain title to or have any rights or claims over the products or services offered by Seller to Buyer.
</p><p> 
6. At no time shall What's Up Market! hold any right, title or interest over the products nor shall What's Up Market! have any obligations or liabilities in respect of such contract entered into between Buyers and Sellers. What's Up Market! is not responsible for unsatisfactory or delayed performance of services or damages or delays as a result of products which are out of stock, unavailable or back ordered.
 </p><p>
7. The Website is only a platform that can be utilized by Users to reach a larger base to buy and sell products or services. What's Up Market! is only providing a platform for communication and it is agreed that the contract for sale of any of the products or services shall be a strictly bipartite contract between the Seller and the Buyer.
At no time shall What's Up Market! hold any any right, title or interest over the products nor shall What's Up Market! have any obligations or liabilities in respect of such contract.
What's Up Market! is not responsible for unsatisfactory or delayed performance of services or damages or delays as a result of products which are out of stock, unavailable or back ordered.</p>
 <p>
8. You shall independently agree upon the manner and terms and conditions of  payment, insurance etc. with the seller(s) that You transact with.
 </p>
<p>Disclaimer: Pricing on any product(s) as is reflected on the Website may due to some technical issue, typographical error or product information published by seller may be incorrectly reflected and in such an event seller may cancel such your order(s).
 </p>
<p>9. You release and indemnify What's Up Market! and/or any of its officers and representatives from any cost, damage, liability or other consequence of any of the actions of the Users of the Website and specifically waive any claims that you may have in this behalf under any applicable law. Notwithstanding its reasonable efforts in that behalf, What's Up Market! cannot take responsibility or control the information provided by other Users which is made available on the Website. You may find other User's information to be offensive, harmful, inconsistent, inaccurate, or deceptive. Please use caution and practice safe trading when using the Website.
Please note that there could be risks in dealing with underage persons or people acting under false pretence.
</p>

<h4>Charges</h4>
<p> 
Membership on the Website is free for buyers. What's Up Market! does not charge any fee for browsing and buying on the Website. What's Up Market! reserves the right to change its Fee Policy from time to time. In particular, What's Up Market! may at its sole discretion introduce new services and modify some or all of the existing services offered on the Website. In such an event What's Up Market! reserves the right to introduce fees for the new services offered or amend/introduce fees for existing services, as the case may be. Changes to the Fee Policy shall be posted on the Website and such changes shall automatically become effective immediately after they are posted on the Website. Unless otherwise stated, all fees shall be quoted in Indian Rupees. You shall be solely responsible for compliance of all applicable laws including those in India for making payments to What's Up Market! Internet Private Limited.
</p>
<p><h4>Use of the Website</h4>
<p>You agree, undertake and confirm that Your use of Website shall be strictly governed by the following binding principles:
 </p>
 <p>1. You shall not host, display, upload, modify, publish, transmit, update or share any information which:
(a) belongs to another person and to which You does not have any right to;
(b) is grossly harmful, harassing, blasphemous, defamatory, obscene, pornographic, paedophilic, libellous, invasive of another's privacy, hateful, or racially, ethnically objectionable, disparaging, relating or encouraging money laundering or gambling, or otherwise unlawful in any manner whatever; or unlawfully threatening or unlawfully harassing including but not limited to "indecent representation of women" within the meaning of the Indecent Representation of Women (Prohibition) Act, 1986;<br/>
(c) is misleading in any way;<br/>
(d) is patently offensive to the online community, such as sexually explicit content, or content that promotes obscenity, paedophilia, racism, bigotry, hatred or physical harm of any kind against any group or individual;<br/>
(e) harasses or advocates harassment of another person;<br/>
(f) involves the transmission of "junk mail", "chain letters", or unsolicited mass mailing or "spamming";<br/>
(g) promotes illegal activities or conduct that is abusive, threatening, obscene, defamatory or libellous;<br/>
(h) infringes upon or violates any third party's rights [including, but not limited to, intellectual property rights, rights of privacy (including without limitation unauthorized disclosure of a person's name, email address, physical address or phone number) or rights of publicity];<br/>
(i) promotes an illegal or unauthorized copy of another person's copyrighted work (see "Copyright complaint" below for instructions on how to lodge a complaint about uploaded copyrighted material), such as providing pirated computer programs or links to them, providing information to circumvent manufacture-installed copy-protect devices, or providing pirated music or links to pirated music files;<br/>
(j) contains restricted or password-only access pages, or hidden pages or images (those not linked to or from another accessible page);<br/>
(k) provides material that exploits people in a sexual, violent or otherwise inappropriate manner or solicits personal information from anyone;<br/>
(l) provides instructional information about illegal activities such as making or buying illegal weapons, violating someone's privacy, or providing or creating computer viruses;<br/>
(m) contains video, photographs, or images of another person (with a minor or an adult).
(n) tries to gain unauthorized access or exceeds the scope of authorized access to the Website or to profiles, blogs, communities, account information, bulletins, friend request, or other areas of the Website or solicits passwords or personal identifying information for commercial or unlawful purposes from other users;<br/>
(o) engages in commercial activities and/or sales without Our prior written consent such as contests, sweepstakes, barter, advertising and pyramid schemes, or the buying or selling of "virtual" products related to the Website. Throughout this Terms of Use, What's Up Market!'s prior written consent means a communication coming from What's Up Market!'s Legal Department, specifically in response to Your request, and specifically addressing the activity or conduct for which You seek authorization;<br/>
(p) solicits gambling or engages in any gambling activity which We, in Our sole discretion, believes is or could be construed as being illegal;<br/>
(q) interferes with another USER's use and enjoyment of the Website or any other individual's User and enjoyment of similar services;<br/>
(r) refers to any website or URL that, in Our sole discretion, contains material that is inappropriate for the Website or any other website, contains content that would be prohibited or violates the letter or spirit of these Terms of Use.<br/>
(s) harm minors in any way;<br/>
(t) infringes any patent, trademark, copyright or other proprietary rights or third party's trade secrets or rights of publicity or privacy or shall not be fraudulent or involve the sale of counterfeit or stolen products;<br/>
(u) violates any law for the time being in force;<br/>
(v) deceives or misleads the addressee/ users about the origin of such messages or communicates any information which is grossly offensive or menacing in nature;<br/>
(w) impersonate another person;<br/>
(x) contains software viruses or any other computer code, files or programs designed to interrupt, destroy or limit the functionality of any computer resource; or contains any trojan horses, worms, time bombs, cancelbots, easter eggs or other computer programming routines that may damage, detrimentally interfere with, diminish value of, surreptitiously intercept or expropriate any system, data or personal information;<br/>
(y) threatens the unity, integrity, defence, security or sovereignty of India, friendly relations with foreign states, or public order or causes incitement to the commission of any cognizable offence or prevents investigation of any offence or is insulting any other nation.<br/>
(z) shall not be false, inaccurate or misleading;<br/>
(aa) shall not, directly or indirectly, offer, attempt to offer, trade or attempt to trade in any item, the dealing of which is prohibited or restricted in any manner under the provisions of any applicable law, rule, regulation or guideline for the time being in force.<br/>
(ab) shall not create liability for Us or cause Us to lose (in whole or in part) the services of Our internet service provider ("ISPs") or other suppliers;
</p>
<p>
2. You shall not use any "deep-link", "page-scrape", "robot", "spider" or other automatic device, program, algorithm or methodology, or any similar or equivalent manual process, to access, acquire, copy or monitor any portion of the Website or any Content, or in any way reproduce or circumvent the navigational structure or presentation of the Website or any Content, to obtain or attempt to obtain any materials, documents or information through any means not purposely made available through the Website. We reserve Our right to bar any such activity.
</p><p>
3. You shall not attempt to gain unauthorized access to any portion or feature of the Website, or any other systems or networks connected to the Website or to any server, computer, network, or to any of the services offered on or through the Website, by hacking, password "mining" or any other illegitimate means.
 </p><p>
4. You shall not probe, scan or test the vulnerability of the Website or any network connected to the Website nor breach the security or authentication measures on the Website or any network connected to the Website. You may not reverse look-up, trace or seek to trace any information on any other User of or visitor to Website, or any other customer, including any account on the Website not owned by You, to its source, or exploit the Website or any service or information made available or offered by or through the Website, in any way where the purpose is to reveal any information, including but not limited to personal identification or information, other than Your own information, as provided for by the Website.
 </p><p>
5. You shall not make any negative, denigrating or defamatory statement(s) or comment(s) about Us or the brand name or domain name used by Us including the terms What's Up Market!, Flyte, Digiflip, Flipcart, What's Up Market!.com, or otherwise engage in any conduct or action that might tarnish the image or reputation, of What's Up Market! or sellers on platform or otherwise tarnish or dilute any What's Up Market!'s trade or service marks, trade name and/or goodwill associated with such trade or service marks, trade name as may be owned or used by us. You agree that You will not take any action that imposes an unreasonable or disproportionately large load on the infrastructure of the Website or What's Up Market!'s systems or networks, or any systems or networks connected to What's Up Market!.
 </p><p>
6. You agree not to use any device, software or routine to interfere or attempt to interfere with the proper working of the Website or any transaction being conducted on the Website, or with any other person's use of the Website.
 </p><p>
7. You may not forge headers or otherwise manipulate identifiers in order to disguise the origin of any message or transmittal You send to Us on or through the Website or any service offered on or through the Website. You may not pretend that You are, or that You represent, someone else, or impersonate any other individual or entity.
 </p><p>
8. You may not use the Website or any content for any purpose that is unlawful or prohibited by these Terms of Use, or to solicit the performance of any illegal activity or other activity which infringes the rights of What's Up Market! and / or others.
 </p><p>
9. You shall at all times ensure full compliance with the applicable provisions of the Information Technology Act, 2000 and rules thereunder as applicable and as amended from time to time and also all applicable Domestic laws, rules and regulations (including the provisions of any applicable Exchange Control Laws or Regulations in Force) and International Laws, Foreign Exchange Laws, Statutes, Ordinances and Regulations (including, but not limited to Sales Tax/VAT, Income Tax, Octroi, Service Tax, Central Excise, Custom Duty, Local Levies) regarding Your use of Our service and Your listing, purchase, solicitation of offers to purchase, and sale of products or services. You shall not engage in any transaction in an item or service, which is prohibited by the provisions of any applicable law including exchange control laws or regulations for the time being in force.
 </p><p>
10. Solely to enable Us to use the information You supply Us with, so that we are not violating any rights You might have in Your Information, You agree to grant Us a non-exclusive, worldwide, perpetual, irrevocable, royalty-free, sub-licensable (through multiple tiers) right to exercise the copyright, publicity, database rights or any other rights You have in Your Information, in any media now known or not currently known, with respect to Your Information. We will only use Your information in accordance with the Terms of Use and Privacy Policy applicable to use of the Website.
 </p><p>
11. From time to time, You shall be responsible for providing information relating to the products or services proposed to be sold by You. In this connection, You undertake that all such information shall be accurate in all respects. You shall not exaggerate or over emphasize the attributes of such products or services so as to mislead other Users in any manner.
 </p><p>
12. You shall not engage in advertising to, or solicitation of, other Users of the Website to buy or sell any products or services, including, but not limited to, products or services related to that being displayed on the Website or related to us. You may not transmit any chain letters or unsolicited commercial or junk email to other Users via the Website. It shall be a violation of these Terms of Use to use any information obtained from the Website in order to harass, abuse, or harm another person, or in order to contact, advertise to, solicit, or sell to another person other than Us without Our prior explicit consent. In order to protect Our Users from such advertising or solicitation, We reserve the right to restrict the number of messages or emails which a user may send to other Users in any 24-hour period which We deems appropriate in its sole discretion. You understand that We have the right at all times to disclose any information (including the identity of the persons providing information or materials on the Website) as necessary to satisfy any law, regulation or valid governmental request. This may include, without limitation, disclosure of the information in connection with investigation of alleged illegal activity or solicitation of illegal activity or in response to a lawful court order or subpoena. In addition, We can (and You hereby expressly authorize Us to) disclose any information about You to law enforcement or other government officials, as we, in Our sole discretion, believe necessary or appropriate in connection with the investigation and/or resolution of possible crimes, especially those that may involve personal injury.<br/>
We reserve the right, but has no obligation, to monitor the materials posted on the Website. What's Up Market! shall have the right to remove or edit any content that in its sole discretion violates, or is alleged to violate, any applicable law or either the spirit or letter of these Terms of Use. Notwithstanding this right, YOU REMAIN SOLELY RESPONSIBLE FOR THE CONTENT OF THE MATERIALS YOU POST ON THE WEBSITE AND IN YOUR PRIVATE MESSAGES. Please be advised that such Content posted does not necessarily reflect What's Up Market! views. In no event shall What's Up Market! assume or have any responsibility or liability for any Content posted or for any claims, damages or losses resulting from use of Content and/or appearance of Content on the Website. You hereby represent and warrant that You have all necessary rights in and to all Content which You provide and all information it contains and that such Content shall not infringe any proprietary or other rights of third parties or contain any libellous, tortious, or otherwise unlawful information.
 </p><p>
13. Your correspondence or business dealings with, or participation in promotions of, advertisers found on or through the Website, including payment and delivery of related products or services, and any other terms, conditions, warranties or representations associated with such dealings, are solely between You and such advertiser. We shall not be responsible or liable for any loss or damage of any sort incurred as the result of any such dealings or as the result of the presence of such advertisers on the Website.
 </p><p>
14. It is possible that other users (including unauthorized users or "hackers") may post or transmit offensive or obscene materials on the Website and that You may be involuntarily exposed to such offensive and obscene materials. It also is possible for others to obtain personal information about You due to your use of the Website, and that the recipient may use such information to harass or injure You. We does not approve of such unauthorized uses, but by using the Website You acknowledge and agree that We are not responsible for the use of any personal information that You publicly disclose or share with others on the Website. Please carefully select the type of information that You publicly disclose or share with others on the Website.
 </p><p>
15. What's Up Market! shall have all the rights to take necessary action and claim damages that may occur due to your involvement/participation in any way on your own or through group/s of people, intentionally or unintentionally in DoS/DDoS (Distributed Denial of Services).
</p>


<h4>Contents Posted on Site</h4>
<p>All text, graphics, user interfaces, visual interfaces, photographs, trademarks, logos, sounds, music and artwork (collectively, "Content"), is a third party user generated content and What's Up Market! has no control over such third party user generated content as What's Up Market! is merely an intermediary for the purposes of this Terms of Use.</p>
<p>Except as expressly provided in these Terms of Use, no part of the Website and no Content may be copied, reproduced, republished, uploaded, posted, publicly displayed, encoded, translated, transmitted or distributed in any way (including "mirroring") to any other computer, server, Website or other medium for publication or distribution or for any commercial enterprise, without What's Up Market!'s express prior written consent.</<p>p>
<p>You may use information on the products and services purposely made available on the Website for downloading, provided that You (1) do not remove any proprietary notice language in all copies of such documents, (2) use such information only for your personal, non-commercial informational purpose and do not copy or post such information on any networked computer or broadcast it in any media, (3) make no modifications to any such information, and (4) do not make any additional representations or warranties relating to such documents.</p>
<p>You shall be responsible for any notes, messages, emails, billboard postings, photos, drawings, profiles, opinions, ideas, images, videos, audio files or other materials or information posted or transmitted to the Website (collectively, "Content"). Such Content will become Our property and You grant Us the worldwide, perpetual and transferable rights in such Content. We shall be entitled to, consistent with Our Privacy Policy as adopted in accordance with applicable law, use the Content or any of its elements for any type of use forever, including but not limited to promotional and advertising purposes and in any media whether now known or hereafter devised, including the creation of derivative works that may include the Content You provide. You agree that any Content You post may be used by us, consistent with Our Privacy Policy and Rules of Conduct on Site as mentioned herein, and You are not entitled to any payment or other compensation for such use.
</p>

<h4>Privacy</h4>
<p>
We view protection of Your privacy as a very important principle. We understand clearly that You and Your Personal Information is one of Our most important assets. We store and process Your Information including any sensitive financial information collected (as defined under the Information Technology Act, 2000), if any, on computers that may be protected by physical as well as reasonable technological security measures and procedures in accordance with Information Technology Act 2000 and Rules there under. Our current Privacy Policy is available at Privacy. If You object to Your Information being transferred or used in this way please do not use Website.
 </p>
<p>We may share personal information with our other corporate entities and affiliates. These entities and affiliatesmay market to you as a result of such sharing unless you explicitly opt-out.</<p>p>
 <p>
We may disclose personal information to third parties. This disclosure may be required for us to provide youaccess to our Services, to comply with our legal obligations, to enforce our User Agreement, to facilitate our marketing and advertising activities, or to prevent, detect, mitigate, and investigate fraudulent or illegal activities related to our Services. We do not disclose your personal information to third parties for their marketing and advertising purposes without your explicit consent.
 </p>
<p>We may disclose personal information if required to do so by law or in the good faith belief that such disclosure is reasonably necessary to respond to subpoenas, court orders, or other legal process. We may disclose personal information to law enforcement offices, third party rights owners, or others in the good faith belief that such disclosure is reasonably necessary to: enforce our Terms or Privacy Policy; respond to claims that an advertisement, posting or other content violates the rights of a third party; or protect the rights, property or personal safety of our users or the general public.
 </p>
<p>We and our affiliates will share / sell some or all of your personal information with another business entity should we (or our assets) plan to merge with, or be acquired by that business entity, or re-organization, amalgamation, restructuring of business. Should such a transaction occur that other business entity (or the new combined entity) will be required to follow this privacy policy with respect to your personal information.
</p>
<p>Disclaimer of Warranties and Liability
This Website, all the materials and products (including but not limited to software) and services, included on or otherwise made available to You through this site are provided on "as is" and "as available" basis without any representation or warranties, express or implied except otherwise specified in writing. Without prejudice to the forgoing paragraph, What's Up Market! does not warrant that:<br/>
• This Website will be constantly available, or available at all; or<br/>
• The information on this Website is complete, true, accurate or non-misleading.<br/>
</p>
<p>
What's Up Market! will not be liable to You in any way or in relation to the Contents of, or use of, or otherwise in connection with, the Website. What's Up Market! does not warrant that this site; information, Content, materials, product (including software) or services included on or otherwise made available to You through the Website; their servers; or electronic communication sent from Us are free of viruses or other harmful components.</p>
<p>Nothing on Website constitutes, or is meant to constitute, advice of any kind. All the Products sold on Website are governed by different state laws and if Seller is unable to deliver such Products due to implications of different state laws, Seller will return or will give credit for the amount (if any) received in advance by Seller from the sale of such Product that could not be delivered to You.</p>
<p>You will be required to enter a valid phone number while placing an order on the Website. By registering Your phone number with us, You consent to be contacted by Us via phone calls and/or SMS notifications, in case of any order related updates. We will not use your personal information to initiate any promotional phone calls or SMS.
</p>
<h4>Selling</h4>
 
<p>As a registered seller, you are allowed to list item(s) for sale on the Website in accordance with the Policies which are incorporated by way of reference in this Terms of Use. You must be legally able to sell the item(s) you list for sale on our Website. You must ensure that the listed items do not infringe upon the intellectual property, trade secret or other proprietary rights or rights of publicity or privacy rights of third parties. Listings may only include text descriptions, graphics and pictures that describe your item for sale. All listed items must be listed in an appropriate category on the Website. All listed items must be kept in stock for successful fulfilment of sales.</p>
<p>
The listing description of the item must not be misleading and must describe actual condition of the product. If the item description does not match the actual condition of the item, you agree to refund any amounts that you may have received from the Buyer. You agree not to list a single product in multiple quantities across various categories on the Website. What's Up Market! reserves the right to delete such multiple listings of the same product listed by you in various categories.
</p>
<h4>Services<br/>
Payment</h4>
<p>While availing any of the payment method/s available on the Website, we will not be responsible or assume any liability, whatsoever in respect of any loss or damage arising directly or indirectly to You due to:<br/><br/><br/>
Lack of authorization for any transaction/s, or<br/>
Exceeding the preset limit mutually agreed by You and between "Bank/s", or<br/>
Any payment issues arising out of the transaction, or<br/>
Decline of transaction for any other reason/s<br/><br/><br/>
 </p>
 
<p>All payments made against the purchases/services on Website by you shall be compulsorily in Indian Rupees acceptable in the Republic of India. Website will not facilitate transaction with respect to any other form of currency with respect to the purchases made on Website.</p>
<p>Before shipping / delivering your order to you, Seller may request you to provide supporting documents (including but not limited to Govt. issued ID and address proof) to establish the ownership of the payment instrument used by you for your purchase. This is done in the interest of providing a safe online shopping environment to Our Users.
Further:<br/><br/>
1. Transactions, Transaction Price and all commercial terms such as Dispatch of products and/or services are as per principal to principal bipartite contractual obligations between Buyer and Seller and payment facility is merely used by the Buyer and Seller to facilitate the completion of the Transaction. Use of the payment facility shall not render What's Up Market! liable or responsible for the non-delivery, non-receipt, non-payment, damage, breach of representations and warranties, non-provision of after sales or warranty services or fraud as regards the products and /or services listed on What's Up Market!'s Website.<br/><br/>

2. You have specifically authorized What's Up Market! or its service providers to collect, process, facilitate and remit payments and / or the Transaction Price electronically or through Cash on Delivery to and from other Users in respect of transactions through Payment Facility. Your relationship with What's Up Market! is on a principal to principal basis and by accepting these Terms of Use you agree that What's Up Market! is an independent contractor for all purposes, and does not have control of or liability for the products or services that are listed on What's Up Market!'s Website that are paid for by using the Payment Facility. What's Up Market! does not guarantee the identity of any User nor does it ensure that a Buyer or a Seller will complete a transaction.<br/><br/>

3. You understand, accept and agree that the payment facility provided by What's Up Market! is neither a banking nor financial service but is merely a facilitator providing an electronic, automated online electronic payment, receiving payment through Cash On Delivery, collection and remittance facility for the Transactions on the What's Up Market! Website using the existing authorized banking infrastructure and Credit Card payment gateway networks. Further, by providing Payment Facility, What's Up Market! is neither acting as trustees nor acting in a fiduciary capacity with respect to the Transaction or the Transaction Price.
 <br/><br/>
</p>
<h4>Payment Facility for Buyers:</h4>
<p>You, as a Buyer, understand that upon initiating a Transaction You are entering into a legally binding and enforceable contract with the Seller to purchase the products and /or services from the Seller using the Payment Facility, and You shall pay the Transaction Price through Your Issuing Bank to the Seller using Payment Facility.</p>
<ul style="list-style:square">
<li>You, as a Buyer, may agree with the Seller through electronic communication and electronic records and using the automated features as may be provided by Payment Facility on any extension / increase in the Dispatch and/or Delivery time and the Transaction shall stand amended to such extent. Any such extension / increase of Dispatch / Delivery time or subsequent novation / variation of the Transaction should be in compliance with Payment Facility Rules and Policies.</li>
<li>You, as a Buyer, shall electronically notify Payment Facility using the appropriate What's Up Market! Website features immediately upon Delivery or non Delivery within the time period as provided in Policies. Non notification by You of Delivery or non Delivery within the time period specified in the Policies shall be construed as a deemed Delivery in respect of that Transaction. In case of Cash On Delivery transactions, Buyer is not required to confirm the receipt of products or services.</li>
<li>You, as a Buyer, shall be entitled to claim a refund of the Transaction Price (as Your sole and exclusive remedy) in case You do not receive the Delivery within the time period agreed in the Transaction or within the time period as provided in the Policies, whichever is earlier. In case you do not raise a refund claim using Website features within the stipulated time than this would make You ineligible for a refund.</li>
<li>You, as a Buyer, understand that the Payment Facility may not be available in full or in part for certain category of products and/or services and/or Transactions as mentioned in the Policies and hence You may not be entitled to a refund in respect of the Transactions for those products and /or services</li>
<li>Except for Cash On Delivery transaction, refund, if any, shall be made at the same Issuing Bank from where Transaction Price was received.</li>
<li>For Cash On Delivery transactions, refunds, if any, will be made via demand draft in favour of the Buyer (As per registration details provided by the Buyer)
<li>Refund shall be made in Indian Rupees only and shall be equivalent to the Transaction Price received in Indian Rupees.
<li>For electronics payments, refund shall be made through payment facility using NEFT / RTGS or any other online banking / electronic funds transfer system approved by Reserve Bank India (RBI).
<li>Refund shall be conditional and shall be with recourse available to What's Up Market! in case of any misuse by Buyer.
<li>Refund shall be subject to Buyer complying with Policies.</li></ul>
<p>
4. What's Up Market! reserves the right to impose limits on the number of Transactions or Transaction Price which What's Up Market! may receive from on an individual Valid Credit/Debit/ Cash Card / Valid Bank Account/ and such other infrastructure or any other financial instrument directly or indirectly through payment aggregator or through any such facility authorized by Reserve Bank of India to provide enabling support facility for collection and remittance of payment or by an individual Buyer during any time period, and reserves the right to refuse to process Transactions exceeding such limit.
</p><p>
5. What's Up Market! reserves the right to refuse to process Transactions by Buyers with a prior history of questionable charges including without limitation breach of any agreements by Buyer with What's Up Market! or breach/violation of any law or any charges imposed by Issuing Bank or breach of any policy.
 </p><p>
6. What's Up Market! may do such checks as it deems fit before approving the receipt of/Buyers commitment to pay (for Cash On Delivery transactions) Transaction Price from the Buyer for security or other reasons at the discretion of What's Up Market!. As a result of such check if What's Up Market! is not satisfied with the creditability of the Buyer or genuineness of the Transaction / Transaction Price, it will have the right to reject the receipt of / Buyers commitment to pay Transaction Price.
 </p><p>
7. What's Up Market! may delay notifying the payment confirmation i.e. informing Seller to Dispatch, if What's Up Market! deems suspicious or for Buyers conducting high transaction volumes to ensure safety of the Transaction and Transaction Price. In addition, What's Up Market! may hold Transaction Price and What's Up Market! may not inform Seller to Dispatch or remit Transaction Price to law enforcement officials (instead of refunding the same to Buyer) at the request of law enforcement officials or in the event the Buyer is engaged in any form of illegal activity.
 </p><p>
8. The Buyer and Seller acknowledge that What's Up Market! will not be liable for any damages, interests or claims etc. resulting from not processing a Transaction/Transaction Price or any delay in processing a Transaction/Transaction Price which is beyond control of What's Up Market!.
 </p><p>
<h4>Compliance with Laws:</h4>
<p>9. Buyer and Seller shall comply with all the applicable laws (including without limitation Foreign Exchange Management Act, 1999 and the rules made and notifications issued there under and the Exchange Control Manual as may be issued by Reserve Bank of India from time to time, Customs Act, Information and Technology Act, 2000 as amended by the Information Technology (Amendment) Act 2008, Prevention of Money Laundering Act, 2002 and the rules made there under, Foreign Contribution Regulation Act, 1976 and the rules made there under, Income Tax Act, 1961 and the rules made there under, Export Import Policy of government of India) applicable to them respectively for using Payment Facility and What's Up Market! Website.
 </p>
<h4>Buyer's arrangement with Issuing Bank:</h4>
<p>10. All Valid Credit / Debit/ Cash Card/ and other payment instruments are processed using a Credit Card payment gateway or appropriate payment system infrastructure and the same will also be governed by the terms and conditions agreed to between the Buyer and the respective Issuing Bank and payment instrument issuing company.</p><p>
11. All Online Bank Transfers from Valid Bank Accounts are processed using the gateway provided by the respective Issuing Bank which support Payment Facility to provide these services to the Users. All such Online Bank Transfers on Payment Facility are also governed by the terms and conditions agreed to between Buyer and the respective Issuing Bank
</p>
</div>




<!--end!-->
</div>
</div>
</body>
</html>