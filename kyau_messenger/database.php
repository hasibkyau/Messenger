<table width="100%" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table>
    <tr>
    <th>Name name</th>
    <th>Department</th>
    <th>batch</th>
    </tr>
 
    <tbody id="data"></tbody>
</table>

<script>
    var ajax = new XMLHttpRequest();
	
    ajax.open("GET", "data.php", true);
    ajax.send();
 
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);
 
            var html = "";
            for(var a = 0; a < data.length; a++) {
                var user_name = data[a].user_name;
                var user_dept = data[a].user_department;
                var user_batch = data[a].user_batch;
 
                html += "<tr>";
                    html += "<td>" + user_name + "</td>";
                    html += "<td>" + user_dept + "</td>";
                    html += "<td>" + user_batch + "</td>";
                html += "</tr>";
            }
            document.getElementById("data").innerHTML += html;
        }
    };
</script>