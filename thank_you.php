<?php include('common/config.php');
	$session_id=$_SESSION['USER'];
function protect_user()
{
	if(empty($_SESSION['USER']))
	{
		echo "<script>window.location.href='login.php'</script>";
	}
}

///echo protect_user();
 ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Muli|Titillium+Web" rel="stylesheet">
    
     <script type="text/javascript">function add_chatinline(){var hccid=65185162;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script>
<link rel="icon" href="img/ficon.png" type="image/png" sizes="16x16">
    
    <title>Thank You!</title>
    <style>
        .step {
            list-style: none;
            margin: .2rem 0;
            width: 100%;
        }
        .step {
            justify-content: center;
    padding: 0px;
        }
        .centerfi{
            float:none !important;
            display:inline-block;
            margin-right:0px !important;
        }
        .step .step-item {
            -ms-flex: 1 1 0;
            flex: 1 1 0;
            margin-top: 0;
            min-height: 1rem;
            position: relative;
            text-align: center;
        }

        .step .step-item:not(:first-child)::before {
            background: #11998e;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #38ef7d, #11998e);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #38ef7d, #11998e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            content: "";
            height: 2px;
            left: -50%;
            position: absolute;
            top: 9px;
            width: 100%;
        }

        .step .step-item a {
            color: #5EC26E;
            display: inline-block;
            padding: 20px 10px 0;
            text-decoration: none;
            font-family: 'Titillium Web', sans-serif;
        }

        .step .step-item a::before {
            background: #5EC26E;
            border: .1rem solid #fff;
            border-radius: 50%;
            content: "";
            display: block;
            height: .9rem;
            left: 50%;
            position: absolute;
            top: .2rem;
            transform: translateX(-50%);
            width: .9rem;
            z-index: 1;
        }

        .step .step-item.active a::before {
            background: #fff;
            border: .1rem solid #5EC26E;
        }

        .step .step-item.active ~ .step-item::before {
            background: #e7e9ed;
        }

        .step .step-item.active ~ .step-item a::before {
            background: #e7e9ed;
        }


        .btn-back {
            float: left; margin-left: 50px; margin-top: 20px; border: 2px solid #5EC26E; padding: 10px 50px; border-radius: 15px; color: #5EC26E; font-family: 'Muli', sans-serif;
        }

        .btn-continue {
            float: right; margin-right: 50px; margin-top: 20px; border: 1px solid; padding: 10px 50px; border-radius: 15px; color: #fff; font-family: 'Muli', sans-serif; background: #11998e;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #38ef7d, #11998e);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #38ef7d, #11998e);
        }

        .panel {
            background-color: white;    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .2); height: 90%; margin: 0 10px; padding: 35px
        }
    </style>
</head>
<body style="background-color: #f4f4f4;">


<div class="container">
    <div class="row" style="margin-top: 100px;">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="panel">
                <h3 style="font-family: 'Muli', sans-serif; float: left;">Thank You!</h3>
                <img src="http://www.pngmart.com/files/3/Auction-PNG-Transparent-Image.png" style="float: right; width: 50px;" alt="">
                <div style="clear: both;"></div>
                <ul class="step d-flex flex-nowrap" style="margin: 20px 0px;">
                    <li class="step-item">
                        <a href="#" class="">Upload ID</a>
                    </li>
                    <li class="step-item">
                        <a href="#" class="">Confirmation</a>
                    </li>
                    <li class="step-item active">
                        <a href="#" class="">Finish</a>
                    </li>
                </ul>
                <p style="font-family: 'Titillium Web', sans-serif;">
                    <Br />
                    <Br />
                    <i class="far fa-check-circle" style="color: #11998e;"></i> Congratulations, you've completed checkout. <br /> <br />
                    You will receive the invoice shortly. Please check your e-mail address! <br /><br />
                    <b style="color:red;">NOTE:</b> You can find the Payment Details attached in email in PDF format. Please check your builk/junk/spam/messages, the invoice may have ended there because of the ever increasing filters of the e-mail.<br><br>
                     <i class="fas fa-exclamation-circle" style="color: #ff0a25;"></i>  Purchasing is a legal obligation for making the payment when you won a auction.
                </p>
            </div>
            </center><div style="background-color: rgb(239, 239, 239); box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .2); height: 100px; margin: 0 10px; text-align:center;">
                <a href="myaccount.php" class="btn-continue centerfi">Finish</a>
                <div style="clear: both;"></div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
<link rel="icon" href="img/ficon.png" type="image/png" sizes="16x16">