<head>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
        }
    </style>
</head>

<div class="row">
  <div class="col">
    <h1>Driver Shifts</h1>
  </div>
  <div class="col-auto">
    <?php
    include "view-drivers-with-shifts-newform.php";
    ?>
  </div>
</div>

<div class="card-group">
  <?php
      while ($driver = $drivers->fetch_assoc()) {
  ?>
     <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?php echo $driver['name']; ?></h5>
          <p class="card-text">
            <ul class="list-group">
            <?php
              $buses = selectBusesByDriver($driver['driver_id']);
              while ($bus = $buses->fetch_assoc()) {
            ?>
                
                <li class="list-group-item">
                  <div class="row">
                    <div class="col">
                       <?php echo $bus['shift_days']; ?> - <?php echo $bus['start_time']; ?> - <?php echo $bus['end_time']; ?> - <?php echo $bus['bus_name']; ?> - Route <?php echo $bus['route_id']; ?>
                    </div>
                    <div class="col-auto">
                      <?php
                      include "view-drivers-with-shifts-editform.php";
                      ?>
                          <form method="post" action="">
                             <input type="hidden" name="sid" value="<?php echo $bus['shift_id']; ?>">
                             <input type="hidden" name="actionType" value="Delete2">
                              <button type="submit" class="btn" onclick="return confirm('Are you sure?');">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                              </button>
                            </form>
                    </div>
 
                  </div>
               </li>

            <?php   
              }
           ?>
            </ul>
          </p>
        </div>
      </div>
  <?php
  }
  ?> 
</div>

<br /><br /><br />

<div class="row">
  <div class="col">
    <h3>Route Refernece</h3>
  </div>
  <div class="col-auto">
    <?php
    include "view-routes-newform.php";
    ?>
  </div>
</div>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Route Number</th>
        <th>Origin</th>
        <th>Destination</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
  <?php
      while ($route = $routes->fetch_assoc()) {
  ?>
     <tr>
       <td><?php echo $route['route_id']; ?></td>
       <td><?php echo $route['origin']; ?></td>
       <td><?php echo $route['destination']; ?></td>
        <td>
         <?php
         include "view-routes-editform.php";
         ?>
       </td>
       <td>
         <form method="post" action="">
           <input type="hidden" name="rid" value="<?php echo $route['route_id']; ?>">
           <input type="hidden" name="actionType" value="Delete">
            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?');">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
              </svg>
            </button>
          </form>
       </td>
     </tr>     
  <?php
      }
  ?> 
    </tbody>
  </table>
</div>

<h1>Bus Route Calculator</h1>

    <label for="selectRoute">Select Route:</label>
    <select id="selectRoute">
        <option value="20">Route 13 (20 miles)</option>
        <option value="17">Route 14 (17 miles)</option>
        <option value="33">Route 15 (33 miles)</option>
        <option value="27">Route 16 (13 miles)</option>
        <option value="13">Route 17 (27 miles)</option>
    </select>

    <br>

    <button onclick="calculateRoutesBeforeRefuel()">Calculate Routes Before Refuel</button>

    <p id="results"></p>

    <script>
        function calculateRoutesBeforeRefuel() {
            const selectRoute = document.getElementById('selectRoute');
            const selectedRouteMiles = parseInt(selectRoute.value);

            const milesPerTank = 300; // Assuming the bus can cover 300 miles per tank

            const routesBeforeRefuel = Math.floor(milesPerTank / selectedRouteMiles);

            const resultsParagraph = document.getElementById('results');
            resultsParagraph.textContent = `Number of routes before needing to refuel: ${routesBeforeRefuel}`;
        }
    </script>

<div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        const map = L.map('map').setView([35.2226, -97.4395], 13); // Set your initial coordinates and zoom level

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Example bus route coordinates (replace with your actual route coordinates)
        const busRoute = [
            [35.2226, -97.4395, "Start Location - Norman, OK"],
            [35.3395, -97.4867, "Moore, OK"],
            [35.4676, -97.5164, "Oklahoma City, OK"],
						[35.6528, -97.4781, "Edmund, OK"], 
            [35.2226, -97.4395, "End Location - Norman, OK"]
        ];

        L.polyline(busRoute, { color: 'blue' }).addTo(map);
    </script>

