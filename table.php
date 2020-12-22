<!DOCTYPE html>
<html>

<head>
    <title>Table</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="wrapper" style="max-width: 1200px;">
        <!-- <div class="header">
        	<back>
        		Back to results
        	</back>
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">My Live Order <i>3</i></a>
                </li>
                <li>
                    <a href="#">Won Order <i>5</i></a>
                </li>
                <li>
                    <a href="#">Lost Order <i>5</i></a>
                </li>
                <li>
                    <a href="#">My Profile</a>
                </li>
            </ul>
        </div> -->
        <div class="header_new">
        	<back>
        		Back to results
        	</back>
            <ul>
                <li>
                    <a class="active" href="#">My Live Order <i>(3)</i></a>
                </li>
                <li>
                    <a href="#">Won Order <i>(5)</i></a>
                </li>
                <li>
                    <a href="#">Lost Order <i>(5)</i></a>
                </li>
                <li>
                    <a href="#">My Profile</a>
                </li>
            </ul>
        </div>
        <div class="table_wrap">
            <table style="width:100%">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Title</th>
                        <th>Product Image</th>
                        <th>Price</th>
                        <th>Mileage</th>
                        <th>Status</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2015 BMW X1 18d X line </td>
                        <td>
                            <div class="img_holder" style="background-image: url('img/sample.jpg')"></div>
                        </td>
                        <td>€ 15,900</td>
                        <td>194039</td>
                        <td><b>Cancel</b><div class="cancel"></div></td>
                        <td><b>Pending</b><div class="loading_gif"></div></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2015 BMW X1 18d X line </td>
                        <td>
                            <div class="img_holder" style="background-image: url('img/sample2.jpg')"></div>
                        </td>
                        <td>€ 15,900</td>
                        <td>194039</td>
                        <td><b>Accepted</b><div class="check"></div></td>
                        <td><b>Pending</b><div class="loading_gif"></div></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>