<?php include 'login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Expenses Tracker</title>
    <link rel="stylesheet" href="styles.css">
    <script>
    var base_url = "<?=ROOT?>";
  </script>
</head>
<body>
    <div class="container">
        <h1>Daily Expenses Tracker</h1>
        <form id="expenses">
            <div>
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <input type="text" name="description"  id="description"required>
            </div>
            <div>
                <label for="amount">Amount:</label>
                <input type="number" name="amount" id="amount" required>
            </div>
            <button type="submit">Add Expenses</button>
        </form>
        <table id="index.html">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
            
                $sql = "select * from expenses";
                $stmt = mysqli_prepare($conn, $sql);
                $res = mysqli_stmt_execute($stmt);
                $data = [];
                if($res){
                $result = mysqli_stmt_get_result($stmt);
                $data = mysqli_fetch_all($result, MYSQLI_ASSOC); 
                }
                ?>
                <?php foreach($data as $col): ?>
                    <tr>
                        <td><?=$col['date']?></td>
                        <td><?=$col['descr']?></td>
                        <td><?=$col['amount']?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html>

<script src="<?= ASSETS."js/jquery/jquery.js" ?>"></script>
  <script src="<?= ASSETS."js/jquery/ajax.js" ?>"></script>
  <script src="<?= ASSETS."js/jquery/swal.js" ?>"></script>
  <script src="<?= POST."expenses.js" ?>"></script>