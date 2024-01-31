<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week Calendar</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #calendar {
            text-align: center;
            margin-top: 20px;
        }

        #prev,
        #next {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
            /* margin-top: 10px; */
        }


        /* td,
        th {
            height: 50%; 
            font-size: small;
        } */
        /* td {
            padding: 5%;
            
            
        } */

        td.clickable {
            cursor: pointer;
            /* background-color: #e6f7ff; */



        }
       
        /* td:not(.clickable) {
            background-color: #f2f2f2;
        }
    */
       
 
        #time button {
            margin: 5px;
            padding: 8px;
            cursor: pointer;
            background-color:#ffffff ; /*#2ecc71*/
            /* color: white; */
            border: .5px solid gray;
            border-radius: 8px;
            color:#000000;
            float:left;
            /* font-size:14px; */
            /* float:left; */
            /* width:100px; */
        }

        .appointment-btn {
            margin: 5px;
            padding: 8px;
            cursor: pointer;
            background-color: #408bc0;
            color: white;
            border: none;
            border-radius: 4px;
        }

        #time button:disabled {
            background-color: #f2f2f2;
            cursor: not-allowed;
        }

        .clicked-slot {
            background-color: #7ebf7e;
        }

        /* Styling for the modal */
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        /* Styling for overlay/background */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        /* Styling for buttons inside the modal */
        .modal button {
            padding: 10px;
            margin: 5px;
            cursor: pointer;
        }
        h5{
          text-align: center;
          margin-top:2%; 
        }
        #holidaytext{
            font-size: 8px;
            
        }
        .holiday {
            /* background-color: #ffcccc;  */
            /* line-height: 0.8; */
            background-color: #f2f2f2;
            
        }

        /* .circle {
  background-image:
    -webkit-radial-gradient(
      circle,
      red, red 20px, transparent 20px
    );
  background-image:
    radial-gradient(
      circle,
      red, red 20px, transparent 20px
    );
border:1px solid grey;
} */

table {
  /* width: 80%; */
  margin: 1em auto;
  /* table-layout: fixed; */
  text-align: center;

  
}

.table td, .table th {
  padding: .75rem;
  /* vertical-align: middle;  */
}


/* td {
  height: 40px;
} */
.round-clicked {
    margin:auto;
    background-image:
    -webkit-radial-gradient(
      circle,
      black, black 20px, transparent 10px
    );
  background-image:
    radial-gradient(
      circle,
      black, black 17px, transparent 20px
    );
/* border:1px solid grey; */
color:#fff;

}

/* .container{
width:40% ! important;
min-width: 550px;
} */

.container {
             /* min-width: 550px;
            max-width: 800px;   */
            margin: auto;
        }

        .table-calendar {
            width: 50%; 
            display: inline-block;
            margin-bottom: 20px; 
        }

        .table-time {
            width: 50%; 
            display: inline-block;
        }



    </style>
</head>

<body>

<form name="Appointment1" id="frm1" method="post">
        <input type="text" name="selectedDate1" id="selectedDate1" value="">
        <input type="text" name="selectedSlot1" id="selectedSlot1" value="">
        <input type="button" id="frmbtn1" name="frmbtn1" value="submit">
    </form>



    <form name="Appointment2" id="frm2" method="post" style="display:none">
    <input type="text" name="selectedDate2" id="selectedDate2" value="">
        <input type="text" name="selectedSlot2" id="selectedSlot2" value="">
        <input type="button" id="frmbtn2" name="frmbtn2" value="submit">
    </form>

   
<form name="Appointment3" id="frm3"  method="post" style="display:none" action="">
       

    <div class="container" id="calendar" >
        <br>
        <!-- <table class="table-responsive"> -->
            <table class=" table table-borderless table-calendar" >
                <thead>
                    <tr>
                        <td  colspan="1"><button id="prev" class="btn btn-light rounded-circle" onclick="prevWeek()"><i class="fa-solid fa-caret-left" style='font-size:32px;color:#000000;'></i></button></td>
                        <td colspan="5">
                            <h5 id="current-week"></h5>
                        </td>
                        <td  colspan="1"><button id="next"  class="btn btn-light rounded-circle" onclick="nextWeek()"><i class="fa-solid fa-caret-right" style='font-size:32px;color:#000000;'></i></button> </td>
                    </tr>
                    <tr id="week-day"></tr>
                </thead>
                <tbody id="week-days"></tbody>
                <tbody id="time"></tbody>
                <tr>
                    <td colspan="7" style="text-align: right;"><button class="appointment-btn" name="btnSave" id="btnSave">Set
                            Appointment</button></td>
                </tr>
                
            </table>
            </table>
            
       
<div class="row"> 
<div class=" col-md-2"></div>                          
<div class=" col-md-4"><input type="text" name ="selectedDate" id="selectedDate" value=""></div> 
<div class=" col-md-4"> <input type="text" name ="selectedSlot" id ="selectedSlot" value="">  </div> 
<div class=" col-md-2"></div>
</div> 
</div>
</form>




   

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        const schedule = {
            "1": {
                "selectable": [
                    "10:00 am",
                    "11:30 am",
                    "1:00 pm",
                    "2:30 pm",
                    "4:00 pm",
                    "5:00 pm",
                    "5:30 pm",
                    "7:00 pm",
                    "7:30 pm"
                ],
                "greyed_out": []
            },
            "2": {
                "selectable": [
                    "10:00 am",
                    "11:30 am",
                    "1:00 pm",
                    "2:30 pm",
                    "4:00 pm",
                    "5:00 pm",
                    "5:30 pm",
                    "7:00 pm",
                    "7:30 pm"
                ],
                "greyed_out": ["10:00 am", "11:30 am", "1:00 pm"]
            },
            "3": {
                "selectable": [
                    "10:00 am",
                    "11:30 am",
                    "1:00 pm",
                    "2:30 pm",
                    "4:00 pm",
                    "5:00 pm",
                    "5:30 pm",
                    "7:00 pm",
                    "7:30 pm"
                ],
                "greyed_out": []
            },

            "4": {
                "selectable": [
                    "10:00 am",
                    "11:30 am",
                    "1:00 pm",
                    "2:30 pm",
                    "4:00 pm",
                    "5:00 pm",
                    "5:30 pm",
                    "7:00 pm",
                    "7:30 pm"
                ],
                "greyed_out": []
            },

            "5": {
                "selectable": [
                    "10:00 am",
                    "11:30 am",
                    "1:00 pm",
                    "2:30 pm",
                    "4:00 pm",
                    "5:00 pm",
                    "5:30 pm",
                    "7:00 pm",
                    "7:30 pm"
                ],
                "greyed_out": []
            },
            "6": {
                "selectable": [
                    "9:00 am",
                    "10:00 am",
                    "11:30 am",
                    "1:00 pm",
                    "2:30 pm",
                    "4:00 pm",
                    "4:30 pm"
                ],
                "greyed_out": []
            },
        };
        var dt = new Date();
        var nextDay = new Date(dt);

        if (dt.getDay() === 0 || dt.getDay() === 5) {
            nextDay.setDate(dt.getDate() + 3);
        } else if (dt.getDay() === 6) {
            nextDay.setDate(dt.getDate() + 4);
        } else {
            nextDay.setDate(dt.getDate() + 2);
        }
        var LastDay = new Date(nextDay);
        LastDay.setDate(dt.getDate() + 15);

        // const startDate = new Date('2024-01-10');
        // const endDate = new Date('2024-01-24');
        const startDate = new Date(nextDay);
        const endDate = new Date(LastDay);

        let currentDate = new Date(startDate);


        const holidays = {
            '2024-01-19': 'Memorial Day',    
            '2024-01-21': 'Independence Day'  
        };


        // function fillSlotTable(dayNo, selDate) {
        //     let morningSlots = [];
        //     let afternoonSlots = [];
        //     let greyedOutSlots = [];
        //     let choosedDate = selDate;
        //     if (schedule.hasOwnProperty(dayNo)) {
        //         morningSlots = schedule[dayNo]["selectable"].filter(slot => slot.includes("am"));
        //         afternoonSlots = schedule[dayNo]["selectable"].filter(slot => slot.includes("pm"));
        //         greyedOutSlots = schedule[dayNo]["greyed_out"];

        //         // Clear existing table content
        //         document.getElementById("time").innerHTML = "";

        //         // Fill morning and afternoon slots as clickable buttons
        //         let timeRow = document.createElement("tr");

        //         // Morning Slots column
        //         let morningCell = document.createElement("td");
        //         morningCell.colSpan = 3;
        //         morningSlots.forEach(timeSlot => {
        //             let button = createButton(timeSlot, !greyedOutSlots.includes(timeSlot), choosedDate);
        //             morningCell.appendChild(button);
        //         });
        //         timeRow.appendChild(morningCell);

        //         // Afternoon Slots column
        //         let afternoonCell = document.createElement("td");
        //         morningCell.colSpan = 4;
        //         afternoonSlots.forEach(timeSlot => {
        //             let button = createButton(timeSlot, !greyedOutSlots.includes(timeSlot), choosedDate);
        //             afternoonCell.appendChild(button);
        //         });
        //         timeRow.appendChild(afternoonCell);
        //         document.getElementById("time").appendChild(timeRow);
        //     }

        // }


        function fillSlotTable(dayNo, selDate) {
    let morningSlots = [];
    let afternoonSlots = [];
    let greyedOutSlots = [];
    let choosedDate = selDate;
    if (schedule.hasOwnProperty(dayNo)) {
        morningSlots = schedule[dayNo]["selectable"].filter(slot => slot.includes("am"));
        afternoonSlots = schedule[dayNo]["selectable"].filter(slot => slot.includes("pm"));
        greyedOutSlots = schedule[dayNo]["greyed_out"];

        // Clear existing table content
        document.getElementById("time").innerHTML = "";

        // Create table header row
        let headerRow = document.createElement("tr");
        // headerRow.colSpan = 7;
        // Morning Slots column header
        let morningHeader = document.createElement("th");
        morningHeader.textContent = "Morning";
        morningHeader.colSpan = 3;
        headerRow.appendChild(morningHeader);

        // Afternoon Slots column header
        let afternoonHeader = document.createElement("th");
        afternoonHeader.textContent = "Afternoon";
        afternoonHeader.colSpan = 4;
        headerRow.appendChild(afternoonHeader);

        document.getElementById("time").appendChild(headerRow);

        // Fill morning and afternoon slots as clickable buttons
        let timeRow = document.createElement("tr");

        // Morning Slots column
        let morningCell = document.createElement("td");
        morningCell.colSpan = 3;
        morningSlots.forEach(timeSlot => {
            let button = createButton(timeSlot, !greyedOutSlots.includes(timeSlot), choosedDate);
            morningCell.appendChild(button);
        });
        timeRow.appendChild(morningCell);

        // Afternoon Slots column
        let afternoonCell = document.createElement("td");
         afternoonCell.colSpan = 4;
        afternoonSlots.forEach(timeSlot => {
            let button = createButton(timeSlot, !greyedOutSlots.includes(timeSlot), choosedDate);
            afternoonCell.appendChild(button);
        });
        timeRow.appendChild(afternoonCell);
        document.getElementById("time").appendChild(timeRow);
    }
}




        let selectedButton = null;

        function createButton(timeSlot, clickable, choosedDate) {
            let button = document.createElement("button");
            button.textContent = timeSlot;

            if (clickable) {
                button.addEventListener("click", function() {
                    handleButtonClick(button, timeSlot, clickable, choosedDate);
                });
            } else {
                button.disabled = true;
                button.style.backgroundColor = '#f2f2f2'; // Customize the disabled button styling
            }
            
            return button;
        }

        function handleButtonClick(button, timeSlot, clickable, choosedDate) {
            if (clickable) {
                // Use a confirmation box to confirm the slot selection
                let confirmed = confirm("Do you want to select the time slot: " + timeSlot + "?");

                if (confirmed) {
                    // Remove background color from the previously selected button
                    if (selectedButton) {
                        selectedButton.style.backgroundColor = '';
                        selectedButton.style.color = '#000000';
                    }
                    
                    // Set background color for the currently clicked button
                    button.style.backgroundColor = '#000000'; // Customize the highlighted color
                    button.style.color = '#ffffff';
                    // Update the selectedButton variable to keep track of the current selection
                    selectedButton = button;
                    alert("Time slot selected: " + choosedDate);
                    alert("Time slot selected: " + timeSlot);
                    document.getElementById('selectedDate').value = choosedDate;
                    document.getElementById('selectedSlot').value = timeSlot;

                    // Add your logic here for handling the confirmed slot selection
                } else {
                    alert("Time slot selection canceled.");
                    // Add your logic here for handling the canceled slot selection
                }
            } else {
                alert("You clicked on non-selectable time: " + timeSlot);
                // Add your logic here for handling the click event on a non-selectable button
            }
            event.preventDefault();
        }
        


        // function displayWeek() {
        //     let currentWeek = [];
        //     let startingDate = new Date(currentDate);
        //     let selectedDay=null;
        
        //     for (let i = 0; i < 7; i++) {
        //         currentWeek.push(new Date(startingDate));
        //         startingDate.setDate(startingDate.getDate() + 1);
        //     }

        //     document.getElementById("current-week").innerHTML = currentWeek[0].toDateString() + " - " + currentWeek[6].toDateString();

        //     let weekDaysElement = document.getElementById("week-days");
        //     weekDaysElement.innerHTML = "";

        //     let weekDayElement = document.getElementById("week-day");
        //     weekDayElement.innerHTML = "";

        //     for (let i = 0; i < 7; i++) {
        //         let cell = document.createElement("td");
                
        //         cell.textContent = currentWeek[i].getDate();
        //         let date = currentWeek[i].getDate();
        //         let textHoliday="";
        //         let cellday = document.createElement("th");
        //         if (currentWeek[i].getDay() === 0) {
        //             textHoliday='Holiday';
        //             cellday.textContent = "SUN";
        //         } else if (currentWeek[i].getDay() === 1) {
        //             cellday.textContent = "MON";
        //         } else if (currentWeek[i].getDay() === 2) {
        //             cellday.textContent = "TUE";
        //         } else if (currentWeek[i].getDay() === 3) {
        //             cellday.textContent = "WED";
        //         } else if (currentWeek[i].getDay() === 4) {
        //             cellday.textContent = "THU";
        //         } else if (currentWeek[i].getDay() === 5) {
        //             cellday.textContent = "FRI";
        //         } else {
        //             cellday.textContent = "SAT";
        //         }

        //         const formattedDate = currentWeek[i].toISOString().split('T')[0];
        //         if (holidays.hasOwnProperty(formattedDate) || currentWeek[i].getDay() == 0) {
        //             cell.classList.add("holiday");
        //             // cell.innerHTML = `<span>${date}</span><br><sub id='holidaytext'>${holidays[formattedDate]? holidays[formattedDate] : ''} ${textHoliday ? textHoliday : ''}</sub>`;
        //         } 
                
        //         // else {
        //         //      cell.innerHTML = `<span>${date}</span>`;
        //         // }



        //         // Check if the day is clickable or not
              
        //         if (isDayClickable(currentWeek[i]) && isWithinRange(currentWeek[i], startDate, endDate)) {
        //             cell.classList.add("clickable");
        //             let slotElement = document.getElementById("slot");
        //             cell.addEventListener("click", function() {
        //                 alert("You clicked on " + currentWeek[i].toDateString());
        //                 document.getElementById('slot').style.display = 'block';
        //                 let dayno = currentWeek[i].getDay();

        //                 if (selectedDay) {
        //                     selectedDay.style.backgroundColor = '';
        //                     selectedDay.classList.remove("round-clicked");
        //             }
        //             selectedDay=cell;
        //             // selectedDay.style.backgroundColor = '#e6ffe6'; 
                    
        //             selectedDay.classList.add("round-clicked");
        //                 fillSlotTable(dayno, currentWeek[i]);
        //                 // handleCellClick(selectedDay);



        //             });
        //         } else {
        //             document.getElementById('slot').style.display = 'none';
        //              selectedDay=null;
                   
                     
        //         }
        //         weekDaysElement.appendChild(cell);
        //         weekDayElement.appendChild(cellday);
        //     }
        // }

       
    function displayWeek() {
    let currentWeek = [];
    let startingDate = new Date(currentDate);
    let selectedDay = null;

    for (let i = 0; i < 7; i++) {
        currentWeek.push(new Date(startingDate));
        startingDate.setDate(startingDate.getDate() + 1);
    }

    document.getElementById("current-week").innerHTML = currentWeek[0].toLocaleDateString('en-US', { month: 'short', day: 'numeric' }) + " - " + currentWeek[6].toLocaleDateString('en-US', { month: 'short', day: 'numeric' });


    let weekDaysElement = document.getElementById("week-days");
    weekDaysElement.innerHTML = "";

    let weekDayElement = document.getElementById("week-day");
    weekDayElement.innerHTML = "";

    for (let i = 0; i < 7; i++) {
        let cell = document.createElement("td");

        cell.textContent = currentWeek[i].getDate();
        let date = currentWeek[i].getDate();
        let textHoliday = "";
        let cellday = document.createElement("th");
        if (currentWeek[i].getDay() === 0) {
            textHoliday = 'Holiday';
            cellday.textContent = "SUN";
        } else if (currentWeek[i].getDay() === 1) {
            cellday.textContent = "MON";
        } else if (currentWeek[i].getDay() === 2) {
            cellday.textContent = "TUE";
        } else if (currentWeek[i].getDay() === 3) {
            cellday.textContent = "WED";
        } else if (currentWeek[i].getDay() === 4) {
            cellday.textContent = "THU";
        } else if (currentWeek[i].getDay() === 5) {
            cellday.textContent = "FRI";
        } else {
            cellday.textContent = "SAT";
        }

        const formattedDate = currentWeek[i].toISOString().split('T')[0];
        if (holidays.hasOwnProperty(formattedDate) || currentWeek[i].getDay() == 0) {
            cell.classList.add("holiday");
        }

        // Check if the day is clickable or not
        if (isDayClickable(currentWeek[i]) && isWithinRange(currentWeek[i], startDate, endDate)) {
            cell.classList.add("clickable");
            // let slotElement = document.getElementById("slot");
            cell.addEventListener("click", function () {
                // document.getElementById('slot').style.display = 'block';
                let dayno = currentWeek[i].getDay();

                if (selectedDay) {
                    selectedDay.style.backgroundColor = '';
                    selectedDay.classList.remove("round-clicked");
                }
                selectedDay = cell;
                selectedDay.classList.add("round-clicked");
                fillSlotTable(dayno, currentWeek[i]);
            });

            // Set default selection for the first clickable day
            if (!selectedDay) {
                selectedDay = cell;
                selectedDay.classList.add("round-clicked");
                // document.getElementById('slot').style.display = 'block';
                fillSlotTable(currentWeek[i].getDay(), currentWeek[i]);
            }
        } 
        // else {
        //     document.getElementById('slot').style.display = 'none';
        //     selectedDay = null;
        // }
        weekDaysElement.appendChild(cell);
        weekDayElement.appendChild(cellday);
    }
}




       





         function isDayClickable(date) {
            // Format the date to match the format of holidays
            const formattedDate = date.toISOString().split('T')[0];

            // Check if the day is a holiday
            if (holidays.hasOwnProperty(formattedDate)) {
                return false; // Holidays are not clickable
            }

            // Customize this function to define which days are clickable
            // For example, making only Sundays clickable
            return date.getDay() !== 0;
        }

        function isWithinRange(date, start, end) {
            return date >= start && date <= end;
        }

        function prevWeek() {

            let newDate = new Date(currentDate);
            newDate.setDate(currentDate.getDate() - 7);

            if (isWithinRange(newDate, startDate, endDate)) {
                currentDate = newDate;
                displayWeek();
                document.getElementById('selectedDate').value = "";
                document.getElementById('selectedSlot').value = "";
            }
            event.preventDefault();
        }

        function nextWeek() {
            let newDate = new Date(currentDate);
            newDate.setDate(currentDate.getDate() + 7);

            if (isWithinRange(newDate, startDate, endDate)) {
                currentDate = newDate;
                displayWeek();
                document.getElementById('selectedDate').value = "";
                document.getElementById('selectedSlot').value = "";
            }
            event.preventDefault();
        }

        function isDateDifferenceLessThan7Days(endDate, newDate) {
            const millisecondsPerDay = 24 * 60 * 60 * 1000; // Number of milliseconds in a day

            // Calculate the difference in milliseconds between the two dates
            const differenceInMilliseconds = Math.abs(newDate - endDate);

            // Convert the difference to days
            const differenceInDays = differenceInMilliseconds / millisecondsPerDay;

            // Check if the difference is less than 7 days
            return differenceInDays < 7;
        }

        displayWeek(); // Initial display

        $("#btnSave").click(function() {
            event.preventDefault();
            var check1 = $("#selectedDate").val();
            var check2 = $("#selectedSlot").val();

            if ((check1) && (check2)) {

                // var formData = new FormData($("#frm")[0]);
                //e.preventDefault();
                // console.log(formData);
                $.ajax({
                    url: "Appointment.php",
                    method: "POST",
                    data: {selectedDate1:check1,selectedSlot1:check2},
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        var data = result;
                        var fields = data.split(',');
                        var status = fields[0];
                        var mesg = fields[1];


                        if (status == 'Success') {

                            alert("Appointment Completed Succesfully");

                        } else if (status == 'Exist') {
                            alert("Appointment slot already selected");

                        } else {
                            alert("Appointment failed");

                        }
                    }
                });
            } else {
                alert("please fill out the mandatory fields");
                return false;
            }
        });



        $("#frmbtn1").click(function() {
           
               
                $.ajax({
                    url: "Appointment.php",
                    method: "POST",
                    data: {},
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        var data = result;
                        var fields = data.split(',');
                        var status = 'Success';
                        var mesg = fields[1];


                        if (status == 'Success') {

                           document.getElementById('frm1').style.display="none";
                           document.getElementById('frm2').style.display="block";

                        } else if (status == 'Exist') {
                            alert("Appointment slot already selected");

                        } else {
                            alert("Appointment failed");

                        }
                    }
                });
            
        });

        $("#frmbtn2").click(function() {
           
               
           $.ajax({
               url: "Appointment.php",
               method: "POST",
               data: {},
               processData: false,
               contentType: false,
               success: function(result) {
                   var data = result;
                   var fields = data.split(',');
                   var status = 'Success';
                   var mesg = fields[1];


                   if (status == 'Success') {
                      document.getElementById('frm1').style.display="none";
                      document.getElementById('frm2').style.display="none";
                      document.getElementById('frm3').style.display="block";

                   } else if (status == 'Exist') {
                       alert("Appointment slot already selected");

                   } else {
                       alert("Appointment failed");

                   }
               }
           });
       
   });







    </script>

</body>

</html>