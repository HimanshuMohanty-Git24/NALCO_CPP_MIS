// This is for the date changes
var currentDate = new Date();
var formattedDate = currentDate.toISOString().substring(0, 16);
document.getElementById("current-date").value = formattedDate;
document.getElementById("rundate").value = formattedDate;


// Calculate the difference gen mwhr
var startInputGenMwhr = document.getElementsByName("ga_mwhr_s")[0];
var endInputGenMwhr = document.getElementsByName("ga_mwhr_e")[0];
var genActInput = document.getElementsByName("gen_act")[0];

startInputGenMwhr.addEventListener("input", calculateDifferenceGenMwhr);
endInputGenMwhr.addEventListener("input", calculateDifferenceGenMwhr);

function calculateDifferenceGenMwhr() {
  var startValue = parseFloat(startInputGenMwhr.value);
  var endValue = parseFloat(endInputGenMwhr.value);
  
  if (!isNaN(startValue) && !isNaN(endValue)) {
    var difference = Math.abs(endValue - startValue);
    genActInput.value = difference;
  }
}

// Calculate the difference gen mvar
var startInputGenMvar = document.getElementsByName("ga_mvar_s")[0];
var endInputGenMvar = document.getElementsByName("ga_mvar_e")[0];
var genReactInput = document.getElementsByName("gen_react")[0];

startInputGenMvar.addEventListener("input", calculateAbsoluteDifferenceGenMvar);
endInputGenMvar.addEventListener("input", calculateAbsoluteDifferenceGenMvar);

function calculateAbsoluteDifferenceGenMvar() {
  var startValue = parseFloat(startInputGenMvar.value);
  var endValue = parseFloat(endInputGenMvar.value);

  if (!isNaN(startValue) && !isNaN(endValue)) {
    var absoluteDifference = Math.abs(endValue - startValue);
    genReactInput.value = absoluteDifference;
  }
}

// Calculate the difference uat mwhr
var startInputUatMwhr = document.getElementsByName("ua_mwhr_s")[0];
var endInputUatMwhr = document.getElementsByName("ua_mwhr_e")[0];
var uatActInput = document.getElementsByName("uat_act")[0];

startInputUatMwhr.addEventListener("input", calculateAbsoluteDifferenceUatMwhr);
endInputUatMwhr.addEventListener("input", calculateAbsoluteDifferenceUatMwhr);

function calculateAbsoluteDifferenceUatMwhr() {
  var startValue = parseFloat(startInputUatMwhr.value);
  var endValue = parseFloat(endInputUatMwhr.value);

  if (!isNaN(startValue) && !isNaN(endValue)) {
    var absoluteDifference = Math.abs(endValue - startValue);
    uatActInput.value = absoluteDifference;
  }
}

//Data fetch And show
function displayData() {
  try {
    console.log("displayData function executed");
    // Send an AJAX request to fetch the data from the server
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch_data.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Parse the JSON response
        var data = JSON.parse(xhr.responseText);

        // Construct the HTML content to display
        var content = "<table>";
        content += "<tr><th>Run Dt</th><th>Shift</th><th>Unit No</th><th>Difference</th></tr>";
        for (var i = 0; i < data.length; i++) {
          content += "<tr>";
          content += "<td>" + data[i].run_dt + "</td>";
          content += "<td>" + data[i].w_shift + "</td>";
          content += "<td>" + data[i].w_unit + "</td>";
          content += "<td>" + data[i].gen_act + "</td>";
          content += "</tr>";
        }
        content += "</table>";

        // Update the content of the "tableContainer"
        document.getElementById("tableContainer").innerHTML = content;
      }
    };
    xhr.send();
  } catch (error) {
    console.error("An error occurred:", error);
  }
}



