<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>


    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    
                        <h4>Report</h4>
                            <div class="form-group">
                                <p align="right">
                                    <a href="dashboard.php" class="btn btn-primary">Back to Home</a>
                                </p>
                            </div>

                        
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <br>
                                      <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>

                                
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Order</th>
                                    <th>Total Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                $con = mysqli_connect("localhost","root","","food_db");

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT * FROM orders WHERE placed_on BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = mysqli_query($con, $query);
 
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['user_id']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['number']; ?></td>
                                                <td><?= $row['total_products']; ?></td>
                                                <td><?= $row['total_price']; ?></td>
                                                <td><?= $row['placed_on']; ?></td>
                                            </tr>
                                            
                                            <?php
                                            
                                           // $query = "SELECT sum(Totle Amount) FROM orders";
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                                ?>
                                
                                
                                <?php
                               // $result = mysqli_query($con, 'SELECT SUM(total_price) AS value_sum FROM orders'); 
                               // $row = mysqli_fetch_assoc($result); ?>
                                
                                
                            
                               
                            </tbody>
                            
                        </table>
                       
                                            
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>-->
</body>
</html>