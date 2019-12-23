<html>
<body>

<h3>You are purchasing these items</h3>
<!-- Item names and price are defined in this php for simplicity sake. They should actually be static variables retreived from database. -->

Bak Kut Teh <?php echo $_GET["quantity"][0]; ?> 
$<?php echo $_GET["quantity"][0]*8; ?><br>

Ginseng Chicken <?php echo $_GET["quantity"][1]; ?> 
$<?php echo $_GET["quantity"][1]*12; ?><br>

Black Pepper Pork <?php echo $_GET["quantity"][2]; ?> 
$<?php echo $_GET["quantity"][2]*7; ?><br>

<?php $ordertotal = $_GET["quantity"][0]*8+$_GET["quantity"][1]*12+$_GET["quantity"][2]*7; ?>
Total: $<?php echo $ordertotal ?><br>

<br><br>
    <script
        src="https://www.paypal.com/sdk/js?client-id=AXNv5mukTuSyPV-w0FtBF8vRXA4iaUBevcs2WfehdomArUdIQcf96lZhkmMOojrKQo6ROEoYLNFdCFhT&currency=SGD">
    </script>

    <div id="paypal-button-container"></div>

<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: <?php echo $ordertotal ?> 
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                alert('Transaction completed by ' + details.payer.name.given_name);
            });
        }
  }).render('#paypal-button-container');
</script>

</body>
</html>
