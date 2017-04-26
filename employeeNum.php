<html>
<body>
<p>Please Provide the number of Engineer Required</p>
<form action="" method = "post">
  Senior Engineer:<br>
  <input type="text" name="senior" id = "senior">
  <br>
  Junior Engineer:<br>
  <input type="text" name="junior" id="junior">
  <br>
  Budget:<br>
  <input type="text" name="budget" id="budget">
  <br><br>
  <input type="submit" name="submit" id="submit" value="Submit" >
</form> 
<table id="results" border='1'>
    <tr>
        <th>Name</th>
         <th>Position</th>
		 <th>Salary</th>
		 <th>Years</th>
    </tr>
</table>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
     $("#results").hide(); 
});
$(function() {
    $("#submit").click(function() {

        var senior = $("input#senior").val();
        var junior = $("input#junior").val();
        var budget = $("input#budget").val();
		$("#results").show();
        var dataString = 
		{'senior':senior,'junior':junior,'budget':budget};
        $.ajax({
            type: "POST",
            url: "engineercalc.php",
            data: dataString,
            success: function(data1) {
				data2 = JSON.parse(data1);
				var trHTML = '';
				var total = 0;
				$.each(data2, function(idx, obj){ 
				// console.log('1--'+obj.salary);		
				trHTML += '<tr><td>' + obj.name + '</td><td>' + obj.field + '</td><td>' + obj.salary + '</td><td>' + obj.years + '</td></tr>';
				total = total+ parseInt(obj.salary);
				});				
				trHTML += '<tr><td>' + 'ACTUAL COST' + '</td><td>' + '' + '</td><td>' + total + '</td><td>' + '' + '</td></tr>';
				$("#results").html("");
			$('#results').append(trHTML);
            }
			 
        });
        return false;
    });
})

</script>