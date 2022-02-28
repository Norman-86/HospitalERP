$(document).ready(function(){
    setInterval(function(){
        $("#messageCounter").load("include/counter.php");
        $("#ItemCounter").load("includes/count_items.php");
        $("#SupplierCounter").load("includes/count_suppliers.php");
        $("#ReceivedCounter").load("includes/count_received.php");
        $("#StockCounter").load("includes/count_stock.php");
    }, 2000); /* time in milliseconds (ie 2 seconds)*/


    

});