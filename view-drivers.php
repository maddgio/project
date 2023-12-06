<div class="row">
  <div class="col">
    <h1>Drivers</h1>
  </div>
  <div class="col-auto">
    <?php
    include "view-drivers-newform.php";
    ?>
  </div>
</div>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Driver ID</th>
        <th>Name</th>
        <th>Email</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
  <?php
      while ($driver = $drivers->fetch_assoc()) {
  ?>
     <tr>
       <td><?php echo $driver['driver_id']; ?></td>
       <td><?php echo $driver['name']; ?></td>
       <td><?php echo $driver['email']; ?></td>
       <td>
         <?php
         include "view-drivers-editform.php";
         ?>
       </td>
       <td>
         <form method="post" action="">
           <input type="hidden" name="did" value="<?php echo $driver['driver_id']; ?>">
           <input type="hidden" name="actionType" value="Delete">
            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?');">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
              </svg>
            </button>
          </form>
       </td>
       <td><a href="buses-by-driver.php?id=<?php echo $driver['driver_id']; ?>">Buses</a></td>
     </tr>     
  <?php
  }
  ?> 
    </tbody>
  </table>
</div>

<h1>Bus Driver Weekly Pay Calculator</h1>

    <label for="employeeId">Enter Employee ID:</label>
    <input type="text" id="employeeId" placeholder="Enter employee ID">
    <br>
    <button onclick="fillHours()">Fill Hours</button>
    <br>
    <label for="hoursWorked">Enter Hours Worked:</label>
    <input type="number" id="hoursWorked" placeholder="Enter hours">
    <button onclick="calculatePay()">Calculate Weekly Pay</button>

    <p id="result"></p>

    <script>
        // Store hours worked for each employee
        const employeeHours = {
            '1': 8,
            '2': 11,
            '3': 6,
            '4': 17,
            '7': 5,
            // Add more employees if needed
        };

        function fillHours() {
            const employeeIdInput = document.getElementById('employeeId');
            const hoursWorkedInput = document.getElementById('hoursWorked');

            const employeeId = employeeIdInput.value.trim();

            if (employeeHours[employeeId]) {
                hoursWorkedInput.value = employeeHours[employeeId];
            } else {
                alert("No predefined hours for the entered Employee ID.");
            }
        }

function calculateWeeklyPay(hoursWorked, employeeId) {
            const hourlyRate = 16; // Default rate

            // Check if predefined hours exist for the employee
            const predefinedHours = employeeHours[employeeId];
            const actualHours = predefinedHours || hoursWorked;

            return actualHours * hourlyRate;
        }

        function calculatePay() {
            const employeeIdInput = document.getElementById('employeeId');
            const hoursWorkedInput = document.getElementById('hoursWorked');
            const resultParagraph = document.getElementById('result');

            const employeeId = employeeIdInput.value.trim();
            const hoursWorked = parseFloat(hoursWorkedInput.value);

            // Check if both inputs are valid
            if (employeeId === '' || isNaN(hoursWorked)) {
                resultParagraph.textContent = "Please enter valid information.";
            } else {
                const weeklyPay = calculateWeeklyPay(hoursWorked, employeeId);
                resultParagraph.textContent = `Weekly pay for Employee ${employeeId}: $${weeklyPay.toFixed(2)}`;
            }
        }
    </script>
