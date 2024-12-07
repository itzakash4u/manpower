<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SSD - Id Card</title>
	<style>
	    html,body{margin:0;padding:0}
        #printContainer {
            width: 370px;
            margin: 0 auto;
            padding: 10px;
            border: 1px dotted #999999;
            text-align: justify;
            border-radius: 15px;
            position: relative;
            overflow: hidden;
            background-image: linear-gradient(90deg, #000000, #3432cb);
            color-adjust: exact!important;  
            -webkit-print-color-adjust: exact!important; 
            print-color-adjust: exact!important;
        }
       .text-center{text-align: center;}
       .fixed-svg svg{
       		position: absolute;
       		top: 0;
       		right: 0;
       		z-index: 0;
       }
       .logo{
       		font-size: 50px;
       		font-weight: bolder;
       		margin-bottom: 30px;
       		color: #2f7ab6;
       		padding-left: 10px;
            font-family: arial;
       }
       .profile-image img{
       		padding: 0;
            background: #bd9b10;
            width: 170px;
            height: 170px;
            object-fit: cover;
            object-position: top center;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 10px solid #bd9b10;
            position:relative;
            z-index:1;
       }
        .profile-image {
            position:relative;
            z-index:1;
            text-align: center;
        }
        .profile-image::before{
            position:absolute;
            content:"";
            width: 130px;
            height: 120px;
            left: -12px;
            top: 35px;
            background-color:#bd9b10;
            z-index:0;
        }
        .name{
       		font-size: 30px;
       		color: #ffffff;
       		font-weight: bold;
       		margin-bottom: 5px;
       		text-transform: uppercase;
       		margin-top: 0;
        }
        .designstion{
       		font-size: 20px;
            font-family: arial;
            margin-bottom: 30px;
            color: #ffffff;
        }
        .back-logo{
            width: 120px;
            padding:10px;
        }
        .p-rel{
            position: relative;
            z-index: 1;
        }
        @media print {
            @page {
                margin: 0 auto; /* imprtant to logo margin */
                sheet-size: 370px 260mm; /* imprtant to set paper size */
            }
         
            html,body{margin:0;padding:0}
            #printContainer {
                width: 370px;
                margin: 0 auto;
                padding: 10px;
                border: 1px dotted #999999;
                text-align: justify;
                border-radius: 15px;
                position: relative;
                overflow: hidden;
                background-image: linear-gradient(90deg, #000000, #3432cb);
                color-adjust: exact!important;  
                -webkit-print-color-adjust: exact!important; 
                print-color-adjust: exact!important;
            }
           .text-center{text-align: center;}
           .fixed-svg svg{
           		position: absolute;
           		top: 0;
           		right: 0;
           		z-index: 0;
           }
           .logo{
           		font-size: 50px;
           		font-weight: bolder;
           		margin-bottom: 30px;
           		color: #2f7ab6;
           		padding-left: 10px;
                font-family: arial;
           }
           .profile-image img{
           		padding: 0;
                background: #bd9b10;
                width: 170px;
                height: 170px;
                object-fit: cover;
                object-position: top center;
                border-radius: 50%;
                margin-bottom: 15px;
                border: 10px solid #bd9b10;
                position:relative;
                z-index:1;
           }
            .profile-image {
                position:relative;
                z-index:1;
                text-align: center;
            }
            .profile-image::before{
                position:absolute;
                content:"";
                width: 130px;
                height: 120px;
                left: -12px;
                top: 35px;
                background-color:#bd9b10;
                z-index:0;
            }
            .name{
           		font-size: 30px;
           		color: #ffffff;
           		font-weight: bold;
           		margin-bottom: 5px;
           		text-transform: uppercase;
           		margin-top: 0;
            }
            .designstion{
           		font-size: 20px;
                font-family: arial;
                margin-bottom: 30px;
                color: #ffffff;
            }
            .back-logo{
                width: 120px;
                padding:10px;
            }
            .p-rel{
                position: relative;
                z-index: 1;
            }
        }
    </style>
</head>
<body onload="window.print();">
	<div id="printContainer">
		<div class="fixed-svg">
			<!--<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="360px" height="311.6px" viewBox="0 0 360 311.6" style="enable-background:new 0 0 360 311.6;" xml:space="preserve">-->
			<!--	<style type="text/css">-->
			<!--		.st0{fill:url(#XMLID_16_);}-->
			<!--		.st1{fill:url(#XMLID_17_);}-->
			<!--		.st2{fill:#FFFFFF;}-->
			<!--		.st3{fill:url(#XMLID_20_);}-->
			<!--	</style>-->
			<!--	<g id="XMLID_6_">			-->
			<!--			<linearGradient id="XMLID_16_" gradientUnits="userSpaceOnUse" x1="286.6141" y1="1088.5277" x2="317.8656" y2="1199.3282" gradientTransform="matrix(-0.6797 -0.7335 0.7335 -0.6797 -304.2122 957.0487)">-->
			<!--			<stop  offset="0" style="stop-color:#3372B2"/>-->
			<!--			<stop  offset="1" style="stop-color:#1B9BC5"/>-->
			<!--		</linearGradient>-->
			<!--		<path id="XMLID_25_" class="st0" d="M360,0H84.5c70.7,13.8,137.9,49.3,190.6,106.2c43.4,46.8,71.5,102.2,84.8,160.2V0z"/>-->
			<!--	</g>-->
			<!--	<linearGradient id="XMLID_17_" gradientUnits="userSpaceOnUse" x1="281.8761" y1="1105.5532" x2="261.042" y2="1011.8" gradientTransform="matrix(-0.6797 -0.7335 0.7335 -0.6797 -304.2122 957.0487)">-->
			<!--		<stop  offset="0" style="stop-color:#3372B2"/>-->
			<!--		<stop  offset="1" style="stop-color:#214A9A"/>-->
			<!--	</linearGradient>-->
			<!--	<path id="XMLID_26_" class="st1" d="M360,26.9C347.7,17.2,334.7,8.2,321,0H84.5c70.7,13.8,137.9,49.3,190.6,106.2-->
			<!--		c43.4,46.8,71.5,102.2,84.8,160.2V26.9z"/>-->
			<!--	<g id="XMLID_19_">-->
			<!--		<path id="XMLID_23_" class="st2" d="M321.2,0h-2.8C332.3,7.7,346,16.7,360,27.7V26C346.9,15.8,334.2,7.3,321.2,0z"/>-->
			<!--	</g>-->
			<!--	<linearGradient id="XMLID_20_" gradientUnits="userSpaceOnUse" x1="79.5613" y1="1026.4158" x2="448.8805" y2="935.5061" gradientTransform="matrix(-0.6797 -0.7335 0.7335 -0.6797 -304.2122 957.0487)">-->
			<!--		<stop  offset="0" style="stop-color:#3372B2"/>-->
			<!--		<stop  offset="1" style="stop-color:#1B9BC5"/>-->
			<!--	</linearGradient>-->
			<!--	<path id="XMLID_18_" class="st3" d="M360,111.9c-19.6-24.9-42.8-47.6-69.7-67.2C264.3,25.8,236.7,10.9,208.1,0H84.5-->
			<!--		c70.7,13.8,137.9,49.3,190.6,106.2c43.4,46.8,71.5,102.2,84.8,160.2V111.9z"/>-->
			<!--</svg>-->
		</div>
		<div class="">
			<!--<h2 class="logo"><span style="border-bottom: 2px solid #2f7ab6; ">ManpowerNation</span></h2>-->
			<div class="text-center"><img src="https://manpowernation.com/front/img/logo-tr.png" alt="logo" class="back-logo"></div>
			<div class="profile-image">
				<img src="{{asset('media/profile/'.$user->profile_image)}}">
			</div>
			<div class="text-center p-rel">
				<h2 class="name"></h2>
                <?php $cat=\App\Models\Category::find($user->category_id); ?>
				<div class="designstion">@if($cat!=null) {{$cat->category_name}} @endif</div>
			</div>
			<div class=" p-rel" style="color:#ffffff;padding: 0 20px;">
				<div style="display: flex;flex-wrap: wrap;padding: 5px 10px;">
					<div style="width:30%">	ID: </div>
					<div style="width:70%">	{{$user->employee_id}} </div>
				</div>
				<!-- <div style="display: flex;flex-wrap: wrap;padding: 5px 10px;">
					<div style="width:30%">	Blood: </div>
					<div style="width:70%">	A+ </div>
				</div> -->
				<!--<div style="display: flex;flex-wrap: wrap;padding: 5px 10px;">-->
				<!--	<div style="width:30%">	Aadhar No: </div>-->
				<!--	<div style="width:70%">	{{$user->aadhar_no}} </div>-->
				<!--</div>-->
				<div style="display: flex;flex-wrap: wrap;padding: 5px 10px;">
					<div style="width:30%">	Phone: </div>
					<div style="width:70%">	{{$user->phone}} </div>
				</div>
			</div>
			<div class="text-center  p-rel">
				<div style="padding: 30px;">
					<hr style="border-top: 2px solid #2f7ab6;">
					<span style="text-transform: uppercase; color: #2f7ab6;">manpowernation.com</span>
				</div>
			</div>
		</div>
	</div>


</body>
</html>